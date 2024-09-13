<?php
namespace App\Repositories\Interfaces;

use App\Models\Customer;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

Interface CustomerRepositoryInterface {
    function all() : Paginator;
    function find(String $id) : ?Customer;
    function insert(Array $attributes) : Bool;
    function update(String $id, Array $attributes) : Bool;
    function delete(String $id) : Bool;
    function dropdown() : Collection;
}
