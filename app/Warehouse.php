<?php

namespace App;

use App\Traits\DatesTranslator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Warehouse extends Model
{
    use DatesTranslator;

    protected $fillable = [
        'warehouse_name',
        'warehouse_description',
        'warehouse_status'
    ];

    public function setWarehouseNameAttribute($value)
    {
        $this->attributes['warehouse_name'] = ucfirst(Str::lower(strip_tags($value)));
    }

    public function setWarehouseDescriptionAttribute($value)
    {
        $this->attributes['warehouse_description'] = ucfirst(Str::lower(strip_tags($value)));
    }
}
