<?php

namespace App\Http\Controllers;

use App\Warehouse;
use App\Http\Requests\WarehouseCreateRequest;
use App\Http\Requests\WarehouseUpdateRequest;
use Illuminate\Database\QueryException;
use narutimateum\Toastr\Facades\Toastr;
use Yajra\Datatables\Facades\Datatables;

class WarehouseController extends Controller
{
    public function listing()
    {
        $warehouses = Warehouse::select([
            'id',
            'warehouse_name',
            'warehouse_description',
            'warehouse_status',
            'created_at'
        ]);

        return Datatables::of($warehouses)
            ->addColumn('action', function ($warehouse) {
                if ($warehouse->warehouse_status) {
                    $warehousestatus = '<i class="fa fa-toggle-on" aria-hidden="true" title="Activo"></i>';
                } else {
                    $warehousestatus = '<i class="fa fa-toggle-off" aria-hidden="true" title="Inactivo"></i>';
                }
                return '<a href="warehouse/' . $warehouse->id . '"><i class="fa fa-eye" aria-hidden="true" title="Ver detalle"></i></a> 
                 <a href="warehouse/' . $warehouse->id . '/edit"><i class="fa fa-pencil" aria-hidden="true" title="Editar"></i></a> ' . $warehousestatus . '
                <button type="button" class="btn btn-link m-0 p-0 align-baseline remove" value="' . $warehouse->id . '" onclick="confirmDelete(this);" data-toggle="modal" data-target="#modalQuestion"><i class="fa fa-remove" aria-hidden="true" title="Remover"></i></button>';
            })
            ->editColumn('warehouse_name', function ($warehouse) {
                return '<a href="warehouse/' . $warehouse->id . '">' . $warehouse->warehouse_name . '</a>';
            })
            ->editColumn('created_at', function ($warehouse) {
                return $warehouse->created_at->toFormattedDateString();
            })
            ->make(true);
    }

    public function index()
    {
        return view('warehouse.index');
    }

    public function create()
    {
        return view('warehouse.create');
    }

    public function store(WarehouseCreateRequest $request)
    {
        Warehouse::create($request->all());

        Toastr::success(
            '¡Agregado correctamente!',
            $title = $request->input('warehouse_name'),
            $options = [
                //
            ]);

        if ($request->input('action') === 'Guardar') {
            return redirect()->route('warehouse.index');
        }

        return redirect()->route('warehouse.create');
    }

    public function show($id)
    {
        $warehouse = Warehouse::findOrFail($id);

        return view('warehouse.show', ['warehouse' => $warehouse]);
    }

    public function edit($id)
    {
        $warehouse = Warehouse::findOrFail($id);

        return view('warehouse.edit', ['warehouse' => $warehouse]);
    }

    public function update(WarehouseUpdateRequest $request, $id)
    {
        try {
            $warehouse = Warehouse::findOrFail($id);

            $warehousename = $warehouse->warehouse_name;

            $warehouse->fill($request->all());

            $warehouse->save();

            Toastr::success(
                '¡Actualizado correctamente!',
                $title = $warehousename,
                $options = [
                    'positionClass' => 'toast-bottom-left-blue'
                ]);

            return redirect()->route('warehouse.index');

        } catch (QueryException $exception) {

            $errorCode = $exception->errorInfo[1];

            if ($errorCode == 1062) {
                Toastr::warning(
                    '¡La sucursal ya existe!',
                    $title = $warehousename,
                    $options = [
                        //
                    ]);
            }

            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $warehouse = Warehouse::findOrFail($id);

        $warehousename = $warehouse->warehouse_name;

        $warehouse->delete();

        return response()->json([
            'title' => $warehousename,
            'message' => '¡Eliminado correctamente!'
        ]);
    }
}
