<?php

View::composer('create', function($view) {
    $view->with('fileTypes', Config::get('paste-types'));
});

View::composer('layout', function($view) {
    $js = Route::currentRouteName() == 'show' ? 'show' : 'create';
    $view->with('js', $js);
});
