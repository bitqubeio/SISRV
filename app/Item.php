<?php

namespace App;

use App\Traits\DatesTranslator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Item extends Model
{
    use DatesTranslator;

    protected $fillable = [
        'category_id',
        'brand_id',
        'item_barcode',
        'item_code',
        'item_alternative_code',
        'item_description',
        'item_description_measure',
        'measure_id',
        'item_min_stock',
        'item_image',
        'item_observations',
        'item_status'
    ];

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function setItemBarcodeAttribute($value)
    {
        $this->attributes['item_barcode'] = Str::upper(strip_tags($value));
    }

    public function setItemCodeAttribute($value)
    {
        $this->attributes['item_code'] = Str::upper(strip_tags($value));
    }

    public function setItemAlternativeCodeAttribute($value)
    {
        $this->attributes['item_alternative_code'] = Str::upper(strip_tags($value));
    }

    public function setItemDescriptionAttribute($value)
    {
        $this->attributes['item_description'] = Str::upper(strip_tags($value));
    }

    public function setItemDescriptionMeasureAttribute($value)
    {
        $this->attributes['item_description_measure'] = Str::upper(strip_tags($value));
    }

    public function setItemObservationsAttribute($value)
    {
        $this->attributes['item_observations'] = ucfirst(Str::lower(strip_tags($value)));
    }
}
