<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\Template\TemplateController;
use App\Http\Controllers\Admin\Template\TemplateDetailController;
use App\Http\Controllers\Admin\Template\TemplateCategoryController;

use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Client\ClientController;
use App\Http\Controllers\Admin\Client\OrderController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\Transaction\TransactionController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Support\Str;
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

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('homez');
});

Route::get('/user', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware(['auth','user','verified']);

Route::prefix('admin')
    ->middleware(['auth','admin','verified'])
    ->group(function () {
    Route::resource('templates', TemplateController::class);
    Route::get('/template-details/{id}', [TemplateDetailController::class, 'templateDetail'])
        ->name('template-details.detail');
    Route::resource('template_details', TemplateDetailController::class);
    Route::resource('template-category', TemplateCategoryController::class);

    Route::resource('categories', CategoryController::class);
    Route::resource('transactions', TransactionController::class);
    Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

    Route::resource('clients', ClientController::class);
    Route::resource('orders', OrderController::class);
});









// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
