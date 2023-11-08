<?php

use App\Http\Controllers\Api\AgentsController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\QuestionTypesController;
use App\Http\Controllers\API\SettingController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\Auth\PasswordController;
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

    // Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('homePage', [ HomeController::class , 'homePage' ] );
Route::post('signup',[AuthController::class,'SignUp']);
Route::post('verify',[AuthController::class,'verify']);
Route::post('login', [AuthController::class, 'Login']);
Route::post('confirm-code', [AuthController::class, 'ConfrimCode']);
Route::get('settings', [SettingController::class, 'settings']);
Route::post('forgot-Password',[PasswordController::class,'forgotPassword']);
Route::post('change-password',[PasswordController::class,'changePassword']);
Route::post('confirm-otp',[PasswordController::class,'confirmOtp']);
Route::get('logout', [AuthController::class, 'Logout']);
//Route::get('index', [\App\Http\Controllers\AdminPanel\VisitController::class, 'index']);
Route::get('agents',[AgentsController::class,'agents'])->middleware('auth:user');
Route::get('doctors',[DoctorController::class,'getDoctorsByAgent'])->middleware('auth:user');
Route::post('choose-Question',[QuestionTypesController::class,'question']);
Route::get('question-types',[QuestionTypesController::class,'typeQusetion']);

// Route::middleware(['auth:user','StatusMiddleware'])->group(function(){
//     Route::get('profile', [AuthController::class, 'Profile']);
//     Route::post('update-profile', [AuthController::class, 'UpdateProfile']);
//     // Route::post('forget-password', [AuthController::class, 'ForgetPassword']);
    Route::get('logout', [AuthController::class, 'Logout']);
//     Route::post('change-password', [AuthController::class, 'ChangePassword']);
// });
