<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\CustomerCreateRequest;
use App\Http\Requests\CustomerUpdateRequest;
use Illuminate\Database\QueryException;
use narutimateum\Toastr\Facades\Toastr;
use Yajra\Datatables\Facades\Datatables;

class CustomerController extends Controller
{
    public function listing()
    {
        $customers = Customer::select([
            'id',
            'customer_ruc_dni',
            'customer_businessname',
            'customer_phone',
            'customer_status'
        ]);

        return Datatables::of($customers)
            ->addColumn('action', function ($customer) {
                if ($customer->customer_status) {
                    $customerstatus = '<i class="fa fa-toggle-on" aria-hidden="true" title="Activo"></i>';
                } else {
                    $customerstatus = '<i class="fa fa-toggle-off" aria-hidden="true" title="Inactivo"></i>';
                }
                return '<a href="customer/' . $customer->id . '"><i class="fa fa-eye" aria-hidden="true" title="Ver detalle"></i></a> 
                 <a href="customer/' . $customer->id . '/edit"><i class="fa fa-pencil" aria-hidden="true" title="Editar"></i></a> ' . $customerstatus . '
                <button type="button" class="btn btn-link m-0 p-0 align-baseline remove" value="' . $customer->id . '" onclick="confirmDelete(this);" data-toggle="modal" data-target="#modalQuestion"><i class="fa fa-remove" aria-hidden="true" title="Remover"></i></button>';
            })
            ->editColumn('customer_businessname', function ($customer) {
                return '<a href="customer/' . $customer->id . '">' . $customer->customer_businessname . '</a>';
            })
            ->make(true);
    }

    public function index()
    {
        return view('customer.index');
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(CustomerCreateRequest $request)
    {
        Customer::create($request->all());

        Toastr::success(
            '¡Agregado correctamente!',
            $title = $request->input('customer_ruc_dni'),
            $options = [
                //
            ]);

        if ($request->input('action') === 'Guardar') {
            return redirect()->route('customer.index');
        }

        return redirect()->route('customer.create');
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);

        return view('customer.show', ['customer' => $customer]);
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        return view('customer.edit', ['customer' => $customer]);
    }

    public function update(CustomerUpdateRequest $request, $id)
    {
        try {
            $customer = Customer::findOrFail($id);

            $customername = $customer->customer_ruc_dni;

            $customer->fill($request->all());

            $customer->save();

            Toastr::success(
                '¡Actualizado correctamente!',
                $title = $customername,
                $options = [
                    'positionClass' => 'toast-bottom-left-blue'
                ]);

            return redirect()->route('customer.index');

        } catch (QueryException $exception) {

            $errorCode = $exception->errorInfo[1];

            if ($errorCode == 1062) {
                Toastr::warning(
                    '¡El cliente ya existe!',
                    $title = $customername,
                    $options = [
                        //
                    ]);
            }

            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);

        $customername = $customer->customer_ruc_dni;

        $customer->delete();

        return response()->json([
            'title' => $customername,
            'message' => '¡Eliminado correctamente!'
        ]);
    }
}
