<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{

    public static function payment_conditions()
    {
        return Paymentcondition::select('id', 'paymentcondition_name')->get();
    }
}
