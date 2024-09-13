<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanProduct extends Model
{
    use HasFactory;

    protected $table = 'loan_products';

    protected $fillable = [
        'name','code','min_amoun','max_amount','interest_rate','currency_id'
    ];
}
