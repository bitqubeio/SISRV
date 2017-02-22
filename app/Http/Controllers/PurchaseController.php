<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseCreateRequest;
use Illuminate\Http\Request;
use App\Supplier;
use App\Item;

class PurchaseController extends Controller
{
    public function create()
    {
        return view('purchase.create');
    }

    public function getSupplier($id)
    {
        $supplier = Supplier::where('supplier_ruc', '=', $id)->first();
        return response()->json([
            'name' => $supplier->supplier_businessname,
            'address' => $supplier->supplier_legaladdress
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
                    $json_strings[] = ['product' => $json_string, 'code' => $item->item_code, 'description' => $item->item_description, 'brand' => $item->brand->brand_name];
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

    public function store(PurchaseCreateRequest $request)
    {

    }
}
