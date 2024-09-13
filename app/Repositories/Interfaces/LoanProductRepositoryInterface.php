<?php
namespace App\Repositories\Interfaces;

use App\Models\Currency;
use App\Models\LoanProduct;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;


Interface LoanProductRepositoryInterface {
    function all() : LengthAwarePaginator;
    function find(String $id) : ?LoanProduct;
    function insert(Array $attributes) : Bool;
    function update(String $id, Array $attributes) : Bool;
    function delete(String $id) : Bool;
    function currencies() : Collection;
    function dropdown() : Collection;
}
