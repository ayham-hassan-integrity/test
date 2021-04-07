<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

use App\Domains\Test\Http\Controllers\Api\Test\TestController;

Route::group([
    'prefix' => 'test',
    'as' => 'test.',
], function () {

    Route::get('/', [TestController::class, 'index'])->name('index');
    Route::post('/', [TestController::class, 'store'])->name('store');
    Route::group(['prefix' => '{project}'], function () {
        Route::get('/', [TestController::class, 'show'])->name('show');
        Route::put('/', [TestController::class, 'update'])->name('update');
        Route::delete('/', [TestController::class, 'delete'])->name('destroy');
    });
});
