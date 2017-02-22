<?php

namespace App;

use App\Traits\DatesTranslator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Brand extends Model
{
    use DatesTranslator;

    protected $fillable = [
        'brand_name',
        'brand_description',
        'brand_status'
    ];

    public static function brands()
    {
        return Brand::select('id', 'brand_name')->get();
    }

    public function setBrandNameAttribute($value)
    {
        $this->attributes['brand_name'] = ucfirst(Str::lower(strip_tags($value)));
    }

    public function setBrandDescriptionAttribute($value)
    {
        $this->attributes['brand_description'] = ucfirst(Str::lower(strip_tags($value)));
    }
}
