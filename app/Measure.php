<?php

namespace App;

use App\Traits\DatesTranslator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Measure extends Model
{
    use DatesTranslator;

    protected $fillable = [
        'measure_name',
        'measure_description',
        'measure_status'
    ];

    public static function measures()
    {
        return Measure::select('id', 'measure_name')->get();
    }

    public function setMeasureNameAttribute($value)
    {
        $this->attributes['measure_name'] = ucfirst(Str::lower(strip_tags($value)));
    }

    public function setMeasureDescriptionAttribute($value)
    {
        $this->attributes['measure_description'] = ucfirst(Str::lower(strip_tags($value)));
    }
}
