<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;


Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/login',function (){
    return view('user.login');
})->name('login');

Route::post('login/verify',[\App\Http\Controllers\UserController::class,'verifyUser'])->name('login.verification');
Route::get('logout',[\App\Http\Controllers\UserController::class,'logout'])->name('logout');

Route::get('/backend/dashboard',function (){
    return view('backend.dashboard');
})->name('backend.dashboard')->middleware('auth');

Route::get('/backend/foodCategory',function(){
    return view('backend.foodCategory');
})->name('backend.foodCategory');

Route::get('/backend/food',function(){
    return view('backend.food');
})->name('backend.food');

Route::get('/categories', [FoodController::class, 'index'])->name('backend.foodCategory');
Route::delete('/categories/{id}', [FoodController::class, 'destroy'])->name('backend.category.destroy');
Route::get('/categories/{id}/edit', [FoodController::class, 'edit'])->name('backend.category.edit');
Route::put('/categories/{id}', [FoodController::class, 'update'])->name('backend.category.update');
Route::post('/food-categories', [FoodController::class, 'store'])->name('foodCategories.store');
Route::put('/food-categories/{id}', [FoodController::class, 'update'])->name('foodCategories.update');