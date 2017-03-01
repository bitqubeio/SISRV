<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'item_id',
        'stock_quantity'
    ];

    //
    public static function stock($item)
    {
        return Stock::where('item_id', $item)
            ->select('id', 'stock_quantity')
            ->get()
            ->first();
    }
}
