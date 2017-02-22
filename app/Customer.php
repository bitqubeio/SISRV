<?php

namespace App;

use App\Traits\DatesTranslator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Customer extends Model
{
    use DatesTranslator;

    protected $fillable = [
        'customer_ruc_dni',
        'customer_businessname',
        'customer_phone',
        'customer_email',
        'customer_address',
        'customer_city',
        'customer_observation',
        'customer_status'
    ];

    public function setCustomerBusinessnameAttribute($value)
    {
        $this->attributes['customer_businessname'] = ucwords(Str::lower(strip_tags($value)));
    }

    public function setCustomerEmailAttribute($value)
    {
        $this->attributes['customer_email'] = Str::lower(strip_tags($value));
    }

    public function setCustomerAddressAttribute($value)
    {
        $this->attributes['customer_address'] = ucfirst(Str::lower(strip_tags($value)));
    }

    public function setCustomerCityAttribute($value)
    {
        $this->attributes['customer_city'] = ucfirst(Str::lower(strip_tags($value)));
    }

    public function setCustomerObservationAttribute($value)
    {
        $this->attributes['customer_observation'] = ucfirst(Str::lower(strip_tags($value)));
    }
}
