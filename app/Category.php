<?php

namespace App;

use App\Traits\DatesTranslator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use DatesTranslator;

    protected $fillable = [
        'category_name',
        'category_description',
        'category_status'
    ];

    public static function categories()
    {
        return Category::select('id', 'category_name')->get();
    }

    public function setCategoryNameAttribute($value)
    {
        $this->attributes['category_name'] = ucfirst(Str::lower(strip_tags($value)));
    }

    public function setCategoryDescriptionAttribute($value)
    {
        $this->attributes['category_description'] = ucfirst(Str::lower(strip_tags($value)));
    }
}
