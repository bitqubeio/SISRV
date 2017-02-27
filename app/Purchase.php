<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'purchase_type_currency',
        'paymentcondition_id',
        'supplier_id',
        'purchase_document',
        'purchase_document_number',
        'purchase_igv',
        'purchase_guide_number',
        'purchase_emission_date',
        'purchase_description',
        'purchase_notes'
    ];

    public static function payment_conditions()
    {
        return Paymentcondition::select('id', 'paymentcondition_name')->get();
    }
}
