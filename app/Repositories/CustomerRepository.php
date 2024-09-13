<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class CustomerRepository implements CustomerRepositoryInterface {
    public function all() : Paginator
    {
        return Customer::query()->paginate(15);
    }
    public function find(String $id) : ?Customer
    {
        return Customer::query()->find($id);
    }
    public function insert(Array $attributes) : Bool{
        $attributes['dob'] = Carbon::parse($attributes['dob'])->toDateString();
        $attributes['phone'] = '254'.substr($attributes['phone'],-9);
        Customer::create($attributes);
        return true;
    }
    public function update(String $id, Array $attributes) : Bool{
        $get_customer = Customer::query()->find($id);
        if($get_customer){
            $get_customer->update($attributes);
            return true;
        }else{
            return false;
        }
    }
    public function delete(String $id) : Bool{
        $get_customer = Customer::query()->find($id);

        if($get_customer){
            $get_customer->delete();
            return true;
        }else{
            return false;
        }
    }

    public function dropdown(): Collection
    {
        return Customer::query()->get();
    }
}
