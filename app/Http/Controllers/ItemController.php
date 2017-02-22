<?php

namespace App\Http\Controllers;

use App\Item;
use App\Http\Requests\ItemCreateRequest;
use App\Http\Requests\ItemUpdateRequest;
use Illuminate\Database\QueryException;
use Intervention\Image\Facades\Image;
use Yajra\Datatables\Facades\Datatables;

class ItemController extends Controller
{
    public function listing()
    {
        $items = Item::join('brands', 'brands.id', '=', 'items.brand_id')
            ->select([
                'items.id',
                'items.item_image',
                'items.item_barcode',
                'items.item_code',
                'items.item_description',
                'brands.brand_name',
                'items.item_status'
            ]);

        return Datatables::of($items)
            ->addColumn('action', function ($item) {
                if ($item->item_status) {
                    $itemstatus = '<i class="fa fa-toggle-on" aria-hidden="true" title="Activo"></i>';
                } else {
                    $itemstatus = '<i class="fa fa-toggle-off" aria-hidden="true" title="Inactivo"></i>';
                }
                return '<a href="item/' . $item->id . '"><i class="fa fa-eye" aria-hidden="true" title="Ver detalle"></i></a> 
                 <a href="item/' . $item->id . '/edit"><i class="fa fa-pencil" aria-hidden="true" title="Editar"></i></a> ' . $itemstatus . '
                <button type="button" class="btn btn-link m-0 p-0 align-baseline remove" value="' . $item->id . '" onclick="confirmDelete(this);" data-toggle="modal" data-target="#modalQuestion"><i class="fa fa-remove" aria-hidden="true" title="Remover"></i></button>';
            })
            ->editColumn('item_image', function ($item) {
                return '<div class="imageitem"><ul><li><img src="images/item/thumbnail/' . $item->item_image . '"></li></ul></div>';
            })
            ->editColumn('item_barcode', function ($item) {
                return '<a href="item/' . $item->id . '">' . $item->item_barcode . '</a>';
            })
            ->editColumn('item_description', function ($item) {
                return '<a href="item/' . $item->id . '" title="' . $item->item_description . '">' . str_limit($item->item_description, 50) . '</a>';
            })
            ->make(true);
    }

    public function index()
    {
        return view('item.index');
    }

    public function create()
    {
        return view('item.create');
    }

    public function store(ItemCreateRequest $request)
    {
        if ($request->ajax()) {

            $item = new Item($request->all());

            if ($request->hasFile('item_image')) {

                $image = $request->file('item_image');
                $name = $request->input('item_barcode');
                $filename = $name . '.' . $image->getClientOriginalExtension();

                Image::make($image)->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('/images/item/thumbnail/' . $filename));

                Image::make($image)->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('/images/item/400px/' . $filename));

                Image::make($image)->resize(700, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('/images/item/700px/' . $filename));

                $item->item_image = $filename;
            }

            $item->save();

            $title = $request->input('item_barcode');

            return response()->json([
                'title' => $title,
                'message' => '¡Agregado correctamente!'
            ]);
        }
    }

    public function show($id)
    {
        $item = Item::join('categories', 'categories.id', '=', 'items.category_id')
            ->join('brands', 'brands.id', '=', 'items.brand_id')
            ->join('measures', 'measures.id', '=', 'items.measure_id')
            ->select(
                'items.id',
                'items.item_barcode',
                'items.item_code',
                'items.item_alternative_code',
                'items.item_description',
                'categories.category_name',
                'brands.brand_name',
                'measures.measure_name',
                'items.item_description_measure',
                'items.item_observations',
                'items.item_min_stock',
                'items.item_image',
                'items.item_status',
                'items.created_at',
                'items.updated_at'
            )
            ->where('items.id', $id)
            ->get()
            ->first();

        return view('item.show', ['item' => $item]);
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);

        return view('item.edit', ['item' => $item]);
    }

    public function update(ItemUpdateRequest $request, $id)
    {
        try {
            $item = Item::findOrFail($id);

            $title = $item->item_barcode;

            $item->fill($request->all());

            if ($request->hasFile('item_image')) {
                $image = $request->file('item_image');
                $name = $item->item_barcode;
                $filename = $name . '.' . $image->getClientOriginalExtension();

                Image::make($image)->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('/images/item/thumbnail/' . $filename));

                Image::make($image)->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('/images/item/400px/' . $filename));

                Image::make($image)->resize(700, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('/images/item/700px/' . $filename));

                $item->item_image = $filename;
            }

            $item->save();

            return response()->json([
                'title' => $title,
                'message' => '¡Actualizado correctamente!'
            ]);

        } catch (QueryException $exception) {

            $errorCode = $exception->errorInfo[1];

            if ($errorCode == 1062) {
                return response()->json([
                    'title' => $title,
                    'message' => '¡El item ya existe!'
                ]);
            }

            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);

        $title = $item->item_barcode;

        $item->delete();

        return response()->json([
            'title' => $title,
            'message' => '¡Eliminado correctamente!'
        ]);
    }
}
