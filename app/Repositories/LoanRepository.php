<?php

namespace App\Repositories;

use App\Models\Loan;
use App\Models\LoanProduct;
use App\Repositories\Interfaces\LoanRepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use PhpParser\Node\Expr\BinaryOp\BooleanOr;

class LoanRepository implements LoanRepositoryInterface {
    public function all() : Paginator
    {
        return Loan::query()->with('customer')->paginate(15);
    }
    public function find(String $id) : ?Loan
    {
        return Loan::query()->find($id);
    }
    public function insert(Array $attributes) : Bool{
        $product = LoanProduct::query()->find($attributes['product_id']);

        $interest_rate = $product->interest_rate;
        $interest_amount = $attributes['amount'] * ($interest_rate/100);
        $total_amount = $attributes['amount'] + $interest_amount;
        $loan_data = [
            'product_id' => $attributes['product_id'],
            'customer_id' => $attributes['customer_id'],
            'principle' => $attributes['amount'],
            'total_amount' => $total_amount,
            'balance' => $total_amount,
            'status_id' => 1,
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

    public function approve(String $id): Bool
    {
        $get_loan = Loan::query()->find($id);
        if($get_loan){
            $get_loan->status_id = 2;
            $get_loan->save();
            return true;
        }else{
            return false;
        }
    }

    public function disburse(String $id): Bool
    {
        $get_loan = Loan::query()->find($id);
        if($get_loan){
            $get_loan->status_id = 3;
            $get_loan->save();
            return true;
        }else{
            return false;
        }
    }
}
