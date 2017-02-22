<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Database\QueryException;
use narutimateum\Toastr\Facades\Toastr;
use Yajra\Datatables\Facades\Datatables;

class CategoryController extends Controller
{
    public function getCategories(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category::categories();
            return response()->json($categories);
        }
    }

    public function listing()
    {
        $categories = Category::select([
            'id',
            'category_name',
            'category_description',
            'category_status',
            'created_at'
        ]);

        return Datatables::of($categories)
            ->addColumn('action', function ($category) {
                if ($category->category_status) {
                    $categorystatus = '<i class="fa fa-toggle-on" aria-hidden="true" title="Activo"></i>';
                } else {
                    $categorystatus = '<i class="fa fa-toggle-off" aria-hidden="true" title="Inactivo"></i>';
                }
                return '<a href="category/' . $category->id . '"><i class="fa fa-eye" aria-hidden="true" title="Ver detalle"></i></a> 
                 <a href="category/' . $category->id . '/edit"><i class="fa fa-pencil" aria-hidden="true" title="Editar"></i></a> ' . $categorystatus . '
                <button type="button" class="btn btn-link m-0 p-0 align-baseline remove" value="' . $category->id . '" onclick="confirmDelete(this);" data-toggle="modal" data-target="#modalQuestion"><i class="fa fa-remove" aria-hidden="true" title="Remover"></i></button>';
            })
            ->editColumn('category_name', function ($category) {
                return '<a href="category/' . $category->id . '">' . $category->category_name . '</a>';
            })
            ->editColumn('created_at', function ($category) {
                return $category->created_at->toFormattedDateString();
            })
            ->make(true);
    }

    public function index()
    {
        return view('category.index');
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryCreateRequest $request)
    {
        Category::create($request->all());

        Toastr::success(
            '¡Agregado correctamente!',
            $title = $request->input('category_name'),
            $options = [
                //
            ]);

        if ($request->input('action') === 'Guardar') {
            return redirect()->route('category.index');
        }

        return redirect()->route('category.create');
    }

    public function add(CategoryCreateRequest $request)
    {
        if ($request->ajax()) {
            Category::create($request->all());

            $categoryname = $request->input('category_name');

            return response()->json([
                'title' => $categoryname,
                'message' => '¡Agregado correctamente!'
            ]);
        }
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('category.show', ['category' => $category]);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('category.edit', ['category' => $category]);
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        try {
            $category = Category::findOrFail($id);

            $categoryname = $category->category_name;

            $category->fill($request->all());

            $category->save();

            Toastr::success(
                '¡Actualizado correctamente!',
                $title = $categoryname,
                $options = [
                    'positionClass' => 'toast-bottom-left-blue'
                ]);

            return redirect()->route('category.index');

        } catch (QueryException $exception) {

            $errorCode = $exception->errorInfo[1];

            if ($errorCode == 1062) {
                Toastr::warning(
                    '¡La categoría ya existe!',
                    $title = $categoryname,
                    $options = [
                        //
                    ]);
            }

            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $categoryname = $category->category_name;

        $category->delete();

        return response()->json([
            'title' => $categoryname,
            'message' => '¡Eliminado correctamente!'
        ]);
    }
}
