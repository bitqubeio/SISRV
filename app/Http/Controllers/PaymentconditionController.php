<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentconditionCreateRequest;
use App\Http\Requests\PaymentconditionUpdateRequest;
use App\Paymentcondition;
use Illuminate\Database\QueryException;
use Toastr;
use Datatables;

class PaymentconditionController extends Controller
{
    public function listing()
    {
        $paymentconditions = Paymentcondition::select([
            'id',
            'paymentcondition_name',
            'paymentcondition_mode',
            'paymentcondition_payments',
            'paymentcondition_term',
            'paymentcondition_status',
        ]);

        return Datatables::of($paymentconditions)
            ->addColumn('action', function ($paymentcondition) {
                if ($paymentcondition->paymentcondition_status) {
                    $paymentconditionstatus = '<i class="fa fa-toggle-on" aria-hidden="true" title="Activo"></i>';
                } else {
                    $paymentconditionstatus = '<i class="fa fa-toggle-off" aria-hidden="true" title="Inactivo"></i>';
                }
                return '<a href="paymentcondition/' . $paymentcondition->id . '"><i class="fa fa-eye" aria-hidden="true" title="Ver detalle"></i></a>
                <a href="paymentcondition/' . $paymentcondition->id . '/edit"><i class="fa fa-pencil" aria-hidden="true" title="Editar"></i></a> ' . $paymentconditionstatus . ' 
                <button type="button" class="btn btn-link m-0 p-0 align-baseline remove" value="' . $paymentcondition->id . '" onclick="confirmDelete(this);" data-toggle="modal" data-target="#modalQuestion"><i class="fa fa-remove" aria-hidden="true" title="Remover"></i></button>';
            })
            ->editColumn('paymentcondition_name', function ($paymentcondition) {
                return '<a href="paymentcondition/' . $paymentcondition->id . '">' . $paymentcondition->paymentcondition_name . '</a>';
            })
            ->editColumn('paymentcondition_payments', function ($paymentcondition) {
                if ($paymentcondition->paymentcondition_payments) {
                    $payments = $paymentcondition->paymentcondition_payments . ' Partes';
                } else {
                    $payments = '-';
                }
                return $payments;
            })
            ->editColumn('paymentcondition_term', function ($paymentcondition) {
                if ($paymentcondition->paymentcondition_term) {
                    $term = $paymentcondition->paymentcondition_term . ' Días';
                } else {
                    $term = '-';
                }
                return $term;
            })
            ->make(true);
    }

    public function index()
    {
        return view('paymentcondition.index');
    }

    public function create()
    {
        return view('paymentcondition.create');
    }

    public function store(PaymentconditionCreateRequest $request)
    {
        Paymentcondition::create($request->all());

        Toastr::success(
            '¡Agregado correctamente!',
            $title = $request->input('paymentcondition_name'),
            $options = [
                //
            ]);

        if ($request->input('action') === 'Guardar') {
            return redirect()->route('paymentcondition.index');
        }

        return redirect()->route('paymentcondition.create');
    }

    public function show($id)
    {
        $paymentcondition = Paymentcondition::findOrFail($id);

        return view('paymentcondition.show', ['paymentcondition' => $paymentcondition]);
    }

    public function edit($id)
    {
        $paymentcondition = Paymentcondition::findOrFail($id);

        return view('paymentcondition.edit', ['paymentcondition' => $paymentcondition]);
    }

    public function update(PaymentconditionUpdateRequest $request, $id)
    {
        try {
            $paymentcondition = Paymentcondition::findOrFail($id);

            $title = $paymentcondition->paymentcondition_name;

            $paymentcondition->fill($request->all());

            $paymentcondition->save();

            Toastr::success(
                '¡Actualizado correctamente!',
                $title = $title,
                $options = [
                    'positionClass' => 'toast-bottom-left-blue'
                ]);

            return redirect()->route('paymentcondition.index');

        } catch (QueryException $exception) {

            $errorCode = $exception->errorInfo[1];

            if ($errorCode == 1062) {
                Toastr::warning(
                    '¡La condición de pago ya existe!',
                    $title = $title,
                    $options = [
                        //
                    ]);
            }

            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $paymentcondition = Paymentcondition::findOrFail($id);

        $title = $paymentcondition->paymentcondition_name;

        $paymentcondition->delete();

        return response()->json([
            'title' => $title,
            'message' => '¡Eliminado correctamente!'
        ]);
    }
}
