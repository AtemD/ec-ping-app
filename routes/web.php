<?php

use Illuminate\Support\Facades\Route;
use App\Models\Client;

Route::get('/', function () {
    $clients = Client::all();
    return view('welcome', compact('clients'));
});
