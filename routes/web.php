<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});


// Route for displaying all products

Route::get('/products', [ProductController::class, 'index'])->name('product.index');
// ^ This route is accessible via the URL '/products' using a GET request
// ^ When accessed, it calls the 'index' method of the ProductController class




// Route for displaying the product creation form
Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
// ^ This route is accessible via the URL '/products/create' using a GET request
// ^ When accessed, it calls the 'create' method of the ProductController class



// Route for handling the submission of product creation form
Route::post('/products', [ProductController::class, 'store'])->name('product.store');


//add routs for edit page
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');


//route for update data
Route::put('/products/{product}/update', [ProductController::class, 'update'])->name('product.update');



//route for delete data
Route::delete('/products/{product}/delete', [ProductController::class, 'delete'])->name('product.delete');


