<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\BrandCreateRequest;
use App\Http\Requests\BrandUpdateRequest;
use Illuminate\Database\QueryException;
use narutimateum\Toastr\Facades\Toastr;
use Yajra\Datatables\Facades\Datatables;

class BrandController extends Controller
{
    public function getBrands(Request $request)
    {
        if ($request->ajax()) {
            $brands = Brand::brands();
            return response()->json($brands);
        }
    }

    public function listing()
    {
        $brands = Brand::select([
            'id',
            'brand_name',
            'brand_description',
            'brand_status',
            'created_at'
        ]);

        return Datatables::of($brands)
            ->addColumn('action', function ($brand) {
                if ($brand->brand_status) {
                    $brandstatus = '<i class="fa fa-toggle-on" aria-hidden="true" title="Activo"></i>';
                } else {
                    $brandstatus = '<i class="fa fa-toggle-off" aria-hidden="true" title="Inactivo"></i>';
                }
                return '<a href="brand/' . $brand->id . '"><i class="fa fa-eye" aria-hidden="true" title="Ver detalle"></i></a>
                <a href="brand/' . $brand->id . '/edit"><i class="fa fa-pencil" aria-hidden="true" title="Editar"></i></a> ' . $brandstatus . ' 
                <button type="button" class="btn btn-link m-0 p-0 align-baseline remove" value="' . $brand->id . '" onclick="confirmDelete(this);" data-toggle="modal" data-target="#modalQuestion"><i class="fa fa-remove" aria-hidden="true" title="Remover"></i></button>';
            })
            ->editColumn('brand_name', function ($brand) {
                return '<a href="brand/' . $brand->id . '">' . $brand->brand_name . '</a>';
            })
            ->editColumn('created_at', function ($brand) {
                return $brand->created_at->toFormattedDateString();
            })
            ->make(true);
    }

    public function index()
    {
        return view('brand.index');
    }

    public function create()
    {
        return view('brand.create');
    }

    public function store(BrandCreateRequest $request)
    {
        Brand::create($request->all());

        Toastr::success(
            '¡Agregado correctamente!',
            $title = $request->input('brand_name'),
            $options = [
                //
            ]);

        if ($request->input('action') === 'Guardar') {
            return redirect()->route('brand.index');
        }

        return redirect()->route('brand.create');
    }

    public function add(BrandCreateRequest $request)
    {
        if ($request->ajax()) {
            Brand::create($request->all());

            $title = $request->input('brand_name');

            return response()->json([
                'title' => $title,
                'message' => '¡Agregado correctamente!'
            ]);
        }
    }

    public function show($id)
    {
        $brand = Brand::findOrFail($id);

        return view('brand.show', ['brand' => $brand]);
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);

        return view('brand.edit', ['brand' => $brand]);
    }

    public function update(BrandUpdateRequest $request, $id)
    {
        try {
            $brand = Brand::findOrFail($id);

            $brandname = $brand->brand_name;

            $brand->fill($request->all());

            $brand->save();

            Toastr::success(
                '¡Actualizado correctamente!',
                $title = $brandname,
                $options = [
                    'positionClass' => 'toast-bottom-left-blue'
                ]);

            return redirect()->route('brand.index');

        } catch (QueryException $exception) {

            $errorCode = $exception->errorInfo[1];

            if ($errorCode == 1062) {
                Toastr::warning(
                    '¡La marca ya existe!',
                    $title = $brandname,
                    $options = [
                        //
                    ]);
            }

            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        $brandname = $brand->brand_name;

        $brand->delete();

        return response()->json([
            'title' => $brandname,
            'message' => '¡Eliminado correctamente!'
        ]);
    }
}
