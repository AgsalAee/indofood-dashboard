<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataMaterialController;
use App\Http\Controllers\DataProductController;
use App\Http\Controllers\PackagingPOController;
use App\Models\PackagingPO;

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

Route::redirect('/', 'login');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::post('/DataMaterial/import_excel', [ProductController::class, 'import_excel']);
    // Route::resource('/DataMaterial', ProductController::class);

    Route::controller(PackagingPOController::class)->group(function () {
        Route::get('/PackagingPO', 'index')->name('PackagingPoIndex');
        Route::get('/PackagingPO/export_excel', 'export_excel');
        Route::post('/PackagingPO/import_excel', 'import_excel');
    });

    Route::controller(DataProductController::class)->group(function () {
        Route::post('/DataProduct/import_excel', 'import_excel');
        Route::get('/DataProduct', 'index')->name('DataProductIndex');
    });

    Route::fallback(function () {
        return view('pages/utility/404');
    });
});
