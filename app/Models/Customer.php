<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'name','email','dob','phone','national_id','address'
    ];

    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class);
    }
}
