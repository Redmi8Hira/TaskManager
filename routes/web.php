<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, "index"])->name('home');


Route::prefix('/task')->group(function(){
    Route::get('/', [TaskController::class, "index"])->name('task');
    Route::post('/store', [TaskController::class, "store"])->name('task.store');
    Route::get('/{task_id}/delete', [TaskController::class, "delete"])->name('task.delete');
    Route::get('/{task_id}/status', [TaskController::class, "status"])->name('task.status');
});





