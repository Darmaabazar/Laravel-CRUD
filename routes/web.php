<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jobController;

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

Route::get('/jobs', [jobController::class, 'index']);
Route::get('/jobs/create', [jobController::class, 'create']);
Route::post('/job', [jobController::class, 'upload']);

Route::get('/job/edit/{id}', [jobController::class, 'edit']);
Route::put('/job/{id}', [jobController::class, 'update']);

Route::delete('/job/delete/{id}', [jobController::class, 'destroy']);

