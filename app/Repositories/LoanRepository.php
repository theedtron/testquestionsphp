<?php

namespace App\Repositories;

use App\Models\Loan;
use App\Models\LoanProduct;
use App\Repositories\Interfaces\LoanRepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class LoanRepository implements LoanRepositoryInterface {
    public function all() : Paginator
    {
        return Loan::query()->paginate(15);
    }
    public function find(String $id) : ?Loan
    {
        return Loan::query()->find($id);
    }
    public function insert(Array $attributes) : Bool{
        $product = LoanProduct::query()->find($attributes['prodcut_id']);

        $interest_rate = $product->interest_rate;
        $interest_amount = $attributes['principle'] * ($interest_rate/100);
        $total_amount = $attributes['principle'] + $interest_amount;
        $loan_data = [
            'prodcut_id' => $attributes['prodcut_id'],
            'customer_id' => $attributes['customer_id'],
            'principle' => $attributes['principle'],
            'total_amount' => $total_amount,
            'balance' => $total_amount,
        ];
        Loan::create($loan_data);
        return true;
    }
    public function update(String $id, Array $attributes) : Bool{
        $get_customer = Loan::query()->find($id);
        if($get_customer){
            $get_customer->update($attributes);
            return true;
        }else{
            return false;
        }
    }
}
