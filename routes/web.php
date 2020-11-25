<?php

use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\Template\TemplateController;
use App\Http\Controllers\Admin\Template\TemplateDetailController;
use App\Http\Controllers\Admin\Template\TemplateCategoryController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::resource('templates', TemplateController::class);
    Route::get('/template-details/{id}', [TemplateDetailController::class, 'templateDetail'])
        ->name('template-details.detail');
    Route::resource('template_details', TemplateDetailController::class);
    Route::resource('template-category', TemplateCategoryController::class);

    Route::resource('categories', CategoryController::class);
});


Route::prefix('admin')
    ->namespace('Admin')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');
    });

Route::get('/key', function () {
    return Str::random(32);
});









// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
