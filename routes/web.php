<?php

use App\Http\Controllers\AdminPanel\AdminController;
use App\Http\Controllers\AdminPanel\AgentController;
use App\Http\Controllers\AdminPanel\AuthController;
use App\Http\Controllers\AdminPanel\PermessionController;
use App\Http\Controllers\AdminPanel\QuestionController;
use App\Http\Controllers\AdminPanel\RoleController;
use App\Http\Controllers\AdminPanel\SettingController;
use App\Http\Controllers\AdminPanel\UserController;
use App\Http\Controllers\AdminPanel\GalleryController;
use App\Http\Controllers\AdminPanel\ImageController;
use App\Http\Controllers\AdminPanel\DoctorController;
use App\Http\Controllers\AdminPanel\VisitController;
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

Route::group(
    [
        'prefix'        => LaravelLocalization::setLocale(),
        'middleware'    => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::middleware(['guest'])->group(function () {
            Route::get('/', [AuthController::class, 'login'])->name('auth.login');
            Route::get('/login', [AuthController::class, 'postLogin'])->name('post.login');
        });

        Route::middleware('auth:web')->group(function () {
            Route::get('/dashboard', function () {
                return view('welcome');
            })->name('dashboard');

            Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
            Route::resource('admins', AdminController::class);
            Route::resource('users', UserController::class);
            Route::resource('role', RoleController::class);
            Route::resource('permessions', PermessionController::class);
            Route::resource('users', UserController::class);
            Route::post('sendemail', [UserController::class,'sendEmail'])->name('users.sendemail');
            Route::resource('settings', SettingController::class);
            Route::resource('agent', AgentController::class);
            Route::resource('doctor', DoctorController::class);
            Route::resource('question', QuestionController::class);
            Route::resource('visits', VisitController::class);
//            Route::get('authtype',function (){
//                $auth=auth()->user()->name;
//                return($auth);
//            });





        });
    }
);

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');





// Route::resource('inspirations', App\Http\Controllers\InspirationController::class);



