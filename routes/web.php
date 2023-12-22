<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;

Route::controller(HomeController::class)->group(function() {
    Route::get('/', 'index')->name('frontend');
    Route::get('/about', 'about')->name('about');
    Route::get('/catalog', 'catalog')->name('catalog');
    Route::get('/contact', 'contact')->name('contact');
});

// Auth
Route::controller(LoginController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/signUp', 'signUp')->name('signUp');
    Route::get('/login', 'login')->name('login');
    Route::post('/signIn', 'signIn')->name('signIn');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

// Dashboard
Route::middleware(['auth', 'auth.session'])->group(function () {

    // Department
    Route::prefix('department')->group(function () {
        Route::get('', [DepartmentController::class, 'index'])->name('department.index');
        Route::post('/store', [DepartmentController::class, 'store'])->name('department.store');
        Route::get('/show/{id}', [DepartmentController::class, 'show'])->name('department.show');
        Route::get('/edit/{id}', [DepartmentController::class, 'edit'])->name('department.edit');
        Route::put('/update/{id}', [DepartmentController::class, 'update'])->name('department.update');
        Route::delete('/destroy/{id}', [DepartmentController::class, 'destroy'])->name('department.destroy');
    });

    // Employee
    Route::prefix('employee')->group(function () {
        Route::get('', [EmployeeController::class, 'index'])->name('employee.index');
        Route::post('/store', [EmployeeController::class, 'store'])->name('employee.store');
        Route::get('/show/{id}', [EmployeeController::class, 'show'])->name('employee.show');
        Route::get('/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
        Route::get('/editImage/{id}', [EmployeeController::class, 'editImage'])->name('employee.editImage');
        Route::put('/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
        Route::put('/updateImage/{id}', [EmployeeController::class, 'updateImage'])->name('employee.updateImage');
        Route::delete('/destroy/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
        Route::delete('/destroyImage/{id}', [EmployeeController::class, 'destroyImage'])->name('employee.destroyImage');
    });

    // Customer
    Route::prefix('customer')->group(function () {
        Route::get('', [UserController::class, 'customer'])->name('customer.index');
    });

    // Order + Order Item
    Route::prefix('order')->group(function () {
        Route::get('', [OrderController::class, 'index'])->name('order.index');
        Route::get('/create', [OrderController::class, 'create'])->name('order.create');
        Route::post('/store', [OrderController::class, 'store'])->name('order.store');
        Route::get('/show/{id}', [OrderController::class, 'show'])->name('order.show');
        Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
        Route::put('/update/{id}', [OrderController::class, 'updateOrder'])->name('order.updateOrder');
        Route::delete('/destroy/{id}', [OrderController::class, 'destroy'])->name('order.destroy');

        Route::put('sendAll/{id}', [OrderController::class, 'sendAll'])->name('order.sendAll');
        Route::put('confirmAll/{id}', [OrderController::class, 'confirmAll'])->name('order.confirmAll');

        Route::post('/show/{id}/store', [OrderItemController::class, 'store'])->name('orderitem.store');
        Route::put('/show/{id}/update/{itemid}', [OrderItemController::class, 'update'])->name('orderitem.update');
        Route::get('/show/{id}/edit/{itemid}', [OrderItemController::class, 'edit'])->name('orderitem.edit');
        Route::delete('/show/{id}/destroy/{itemid}', [OrderItemController::class, 'destroy'])->name('orderitem.destroy');
    });

    // Order Item
    Route::prefix('orderItem')->group(function() {
        Route::get('{id}', [OrderController::class, 'flagKirim'])->name('orderItem.flagKirim');
        Route::get('{id}/deleteItem', [OrderController::class, 'destroyItem'])->name('orderItem.deleteItem');
        Route::post('importItem', [OrderController::class, 'importItem'])->name('orderItem.importItem');
    });

    // product category
    Route::prefix('category')->group(function () {
        Route::get('', [ProductCategoryController::class, 'index'])->name('category.index');
        Route::post('/store', [ProductCategoryController::class, 'store'])->name('category.store');
        Route::get('/show/{id}', [ProductCategoryController::class, 'show'])->name('category.show');
        Route::get('/edit/{id}', [ProductCategoryController::class, 'edit'])->name('category.edit');
        Route::put('/update/{id}', [ProductCategoryController::class, 'update'])->name('category.update');
        Route::delete('/destroy/{id}', [ProductCategoryController::class, 'destroy'])->name('category.destroy');
    });

    // product
    Route::prefix('product')->group(function () {
        Route::get('', [ProductController::class, 'index'])->name('product.index');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/show/{id}', [ProductController::class, 'show'])->name('product.show');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::get('/editImage/{id}', [ProductController::class, 'editImage'])->name('product.editImage');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::put('/updateImage/{id}', [ProductController::class, 'updateImage'])->name('product.updateImage');
        Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    });

    Route::prefix('user')->group(function () {
        Route::get('', [UserController::class, 'index'])->name('user.index');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });

    // Slider
    Route::prefix('slider')->group(function () {
        Route::get('', [SliderController::class, 'index'])->name('slider.index');
        Route::post('/store', [SliderController::class, 'store'])->name('slider.store');
        Route::get('/show/{id}', [SliderController::class, 'show'])->name('slider.show');
        Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
        Route::put('/update/{id}', [SliderController::class, 'update'])->name('slider.update');
        Route::delete('/destroy/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');
    });

    // Testimonial
    Route::prefix('testimonial')->group(function () {
        Route::get('', [TestimoniController::class, 'index'])->name('testimonial.index');
        Route::post('/store', [TestimoniController::class, 'store'])->name('testimonial.store');
        Route::get('/show/{id}', [TestimoniController::class, 'show'])->name('testimonial.show');
        Route::get('/edit/{id}', [TestimoniController::class, 'edit'])->name('testimonial.edit');
        Route::put('/update/{id}', [TestimoniController::class, 'update'])->name('testimonial.update');
        Route::delete('/destroy/{id}', [TestimoniController::class, 'destroy'])->name('testimonial.destroy');
    });

});
