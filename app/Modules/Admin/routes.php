<?php
Route::group(['prefix' => 'admin', 'namespace' => 'App\Modules\Admin\Controllers'], function () {
	Route::get('/', ['as' => 'admin.index', 'uses' => 'IndexController@index']);
	Route::get('model-test', ['as' => 'admin.modelTest', 'uses' => 'IndexController@modelTest']);
});
