<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\frontend\IndexController;

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


// frontend routes
Route::get('/', [IndexController::class,'index'])->name('load.index');
Route::post('/mail', [IndexController::class,'sendMail'])->name('send.mail');
Route::get('/all/product/{id}/{slug}', [IndexController::class,'getAllProducts']);
Route::get('/all/SubCategory/product/{id}/{slug}', [IndexController::class,'getAllSubProducts']);
Route::get('/product/detail/{id}/{slug}', [IndexController::class,'getProductDetail']);
Route::get('/search',[IndexController::class, 'searchProduct'])->name('product.search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// backend routes
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

        Route::get('/subcategory/ajax/{category_id}',[SubCategoryController::class, 'GetSubCategory'])->name('get.all.SubCategory');
    });

    // all admin slider routes
    Route::prefix('slider')->group(function(){
        Route::get('/view',[SliderController::class, 'sliderView'])->name('manage.slider');
        Route::post('/store',[SliderController::class, 'sliderStore'])->name('slider.store');
        Route::get('/edit/{id}',[SliderController::class, 'sliderEdit'])->name('slider.edit');
        Route::post('/update',[SliderController::class, 'sliderUpdate'])->name('slider.update');
        Route::get('/delete/{id}',[SliderController::class, 'sliderDelete'])->name('slider.delete');
    });

    // all admin product routes
    Route::prefix('product')->group(function(){
        Route::get('/add',[ProductController::class,'AddProduct'])->name('add.product');
        Route::get('/view',[ProductController::class,'viewProducts'])->name('manage.product');
        Route::post('/store',[ProductController::class, 'storeProduct'])->name('product.store');
        Route::post('/update',[ProductController::class, 'updateProduct'])->name('product.update');
        Route::get('/edit/{id}',[ProductController::class, 'editProduct'])->name('product.edit');
        Route::get('/delete/{id}',[ProductController::class, 'deleteProduct'])->name('product.delete');
    });
});

require __DIR__.'/auth.php';
