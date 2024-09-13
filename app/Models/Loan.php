<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Loan extends Model
{
    use HasFactory;

    protected $table = 'loans';

    protected $fillable = [
        'customer_id','product_id','principle','total_amount','balance',
        'status_id'
    ];

    public function loanProducts(): BelongsTo
    {
        return $this->belongsTo(LoanProduct::class,'product_id');
    }

    public function customers() : BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
