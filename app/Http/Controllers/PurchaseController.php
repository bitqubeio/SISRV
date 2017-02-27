<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseCreateRequest;
use App\Purchase;
use App\PurchaseDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Supplier;
use App\Item;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Facades\Datatables;

class PurchaseController extends Controller
{
    public function getSupplier($id)
    {
        $supplier = Supplier::where('supplier_ruc', '=', $id)->first();
        return response()->json([
            'name' => $supplier->supplier_businessname,
            'address' => $supplier->supplier_legaladdress,
            'id' => $supplier->id
        ]);
    }

    public function getRecurse($recurse)
    {
        switch ($recurse) {
            default:
            case 'items':
                $search_term = $_GET['term'];

                if (!isset($search_term) || empty($search_term) || strlen($search_term) < 3)
                    return response()->json(['error' => 1]);


                $items = Item::where('item_barcode', 'LIKE', "%$search_term%")
                    ->orWhere('item_code', 'LIKE', "%$search_term%")
                    ->orWhere('item_alternative_code', 'LIKE', "%$search_term%")
                    ->orWhere('item_description', 'LIKE', "%$search_term%")
                    ->get();
                $json_strings = [];
                $i = 1;
                foreach ($items as $item) {
                    $json_string = $item->item_barcode . ' - ' . $item->item_code . ' - ' . $item->item_description;
                    $json_strings[] = ['product' => $json_string, 'id' => $item->id, 'code' => $item->item_code, 'description' => $item->item_description, 'brand' => $item->brand->brand_name];
                    $i++;
                }
                break;
            case 'suppliers':
                $suppliers = Supplier::all();
                $json_strings = [];
                foreach ($suppliers as $supplier) {
                    $json_strings[] = $supplier->supplier_ruc;
                }
                break;
        }

        return response()->json($json_strings);
    }

    public function getPayments(Request $request)
    {
        if ($request->ajax()) {
            $payment_conditions = Purchase::payment_conditions();
            return response()->json($payment_conditions);
        }
    }

    public function listing()
    {
        $purchases = Purchase::join('suppliers', 'suppliers.id', '=', 'purchases.supplier_id')
            ->join('paymentconditions', 'paymentconditions.id', '=', 'purchases.paymentcondition_id')
            ->select([
                'purchases.id',
                'purchase_type_currency',
                'purchase_document_number',
                'supplier_ruc',
                'supplier_businessname',
                'purchase_emission_date',
                'paymentcondition_name',
            ]);

        return Datatables::of($purchases)
            ->editColumn('purchase_type_currency', function ($purchase) {
                if ($purchase->purchase_type_currency == 1) {
                    $type = 'Soles';
                } else {
                    $type = 'Dolares';
                }
                return $type;
            })
            ->editColumn('purchase_type_currency', function ($purchase) {
                $purchase_id = $purchase->id;
                $precio = PurchaseDetail::where('purchase_id', $purchase_id)
                    ->get(['purchase_price_with_igv', 'purchase_quantity'])->toArray();

                $total = null;
                foreach ($precio as $p) {
                    $total .= $p->purchase_price_with_igv * $p->purchase_quantity;
                }
                return $total;
            })
            ->make(true);
    }

    public function index()
    {
        $precio = PurchaseDetail::where('purchase_id', 9)
            ->get(['purchase_price_with_igv', 'purchase_quantity'])->toArray();

        $total = null;
        foreach ($precio as $p) {
            $total .= $p->purchase_price_with_igv * $p->purchase_quantity;
        }

        dd($total);
        return view('purchase.index');
    }

    public function create()
    {
        return view('purchase.create');
    }

    public function store(PurchaseCreateRequest $request)
    {
        //dd($request->all());

        DB::beginTransaction();
        // save purchase
        $purchase = new Purchase($request->all());
        $purchase->supplier_id = $request->input('proveedor_id');
        $purchase->purchase_igv = $request->input('purchase_igv');
        $purchase->purchase_document_number = $request->input('purchase_document_number_series') . '-' . $request->input('purchase_document_number');
        $purchase->purchase_guide_number = $request->input('purchase_guide_number_series') . '-' . $request->input('purchase_guide_number');
        $purchase->purchase_emission_date = Carbon::createFromFormat('d/m/Y', $request->input('purchase_emission_date'))->format('Y-m-d');
        $purchase->save();

        // array items
        $arrayItem = $request->input('item');

        // array quantities
        $arrayQuantity = $request->input('quantity');

        // array prices
        $arrayPrice = $request->input('price');

        // size array items, quantities, prices
        $size = count($arrayItem);

        // for  echo $arrayItem[$i] . ' - ' . $arrayQuantity[$i] . ' - ' . $arrayPrice[$i];
        for ($i = 0; $i < $size; $i++) {
            $purchaseDetail = new PurchaseDetail($request->all());
            $purchaseDetail->purchase_id = $purchase->id;
            $purchaseDetail->item_id = $arrayItem[$i];
            $purchaseDetail->purchase_quantity = $arrayQuantity[$i];
            if ($purchase->purchase_igv) {
                $purchaseDetail->purchase_price_without_igv = $arrayPrice[$i] / 1.18;
                $purchaseDetail->purchase_price_with_igv = $arrayPrice[$i];
                $purchaseDetail->purchase_amount = $purchaseDetail->purchase_quantity * $arrayPrice[$i];
            } else {
                $purchaseDetail->purchase_price_without_igv = $arrayPrice[$i];
                $purchaseDetail->purchase_price_with_igv = $arrayPrice[$i] * 1.18;
                $purchaseDetail->purchase_amount = $purchaseDetail->purchase_quantity * $arrayPrice[$i];
            }
            $purchaseDetail->save();
        }

        if ($purchase->save() && $purchaseDetail->save()) {
            DB::commit();
        } else {
            DB::rollBack();
        }
    }
}
