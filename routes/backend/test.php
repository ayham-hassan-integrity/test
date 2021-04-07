<?php

use App\Domains\Test\Http\Controllers\Backend\Test\DeletedTestController;
use App\Domains\Test\Http\Controllers\Backend\Test\TestController;
use App\Domains\Test\Models\Test;
use Tabuna\Breadcrumbs\Trail;

Route::group([
    'prefix' => 'test',
    'as' => 'test.',
], function () {

    Route::get('/', [TestController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__(' Tests'), route('admin.test.index'));
        });


    Route::get('deleted', [DeletedTestController::class, 'index'])
        ->name('deleted')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.test.index')
                ->push(__('Deleted  Tests'), route('admin.test.deleted'));
        });


    Route::get('create', [TestController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.test.index')
                ->push(__('Create Test'), route('admin.test.create'));
        });

    Route::post('/', [TestController::class, 'store'])->name('store');

    Route::group(['prefix' => '{test}'], function () {
        Route::get('/', [TestController::class, 'show'])
            ->name('show')
            ->breadcrumbs(function (Trail $trail, Test $test) {
                $trail->parent('admin.test.index')
                    ->push($test->id, route('admin.test.show', $test));
            });

        Route::get('edit', [TestController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, Test $test) {
                $trail->parent('admin.test.show', $test)
                    ->push(__('Edit'), route('admin.test.edit', $test));
            });

        Route::patch('/', [TestController::class, 'update'])->name('update');
        Route::delete('/', [TestController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => '{deletedTest}'], function () {
        Route::patch('restore', [DeletedTestController::class, 'update'])->name('restore');
        Route::delete('permanently-delete', [DeletedTestController::class, 'destroy'])->name('permanently-delete');
    });
});