<?php

namespace App\Repositories;

use App\Models\Currency;
use App\Models\LoanProduct;
use App\Repositories\Interfaces\LoanProductRepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;


class LoanProductRepository implements LoanProductRepositoryInterface {
    public function all() : Paginator
    {
        return LoanProduct::query()->paginate(15);
    }
    public function find(String $id) : ?LoanProduct
    {
        return LoanProduct::query()->find($id);
    }
    public function insert(Array $attributes) : Bool{
        LoanProduct::create($attributes);
        return true;
    }
    public function update(String $id, Array $attributes) : Bool{
        $get_customer = LoanProduct::query()->find($id);
        if($get_customer){
            $get_customer->update($attributes);
            return true;
        }else{
            return false;
        }
    }
    public function delete(String $id) : Bool{
        $get_customer = LoanProduct::query()->find($id);

        if($get_customer){
            $get_customer->delete();
            return true;
        }else{
            return false;
        }
    }

    public function currencies() : Collection
    {
        return Currency::query()->get();
    }

    public function dropdown(): Collection
    {
        return LoanProduct::query()->get();
    }
}
