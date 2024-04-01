<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\SubCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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

    // all admin category routes
    Route::prefix('category')->group(function(){
        Route::get('/view',[CategoryController::class, 'CategoryView'])->name('all.category');
        Route::post('/store',[CategoryController::class, 'CategoryStore'])->name('category.store');
        Route::get('/edit/{id}',[CategoryController::class, 'CategoryEdit'])->name('category.edit');
        Route::post('/update',[CategoryController::class, 'CategoryUpdate'])->name('category.update');
        Route::get('/delete/{id}',[CategoryController::class, 'CategoryDelete'])->name('category.delete');
    });

    // all admin subcategory routes
    Route::prefix('subcategory')->group(function(){
        Route::get('/sub/view',[SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');
        Route::post('/sub/store',[SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
        Route::get('sub/edit/{id}',[SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
        Route::post('sub/update',[SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
        Route::get('/delete/{id}',[SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');

    });
});

require __DIR__.'/auth.php';
