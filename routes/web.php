<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(['message' => 'Welcome to Doctor Appointment API']);
});

Route::get('/version', function () {
    return response()->json(['version' => app()->version()]);
});
