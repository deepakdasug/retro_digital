<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company_name',
        'company_address',
        'website_url',
        'referral_source',
        'service',
        'message',
    ];
}
