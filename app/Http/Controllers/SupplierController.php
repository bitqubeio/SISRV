<?php

namespace App\Http\Controllers;

use App\Supplier;
use App\Http\Requests\SupplierCreateRequest;
use App\Http\Requests\SupplierUpdateRequest;
use Illuminate\Database\QueryException;
use narutimateum\Toastr\Facades\Toastr;
use Yajra\Datatables\Facades\Datatables;

class SupplierController extends Controller
{
    public function listing()
    {
        $suppliers = Supplier::select([
            'id',
            'supplier_ruc',
            'supplier_businessname',
            'supplier_phone',
            'supplier_status'
        ]);

        return Datatables::of($suppliers)
            ->addColumn('action', function ($supplier) {
                if ($supplier->supplier_status) {
                    $supplierstatus = '<i class="fa fa-toggle-on" aria-hidden="true" title="Activo"></i>';
                } else {
                    $supplierstatus = '<i class="fa fa-toggle-off" aria-hidden="true" title="Inactivo"></i>';
                }
                return '<a href="supplier/' . $supplier->id . '"><i class="fa fa-eye" aria-hidden="true" title="Ver detalle"></i></a> 
                 <a href="supplier/' . $supplier->id . '/edit"><i class="fa fa-pencil" aria-hidden="true" title="Editar"></i></a> ' . $supplierstatus . '
                <button type="button" class="btn btn-link m-0 p-0 align-baseline remove" value="' . $supplier->id . '" onclick="confirmDelete(this);" data-toggle="modal" data-target="#modalQuestion"><i class="fa fa-remove" aria-hidden="true" title="Remover"></i></button>';
            })
            ->editColumn('supplier_businessname', function ($supplier) {
                return '<a href="supplier/' . $supplier->id . '">' . $supplier->supplier_businessname . '</a>';
            })
            ->make(true);
    }

    public function index()
    {
        return view('supplier.index');
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(SupplierCreateRequest $request)
    {
        Supplier::create($request->all());

        Toastr::success(
            '¡Agregado correctamente!',
            $title = $request->input('supplier_ruc'),
            $options = [
                //
            ]);

        if ($request->input('action') === 'Guardar') {
            return redirect()->route('supplier.index');
        }

        return redirect()->route('supplier.create');
    }

    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);

        return view('supplier.show', ['supplier' => $supplier]);
    }

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);

        return view('supplier.edit', ['supplier' => $supplier]);
    }

    public function update(SupplierUpdateRequest $request, $id)
    {
        try {
            $supplier = Supplier::findOrFail($id);

            $suppliername = $supplier->supplier_ruc;

            $supplier->fill($request->all());

            $supplier->save();

            Toastr::success(
                '¡Actualizado correctamente!',
                $title = $suppliername,
                $options = [
                    'positionClass' => 'toast-bottom-left-blue'
                ]);

            return redirect()->route('supplier.index');

        } catch (QueryException $exception) {

            $errorCode = $exception->errorInfo[1];

            if ($errorCode == 1062) {
                Toastr::warning(
                    '¡El proveedor ya existe!',
                    $title = $suppliername,
                    $options = [
                        //
                    ]);
            }

            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);

        $suppliername = $supplier->supplier_ruc;

        $supplier->delete();

        return response()->json([
            'title' => $suppliername,
            'message' => '¡Eliminado correctamente!'
        ]);
    }
}
