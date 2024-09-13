<?php
namespace App\Repositories\Interfaces;

use App\Models\Loan;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

Interface LoanRepositoryInterface {
    function all() : Paginator;
    function find(String $id) : ?Loan;
    function insert(Array $attributes) : Bool;
    function update(String $id, Array $attributes) : Bool;
}
