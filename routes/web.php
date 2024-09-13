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
        Route::get('create/update/{id}', [CustomerController::class, 'update'])->name('customers.create.update');
        Route::post('update/post', [CustomerController::class, 'updatePost'])->name('customers.update.post');
    });
    Route::group(['prefix' => 'loanproducts'], function(){
        Route::get('/', [LoanProductController::class, 'index'])->name('loan.products');
        Route::get('create', [LoanProductController::class, 'create']);
        Route::post('create/save', [LoanProductController::class, 'store']);
        Route::get('create/update/{id}', [LoanProductController::class, 'update'])->name('loanproduct.create.update');
        Route::post('update/post', [LoanProductController::class, 'updatePost'])->name('loanproduct.update.post');
    });
    Route::group(['prefix' => 'loans'], function(){
        Route::get('/', [LoanController::class, 'index'])->name('loans');
        Route::get('create/{customer_id}', [LoanController::class, 'create'])->name('loan.create');
        Route::post('save', [LoanController::class,'storeLoan'])->name('loan.save');
        Route::get('approve/{loanId}', [LoanController::class,'approveLoan'])->name('loan.approve');
        Route::get('disburse/{loanId}', [LoanController::class,'disburseLoan'])->name('loan.disburse');
    });

    Route::get('users', [UserController::class, 'index'])->name('users');

});

require __DIR__.'/auth.php';
