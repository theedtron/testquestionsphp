<?php

use App\Http\Controllers\Question2\CustomerController;
use App\Http\Controllers\Question2\LoanController;
use App\Http\Controllers\Question2\LoanProductController;
use App\Http\Controllers\Question2\ProfileController;
use App\Http\Controllers\Question2\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => 'customers'], function(){
        Route::get('/', [CustomerController::class, 'index'])->name('customers');
        Route::get('create', [CustomerController::class, 'create']);
        Route::post('create/post', [CustomerController::class, 'store'])->name('customers.save');
        Route::post('create/update', [CustomerController::class, 'update'])->name('customers.update');
    });
    Route::group(['prefix' => 'loanproducts'], function(){
        Route::get('/', [LoanProductController::class, 'index'])->name('loan.products');
        Route::get('create', [LoanProductController::class, 'create']);
        Route::post('create/save', [LoanProductController::class, 'store']);
        Route::post('create/update', [LoanProductController::class, 'update'])->name('loanproduct.update');
    });
    Route::group(['prefix' => 'loans'], function(){
        Route::get('/', [LoanController::class, 'index'])->name('loans');
        Route::get('create/{customer_id}', [LoanController::class, 'create'])->name('loan.create');
        Route::post('create/save', [LoanController::class, 'save'])->name('loan.save');
    });

    Route::get('users', [UserController::class, 'index'])->name('users');

});

require __DIR__.'/auth.php';
