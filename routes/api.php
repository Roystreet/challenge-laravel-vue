<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/generate-report',[ReportController::class, 'generateReport'] );
Route::get('/get-report/{id}', [ReportController::class, 'getReportId']);
Route::get('/list-reports', [ReportController::class, 'getReports']);
