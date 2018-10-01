<?php

Route::get('test', function () {
	echo "done";
});
// Route::get('index/{lang}', 'Vinsofts\Translates\TranslatesController@index');
// Route::get('create', 'Vinsofts\Translates\TranslatesController@create');
// Route::post('create', 'Vinsofts\Translates\TranslatesController@doCreate');
// Route::get('update', 'Vinsofts\Translates\TranslatesController@updateTrans');

Route::group(['prefix' => '/{lang}'], function () {
	Route::get('index', 'Vinsofts\Translates\TranslatesController@index');
	Route::get('create', 'Vinsofts\Translates\TranslatesController@create');
	Route::post('create', 'Vinsofts\Translates\TranslatesController@doCreate');
	Route::get('update', 'Vinsofts\Translates\TranslatesController@updateTrans');
});