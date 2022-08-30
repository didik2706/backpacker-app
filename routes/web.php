<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\OrdersController;
use Illuminate\Support\Facades\Route;

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

Route::middleware("auth")->group(function() {
    Route::get("/dashboard", [DashboardController::class, "showDashboard"])->name("dashboard");
    // Routes items
    Route::prefix("items")->group(function() {
        Route::get("/", [ItemsController::class, "showItems"]);
        Route::get("/add", [ItemsController::class, "showAddItem"]);
        Route::get("/edit/{id}", [ItemsController::class, "showEditItem"]);
        Route::get("/delete/{id}", [ItemsController::class, "deleteItem"]);
    
        Route::post("/add", [ItemsController::class, "addItem"]);
        Route::post("/edit", [ItemsController::class, "editItem"]);
    });
    // Routes Customers
    Route::prefix("customers")->group(function() {
        Route::get("/", [CustomersController::class, "showCustomers"]);
        Route::get("/add", [CustomersController::class, "showAddCustomer"]);
        Route::get("/edit/{id}", [CustomersController::class, "showEditCustomer"]);
        Route::get("/delete/{id}", [CustomersController::class, "deleteCustomer"]);
        Route::get("/{id}", [CustomersController::class, "showDetailCustomer"]);

        Route::post("/add", [CustomersController::class, "addCustomer"]);
        Route::post("/edit", [CustomersController::class, "editCustomer"]);
    });
    // Routes Order
    Route::prefix("orders")->group(function() {
        Route::get("/", [OrdersController::class, "showOrders"]);
        Route::get("/add", [OrdersController::class, "showAddOrder"]);

        Route::post("/add", [OrdersController::class, "addOrder"]);
    });
});

// Routes auth
Route::prefix("auth")->group(function() {
    Route::get("/logout", [AuthController::class, "logout"])->middleware("auth");
    
    Route::middleware("guest")->group(function() {
        Route::get("/login", [AuthController::class, "showLogin"])->name("login");
        Route::post("/login", [AuthController::class, "login"]);
    });
});
