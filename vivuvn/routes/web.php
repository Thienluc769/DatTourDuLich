<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Enterprise\HotelController;
use App\Http\Controllers\Enterprise\InvoiceController;
use App\Http\Controllers\Enterprise\ProductController;
use App\Http\Controllers\Enterprise\tourGuideController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Enterprise\EnterpriseController;
use App\Http\Controllers\Admin\ReviewRegistrationController;
use App\Http\Controllers\Admin\ReviewTourController;
use App\Http\Controllers\Admin\EnterprisesController;


//client
Route::prefix('/')->group(function(){
Route::get('/', [ClientController::class, 'index'])->name('client-home');
    Route::get('/login', [ClientController::class, 'login'])->name('client-login');
    Route::post('/', [ClientController::class, 'postLogin'])->name('client-postLogin');
    Route::get('/register', [ClientController::class, 'register'])->name('client-register');
    Route::post('/register', [ClientController::class, 'regisAccount'])->name('client-regisAcc');
    
    
    Route::get('/tour_list', [ClientController::class, 'tour_list'])->name('client-tourList');
    Route::get('/tour_list/detail{id}', [ClientController::class, 'detail'])->name('client-detail');
    Route::get('/search', [ClientController::class, 'search_Tour'])->name('client-search-tour');
    Route::prefix('/')->middleware('check.auth')->group(function(){
        Route::get('/profile{id}', [ClientController::class, 'profileIndex'])->name('client-profile');
        Route::get('/my-orders{id}', [ClientController::class, 'myOrders'])->name('client-orders');
        Route::post('/tour_list/detail{id}/book', [ClientController::class, 'payment'])->name('client-payment');
        Route::post('/tour_list/detail{id}/book/payment', [ClientController::class, 'store'])->name('client-store');
        Route::get('/_logout', [ClientController::class, 'logout'])->name('client-logout');
    });
    Route::get('/services', [ClientController::class, 'services'])->name('client-services');
    Route::get('/about', [ClientController::class, 'about'])->name('client-about');
    Route::get('/contact', [ClientController::class, 'contact'])->name('client-contact');
    Route::get('/search_tour', [ClientController::class, 'search'])->name('client-search');
    Route::get('/compare-tours', [ClientController::class, 'compare_tours'])->name('compare-tours');
    
});





//enterprise
Route::prefix('/enterprise')->group(function(){
    Route::get('/', [EnterpriseController::class, 'index'])->name('enterprise-index');
    Route::get('/enterprise_register', [EnterpriseController::class, 'enterprise_regis'])->name('enterprise-regis');
    Route::post('/enterprise_register', [EnterpriseController::class, 'enterprise_post_register'])->name('enterprise-post-regis');
    Route::get('/logout', [EnterpriseController::class, 'logout'])->name('enterprise-logout');


    Route::prefix('product')->group(function(){
        Route::get('/', [ProductController::class, 'index'])->name('product-index');
        Route::get('/create', [ProductController::class, 'create'])->name('product-create');
        Route::post('/create', [ProductController::class, 'store'])->name('product-store');
        Route::get('/edit{id}', [ProductController::class, 'edit'])->name('product-edit');
        Route::post('/edit{id}', [ProductController::class, 'update'])->name('product-update');
        Route::get('/detail{id}', [ProductController::class, 'show'])->name('product-show');
        Route::post('/soft_delete{id}', [ProductController::class, 'soft_destroy'])->name('product-soft_destroy');
        Route::post('/pending_delete{id}', [ProductController::class, 'pending_delete'])->name('pending-delete');
        Route::get('/trash',[ProductController::class, 'trash'])->name('product-trash');
        Route::get('/restore{id}',[ProductController::class, 'restore'])->name('product-restore');
        Route::get('/delete{id}',[ProductController::class, 'destroy'])->name('product-destroy');
    });


    Route::prefix('hotel')->group(function(){
        Route::get('/', [HotelController::class, 'index'])->name('hotel-index');
        Route::get('/create', [HotelController::class, 'create'])->name('hotel-create');
        Route::post('/create', [HotelController::class, 'store'])->name('hotel-store');
        Route::post('/category', [HotelController::class, 'category'])->name('category-create');
        Route::get('/edit{id}', [HotelController::class, 'edit'])->name('hotel-edit');
        Route::post('/edit{id}', [HotelController::class, 'update'])->name('hotel-update');
        Route::post('/soft_delete{id}', [HotelController::class, 'soft_destroy'])->name('hotel-soft_destroy');
        Route::get('/trash',[HotelController::class, 'trash'])->name('hotel-trash');
        Route::get('/restore{id}',[HotelController::class, 'restore'])->name('hotel-restore');
        Route::get('/delete{id}',[HotelController::class, 'destroy'])->name('hotel-destroy');
    });
    
    Route::prefix('tour_guide')->group(function(){
        Route::get('/', [tourGuideController::class, 'index'])->name('tourGuide-index');
        Route::get('/create', [tourGuideController::class, 'create'])->name('tourGuide-create');
        Route::post('/create', [tourGuideController::class, 'store'])->name('tourGuide-store');
        Route::get('/edit{id}', [tourGuideController::class, 'edit'])->name('tourGuide-edit');
        Route::post('/edit{id}', [tourGuideController::class, 'update'])->name('tourGuide-update');
        Route::post('/soft_delete{id}', [tourGuideController::class, 'soft_destroy'])->name('tourGuide-soft_destroy');
        Route::get('/trash',[tourGuideController::class, 'trash'])->name('tourGuide-trash');
        Route::get('/restore{id}',[tourGuideController::class, 'restore'])->name('tourGuide-restore');
        Route::get('/delete{id}',[tourGuideController::class, 'destroy'])->name('tourGuide-destroy');
    });
    
    Route::prefix('invoice')->group(function(){
        Route::get('/', [InvoiceController::class, 'index'])->name('invoice-index');
        Route::get('/detail{id}', [InvoiceController::class, 'show'])->name('invoice-detail');
        Route::post('/approve_invoice{id}', [InvoiceController::class, 'invoice_approve'])->name('invoice-approve');
        Route::post('/reject_invoice{id}', [InvoiceController::class, 'invoice_reject'])->name('invoice-reject');
    });
});








//admin
Route::get('/manager_login', [DashboardController::class, 'login'])->name('user-login');
Route::post('/login', [DashboardController::class, 'postLogin'])->name('user-postLogin');



Route::prefix('manage')->middleware('admin')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('admin-dashboard');
    
    Route::prefix('enterprises')->group(function(){
        Route::get('/', [EnterprisesController::class, 'index'])->name('enterprises-index');
        Route::get('/detail{id}', [ReviewRegistrationController::class, 'detail'])->name('enterprises-detail');
    });



    Route::prefix('review_registration')->group(function(){
        Route::get('/', [ReviewRegistrationController::class, 'index'])->name('review-registration');
        Route::get('/detail{id}', [ReviewRegistrationController::class, 'detail'])->name('registration-detail');
        Route::get('/detail{id}/tours', [ReviewRegistrationController::class, 'enterpriseTours'])->name('enterprise-tours');
        Route::post('/approve{id}', [ReviewRegistrationController::class, 'approve'])->name('registration-approve');
        Route::post('/reject{id}', [ReviewRegistrationController::class, 'reject'])->name('registration-reject');
    });

    Route::prefix('review_tour')->group(function(){
        Route::get('/', [ReviewTourController::class, 'index'])->name('review-tour');
        Route::get('/detail{id}', [ReviewTourController::class, 'show'])->name('review-tour-details');
        Route::post('/approve{id}', [ReviewTourController::class, 'approve'])->name('review-tour-approve');
        Route::post('/reject{id}', [ReviewTourController::class, 'reject'])->name('review-tour-reject');
    });

    Route::get('/logout', [DashboardController::class, 'logout'])->name('user-logout');
});



