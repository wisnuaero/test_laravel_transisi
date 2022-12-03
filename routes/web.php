<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
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
    return view('welcome');
});

Auth::routes();
// Dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Company route
Route::resource('companies', CompaniesController::class);
// Employee route
Route::resource('employees', EmployeesController::class);
// load dataajax company on employee
Route::post('/getCompanies', [EmployeesController::class, 'getCompanies'])->name('getCompanies');
//export pdf
Route::get('/export-employees', [EmployeesController::class, 'export'])->name('employees.export');