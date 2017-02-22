<?php

namespace App;

use App\Traits\DatesTranslator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Supplier extends Model
{
    use DatesTranslator;

    protected $fillable = [
        'supplier_ruc',
        'supplier_businessname',
        'supplier_legaladdress',
        'supplier_city',
        'supplier_phone',
        'supplier_email',
        'supplier_observation',
        'supplier_status'
    ];

    public function setSupplierBusinessnameAttribute($value)
    {
        $this->attributes['supplier_businessname'] = ucwords(Str::lower(strip_tags($value)));
    }

    public function setSupplierLegaladdressAttribute($value)
    {
        $this->attributes['supplier_legaladdress'] = ucwords(Str::lower(strip_tags($value)));
    }

    public function setSupplierCityAttribute($value)
    {
        $this->attributes['supplier_city'] = ucfirst(Str::lower(strip_tags($value)));
    }

    public function setSupplierEmailAttribute($value)
    {
        $this->attributes['supplier_email'] = Str::lower(strip_tags($value));
    }

    public function setSupplierObservationAttribute($value)
    {
        $this->attributes['supplier_observation'] = ucfirst(Str::lower(strip_tags($value)));
    }
}
