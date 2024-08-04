<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Food;
use App\Http\Controllers\FoodCategoryController;
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

Route::get('/backend/editFood',function(){
    return view('backend.editFoodItem');
})->name('backend.editFood');



Route::get('/categories', [FoodCategoryController::class, 'index'])->name('backend.foodCategory');
Route::delete('/categories/{id}', [FoodCategoryController::class, 'destroy'])->name('backend.category.destroy');
Route::get('/categories/{id}/edit', [FoodCategoryController::class, 'edit'])->name('backend.category.edit');
Route::put('/categories/{id}', [FoodCategoryController::class, 'update'])->name('backend.category.update');
Route::post('/food-categories', [FoodCategoryController::class, 'store'])->name('foodCategories.store');
// Route::put('/food-categories/{id}', [FoodCategoryController::class, 'update'])->name('foodCategories.update');


Route::post('/food-item', [FoodController::class, 'store'])->name('backend.food.store');
Route::get('/backend/food', [FoodController::class, 'index'])->name('backend.food');
Route::delete('/food/{id}', [FoodController::class, 'destroy'])->name('backend.food.destroy');
Route::get('/foods/{id}/edit', [FoodController::class, 'edit'])->name('backend.food.edit');
Route::put('/foods/{id}', [FoodController::class, 'update'])->name('backend.food.update');
