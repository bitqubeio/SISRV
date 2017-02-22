<?php

namespace App\Http\Controllers;

use App\Measure;
use Illuminate\Http\Request;
use App\Http\Requests\MeasureCreateRequest;
use App\Http\Requests\MeasureUpdateRequest;
use Illuminate\Database\QueryException;
use narutimateum\Toastr\Facades\Toastr;
use Yajra\Datatables\Facades\Datatables;

class MeasureController extends Controller
{
    public function getMeasures(Request $request)
    {
        if ($request->ajax()) {
            $measures = Measure::measures();
            return response()->json($measures);
        }
    }

    public function listing()
    {
        $measures = Measure::select([
            'id',
            'measure_name',
            'measure_description',
            'measure_status',
            'created_at'
        ]);

        return Datatables::of($measures)
            ->addColumn('action', function ($measure) {
                if ($measure->measure_status) {
                    $measurestatus = '<i class="fa fa-toggle-on" aria-hidden="true" title="Activo"></i>';
                } else {
                    $measurestatus = '<i class="fa fa-toggle-off" aria-hidden="true" title="Inactivo"></i>';
                }
                return '<a href="measure/' . $measure->id . '"><i class="fa fa-eye" aria-hidden="true" title="Ver detalle"></i></a> 
                 <a href="measure/' . $measure->id . '/edit"><i class="fa fa-pencil" aria-hidden="true" title="Editar"></i></a> ' . $measurestatus . '
                <button type="button" class="btn btn-link m-0 p-0 align-baseline remove" value="' . $measure->id . '" onclick="confirmDelete(this);" data-toggle="modal" data-target="#modalQuestion"><i class="fa fa-remove" aria-hidden="true" title="Remover"></i></button>';
            })
            ->editColumn('measure_name', function ($measure) {
                return '<a href="measure/' . $measure->id . '">' . $measure->measure_name . '</a>';
            })
            ->editColumn('created_at', function ($measure) {
                return $measure->created_at->toFormattedDateString();
            })
            ->make(true);
    }

    public function index()
    {
        return view('measure.index');
    }

    public function create()
    {
        return view('measure.create');
    }

    public function store(MeasureCreateRequest $request)
    {
        Measure::create($request->all());

        Toastr::success(
            '¡Agregado correctamente!',
            $title = $request->input('measure_name'),
            $options = [
                //
            ]);

        if ($request->input('action') === 'Guardar') {
            return redirect()->route('measure.index');
        }

        return redirect()->route('measure.create');
    }

    public function add(MeasureCreateRequest $request)
    {
        if ($request->ajax()) {
            Measure::create($request->all());

            $title = $request->input('measure_name');

            return response()->json([
                'title' => $title,
                'message' => '¡Agregado correctamente!'
            ]);
        }
    }

    public function show($id)
    {
        $measure = Measure::findOrFail($id);

        return view('measure.show', ['measure' => $measure]);
    }

    public function edit($id)
    {
        $measure = Measure::findOrFail($id);

        return view('measure.edit', ['measure' => $measure]);
    }

    public function update(MeasureUpdateRequest $request, $id)
    {
        try {
            $measure = Measure::findOrFail($id);

            $measurename = $measure->measure_name;

            $measure->fill($request->all());

            $measure->save();

            Toastr::success(
                '¡Actualizado correctamente!',
                $title = $measurename,
                $options = [
                    'positionClass' => 'toast-bottom-left-blue'
                ]);

            return redirect()->route('measure.index');

        } catch (QueryException $exception) {

            $errorCode = $exception->errorInfo[1];

            if ($errorCode == 1062) {
                Toastr::warning(
                    '¡La categoría ya existe!',
                    $title = $measurename,
                    $options = [
                        //
                    ]);
            }

            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $measure = Measure::findOrFail($id);

        $measurename = $measure->measure_name;

        $measure->delete();

        return response()->json([
            'title' => $measurename,
            'message' => '¡Eliminado correctamente!'
        ]);
    }
}
