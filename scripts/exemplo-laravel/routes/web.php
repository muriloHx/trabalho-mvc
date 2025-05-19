<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/exemplo', function () {
    return view('exemplo', [
        'titulo' => 'Meu Site',
        'nome'   => 'João',
        'idade'  => 20,
        'frutas' => ['Maçã', 'Banana', 'Uva']
    ]);
});
