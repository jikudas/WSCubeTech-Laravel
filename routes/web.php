<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


Route::get('/', function () {
    return view('index');
})->name('/');

Route::get('/register', [RegistrationController::class, 'index'])->name('register');
Route::post('/register', [RegistrationController::class, 'register'])->name('register');

Route::get('/customer/create', [CustomerController::class, 'index'])->name('customer.create');
Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');
Route::get('/customer/view', [CustomerController::class, 'view'])->name('customer.view');
Route::get('/customer/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');
Route::get('/customer/force-delete/{id}', [CustomerController::class, 'forceDelete'])->name('customer.force.delete');
Route::get('/customer/trash', [CustomerController::class, 'trash'])->name('customer.trash');
Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
Route::get('/customer/restore/{id}', [CustomerController::class, 'restore'])->name('customer.restore');
Route::post('/customer/update/{id}', [CustomerController::class, 'update'])->name('customer.update');


Route::get('/upload', function () {
    return view('upload');
});
Route::post('/upload', [CustomerController::class, 'upload'])->name('customer.upload');