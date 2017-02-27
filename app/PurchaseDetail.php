<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    protected $fillable = [
        'purchase_id',
        'item_id',
        'purchase_price_without_igv',
        'purchase_price_with_igv',
        'purchase_quantity',
        'purchase_amount'
    ];
}
