<?php

use App\Http\Controllers\NetworkProviderPageController;
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

Route::get('/', function () {
    return view('main');
});
Route::post('/network_provider', [NetworkProviderPageController::class, 'getPopupInfo'])->name('popup.show-info');