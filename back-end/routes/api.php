<?php

use App\Http\Controllers\BinController;
use App\Http\Controllers\BinUserController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\Forgot_passwordController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register',[UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/currentUser/{email}', [UserController::class, 'currentUser']);
Route::get('/logout', [UserController::class, 'logout']);
Route::post('/insert-zone/{email}', [UserController::class, 'saveZone']);
Route::put('/update-user/{id}', [UserController::class, 'updateUser']);
Route::put('/update-user-without-password/{id}', [UserController::class, 'updateUserWithoutPassword']);


Route::post('/forget-password', [Forgot_passwordController::class, 'submitForgetPasswordForm']); 
Route::post('/reset-password/{code}', [Forgot_passwordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('/zone-calendar/{id}', [ZoneController::class, 'zoneCalendar']);
Route::get('/zones', [ZoneController::class, 'viewZone']);
Route::get('/user-calendar/{id}', [ZoneController::class, 'viewCalendarUserZone']);

Route::post('/new-bin/{user_id}', [BinController::class, 'saveBin']);
Route::put('/update-bin/{id}', [BinController::class, 'updateBin']);
Route::get('/view-bin/{id}', [BinController::class, 'viewMateriale']);
Route::get('/material-bin/{id}', [BinController::class, 'materialBin']);
Route::get('/bin/{id}', [BinController::class, 'getBin']);
Route::delete('/delete-bin/{id}', [BinController::class, 'deleteBin']);
Route::get('/get-bin/{user_id}', [BinController::class, 'getBinUserMaterial']);

Route::post('/save-bin-user', [BinUserController::class, 'save_bin_user']);
Route::get('/view-bin-user/{user_id}', [BinUserController::class, 'view_bin_userId']);
Route::delete('/delete-bin-user/{id}', [BinUserController::class, 'delete_bin_user']);
