<?php

namespace App;

use App\Traits\DatesTranslator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Paymentcondition extends Model
{
    use DatesTranslator;

    protected $fillable = [
        'paymentcondition_name',
        'paymentcondition_mode',
        'paymentcondition_payments',
        'paymentcondition_term',
        'paymentcondition_status'
    ];

    public function setPaymentconditionNameAttribute($value)
    {
        $this->attributes['paymentcondition_name'] = Str::upper(strip_tags($value));
    }
}
