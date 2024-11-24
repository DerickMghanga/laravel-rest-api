<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1\CustomerController;
use App\Http\Controllers\Api\V1\InvoiceController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Example: api/v1/invoices - versioning routes by the controller folders(versions)
Route::group(['prefix' => 'v1', 'namespace' =>'App\Http\Controllers\Api\V1'], function () {
    // the 'apiResource' gives only GET http method but NOT CREATE/DELETE methods
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('invoices', InvoiceController::class);
});
?>