<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';

    protected $fillable = [
        'product_id',
        'method',
        'name',
        'lastname',
        'email',
        'status',
        'user_id',
        'transaction_id',
        'transaction_status',
        'payer_id',
        'payer_email',
        'payer_name',
        'payer_country_code',
        'payment_create_time',
        'payment_amount_value',
        'payment_currency_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
