<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deals extends Model
{
     /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'company_name','company_type','industry',
        'address','phone','email','amount_to_raise','company_cover_photo',
        'company_details','business_plan','memo_of_understanding',
        'cert_of_registration','financial_state',
        'cash_flow','contract_doc','certified_audit_acc'
    ];
}


