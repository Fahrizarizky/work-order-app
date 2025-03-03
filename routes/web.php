<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ManajemenOperatorController;
use App\Http\Controllers\WorkOrderController;
use Illuminate\Support\Facades\Route;

// ROUTE AUTENTIKASI 
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth');

// ROUTE FILTER - MANAGER PRODUCTION
Route::prefix('dashboard')->middleware(['auth','manager-production'])->group(function() {
    Route::get('/filterpending', [FilterController::class, 'filterPending']);
    Route::get('/filterinprogress', [FilterController::class, 'filterInprogress']);
    Route::get('/filtercompleted', [FilterController::class, 'filterCompleted']);
    Route::get('/filtercanceled', [FilterController::class, 'filterCanceled']);
});

// ROUTE WORK ORDER - MANAGER PRODUCTION & OPERATOR 
Route::prefix('dashboard/wo-manager')->middleware('auth')->group(function() {
    Route::get('/', [WorkOrderController::class, 'getWorkOrder']);
    Route::get('/create', [WorkOrderController::class, 'createWorkOrder']);
    Route::post('/store', [WorkOrderController::class, 'storeWorkOrder']);
    Route::get('/edit/{id}', [WorkOrderController::class, 'editWorkOrder']);
    Route::put('/update/{id}', [WorkOrderController::class, 'updateWorkOrder']);
    Route::get('/show/{id}', [WorkOrderController::class, 'showWorkOrder']);
});
Route::delete('/dashboard/wo-manager/delete/{id}', [WorkOrderController::class, 'deleteWorkOrder'])->middleware(['auth','manager-production']);

// ROUTE LAPORAN - MANAGER PRODUCTION
Route::prefix('dashboard/laporan')->middleware(['auth','manager-production'])->group(function() {
    Route::get('/workorder',[LaporanController::class, 'getLaporanWorkOrder']);
    Route::get('/operator',[LaporanController::class, 'getLaporanOperator']);
});

// ROUTE MANAJEMEN OPERATOR - MANAGER PRODUCTION
Route::prefix('dashboard/manajemen-operator')->middleware(['auth','manager-production'])->group(function() {
    Route::get('/', [ManajemenOperatorController::class, 'getOperator']);
    Route::get('/create', [ManajemenOperatorController::class, 'createOperator']);
    Route::post('/store', [ManajemenOperatorController::class, 'storeOperator']);
    Route::get('/edit/{id}', [ManajemenOperatorController::class, 'editOperator']);
    Route::put('/update/{id}', [ManajemenOperatorController::class, 'updateOperator']);
    Route::delete('/delete/{id}', [ManajemenOperatorController::class, 'deleteOperator']);
});

