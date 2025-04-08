<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $now =\Carbon\Carbon::now();
    $items = \App\Models\Link::where("start", "<", $now)
        ->where("end", ">", $now)
        ->get();
    dump($items);
    $itemModel = new \App\Models\Link();
    $selected = $itemModel->selectWeightedRandom($items);

    dump($selected->url);

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
