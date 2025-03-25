<?php

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\AdminOrderController;
use App\Http\Controllers\admin\AdminReportController;
use App\Http\Controllers\admin\AdminShippingController;
use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CountryController;
use App\Http\Controllers\admin\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\AuthController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\OrderController;
use Illuminate\Http\Request;
use App\Models\Category;

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
//admin



Route::group(['prefix' => 'admin'], function () {

        Route::group(['middleware' => 'admin.guest'], function () {


                Route::get('password/update', [AdminLoginController::class, 'showUpdateForm'])->name('password.update.form');
                Route::post('password/update', [AdminLoginController::class, 'updatePassword'])->name('password.update');

                Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
                Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])->name('authenticate');
        });



        Route::group(['middleware' => 'admin.auth'], function () {

                Route::get('/dashboard', [AdminLoginController::class, 'dashboard'])->name('admin.dashboard');

                Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
        });

        Route::post('/login_admin', [AdminLoginController::class, 'login_admin'])->name('login_admin');

        Route::get('profile', [AdminLoginController::class, 'profile'])->name('admin.profile');
        Route::post('adminupdate', [AdminLoginController::class, 'adminupdate'])->name('admin.adminupdate');


        //User Module
        Route::get('/user', [AdminUserController::class, 'UserList'])->name('admin.userlist');



        ///OverAll-Order Module
        //buy-order-module
        Route::get('/buy-orders', [AdminOrderController::class, 'BuyIndexOrder'])->name('admin.buyorders.index');
        Route::get('/buy-orders-view/{id}', [AdminOrderController::class, 'BuyShowOrder'])->name('admin.buyerorders.show');

        //exprss-order-module
        Route::get('/Express-orders', [AdminOrderController::class, 'ExpressIndexOrder'])->name('admin.expressorders.index');
        Route::get('/Express-orders-view/{id}', [AdminOrderController::class, 'ExpressShowOrder'])->name('admin.expressorders.show');

        Route::post('/orders/update-status', [AdminOrderController::class, 'updateOrderStatus'])->name('admin.orders.updateStatus');
        Route::post('/orders/delete', [AdminOrderController::class, 'deleteOrder'])->name('admin.orders.delete');
        //end


        //Order-Shipping_module
        //buy-order-module
        Route::get('/buy-orders-shipping', [AdminShippingController::class, 'BuyIndexOrder'])->name('admin.buyorders.shippingindex');
        Route::get('/buy-orders-edit-shipping/{id}', [AdminShippingController::class, 'BuyEditOrder'])->name('admin.buyerorders.shippingedit');
        Route::put('/buy-update-orders-shipping/{id}', [AdminShippingController::class, 'BuyupdateOrder'])->name('admin.buyOrder.shippingupdate');

        //exprss-order-module
        Route::get('/Express-orders-shipping', [AdminShippingController::class, 'ExpressIndexOrder'])->name('admin.expressorders.shippingindex');
        Route::get('/Express-orders-edit-shipping/{id}', [AdminShippingController::class, 'ExpressEditOrder'])->name('admin.expressorders.shippingedit');
        Route::put('/orders/update-express-shipping/{id}', [AdminShippingController::class, 'updateExpressOrder'])->name('admin.expressorders.shippingupdate');

        //end


        //admin-report 
        Route::get('/reports', [AdminReportController::class, 'index'])->name('admin.reports.index');
        Route::get('/reports/orders', [AdminReportController::class, 'ordersReport'])->name('admin.reports.orders');
        Route::get('/reports/shipments', [AdminReportController::class, 'shipmentsReport'])->name('admin.reports.shipments');


        Route::resource('countries', CountryController::class);
        Route::resource('services', ServiceController::class);
        Route::resource('categories', CategoryController::class);
});


//Webstie
Route::get('/', [HomeController::class, 'homepage'])->name('index');

Route::get('trackOrder', [HomeController::class, 'trackOrder'])->name('trackOrder');
Route::get('OrderForm', [HomeController::class, 'OrderForm'])->name('OrderForm');
Route::post('/track-order', [OrderController::class, 'trackOrder'])->name('track.order');
Route::post('/placeorder', [OrderController::class, 'store'])->name('placeorder');
Route::post('/submit-order', [OrderController::class, 'submitOrder'])->name('order.store');

// Route::post('/get-services', [HomeController::class, 'getServices']);
Route::post('/check-service', [HomeController::class, 'checkService']);
Route::get('/step2', [HomeController::class, 'step2'])->name('step2');
Route::get('/express_delivery', function (Request $request) {
        return view('website.forms.express_delivery')->with('service_id', $request->service_id);
    });
    
    Route::get('/buy_blade', function (Request $request) {
        return view('website.forms.buy')->with('service_id', $request->service_id);
    });

    Route::get('/order-success', function() {
        return "Order placed successfully!";
    })->name('order.success');
    Route::get('/get-countries', [HomeController::class, 'getCountries']);
Route::get('/get-services', [HomeController::class, 'getServices']);
Route::get('/check-service-type', [HomeController::class, 'checkServiceType']);
Route::get('/get-categories/{service_id}', [HomeController::class, 'getCategories']);
///website -Auth

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('loginUser', [AuthController::class, 'loginUser'])->name('loginUser');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('registerUser', [AuthController::class, 'registerUser'])->name('registerUser');
Route::post('logout', [AuthController::class, 'logoutUser'])->name('logoutUser');
Route::get('showForgotPasswordForm', [AuthController::class, 'showForgotPasswordForm'])->name('showForgotPasswordForm');
Route::post('forgotpasswordsendOtp', [AuthController::class, 'forgotpasswordsendOtp'])->name('forgotpasswordsendOtp');
//