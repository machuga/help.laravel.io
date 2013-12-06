<?php

Route::get('/', ['as' => 'create', 'uses' => 'PasteController@create']);
Route::post('/', ['as' => 'store', 'uses' => 'PasteController@store']);
Route::get('/{paste}', ['as' => 'show', 'uses' => 'PasteController@show']);

Route::bind('paste', function($value) {
    if ($paste = Paste::where('uid', $value)->first()) {
        return Paste::where('uid', $value)->first();
    }
    App::abort(404);
});
