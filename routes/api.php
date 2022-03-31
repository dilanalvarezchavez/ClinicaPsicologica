<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\RoleController;

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

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::middleware(['auth:sanctum'])
        ->post('logout', [AuthController::class, 'logout']);
    // Route::post('logout', [AuthController::class, 'logout']);
});

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::apiResource('users', UserController::class);
    Route::prefix('user')->group(function () {
        Route::patch('destroys', [UserController::class, 'destroys']);
    });

    Route::apiResource('papers', PaperController::class);
    Route::prefix('paper')->group(function () {
        Route::patch('destroys', [PaperController::class, 'destroy']);
    });

    Route::apiResource('roles', RoleController::class);
    Route::prefix('role')->group(function () {
        Route::patch('{role}', [RoleController::class, 'destroy']);
    });
});



Route::get('init', function () {
    if (env('APP_ENV') != 'local') {
        return response()->json('El sistema se encuentra en producción.', 500);
    }

    DB::select('drop schema if exists public cascade;');
    DB::select('drop schema if exists authentication cascade;');
    DB::select('drop schema if exists core cascade;');
    DB::select('drop schema if exists job_board cascade;');

    DB::select('create schema public;');
    DB::select('create schema authentication;');
    DB::select('create schema core;');
    DB::select('create schema job_board;');

    Artisan::call('migrate', ['--seed' => true]);

    return response()->json([
        'msg' => [
            'Los esquemas fueron creados correctamente.',
            'Las migraciones fueron creadas correctamente'
        ]
    ]);
});


// Route::apiResource('users', UserController::class);

// Route::prefix('user')->group(function () {
//     Route::patch('{user}', [UserController::class, 'destroy']);
// });
