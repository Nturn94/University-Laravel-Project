<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;


use App\Models\User;
use App\Models\Product;
use App\Models\Review;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class, 'index']);

Route::get('/documentation', function () {
    return view('products/documentation');
});

// Route::get('/test', function () {
//     $user = User::find(1);
//     // $prods = $user->products;
//     // dd($prods);

//     $name = 'Company';
//     $prods = $user->products()->WhereRaw('name like ?', array("%$name%"));
//     // dd($prods);

//     $query = 'name like ?';
//     $name = "Company";
//     $products = Product::whereHas('manufacturer', function($query) use($name){
//         return $query->whereRaw('name like ?', array("%$name%"));
//     })->get();
//     dd($products);

// });


Route::resource('product', ProductController::class);
Route::resource('review', ReviewController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
