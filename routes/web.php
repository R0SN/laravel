<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Food;
use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\OpeningHourController;
use App\Http\Controllers\SettingsController;

// Route::get('/', function () {
//     return view('frontend.index');
// });
// Route::get('/pricing', [FoodController::class, 'index'])->name('pricing');
Route::get('/', [IndexController::class, 'index']);

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


Route::post('/food-item/store', [FoodController::class, 'store'])->name('backend.food.store');
Route::get('/backend/food', [FoodController::class, 'index'])->name('backend.food');
Route::delete('/food/{id}', [FoodController::class, 'destroy'])->name('backend.food.destroy');
Route::get('/foods/{id}/edit', [FoodController::class, 'edit'])->name('backend.food.edit');
Route::put('/foods/{id}', [FoodController::class, 'update'])->name('backend.food.update');

Route::post('/reserve', [IndexController::class, 'storeReservation'])->name('frontend.reserve');
Route::get('/backend/reservations', [ReservationController::class, 'showReservations'])->name('backend.reservations')->middleware('auth');
Route::delete('/reservation/{id}', [ReservationController::class, 'destroyReservation'])->name('backend.destroyReservation');

Route::get('/opening-hours', [OpeningHourController::class, 'index'])->name('backend.opening-hours');
Route::post('/opening-hours', [OpeningHourController::class, 'store'])->name('backend.opening-hours.store');
Route::get('/opening-hours/{openingHour}/edit', [OpeningHourController::class, 'edit'])->name('backend.opening_hours.edit');
Route::put('/opening-hours/{openingHour}', [OpeningHourController::class, 'update'])->name('backend.opening-hours.update');
Route::delete('/opening-hours/{openingHour}', [OpeningHourController::class, 'destroy'])->name('backend.opening-hours.destroy');


Route::get('/settings', [SettingsController::class, 'index'])->name('backend.settings');
Route::put('/settings', [SettingsController::class, 'update'])->name('backend.settings.update');
