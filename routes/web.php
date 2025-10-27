<?php

use Illuminate\Support\Facades\Route;
use App\Models\Client;

// Route::get('/', function () {

//     $clients = Client::query()
//     ->with('sites')
//     ->get();

//     return view('welcome', compact('clients'));
// });


Route::get('/', function () {
    $clients = Client::withCount('sites')
        ->orderBy('sites_count', 'desc')
        ->with('sites')
        ->get();

    return view('welcome', compact('clients'));
});

Route::get('/ec-banner', function () {
    return view('ec-banner');
});
