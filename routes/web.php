<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $now =\Carbon\Carbon::now();
    $items = \App\Models\Link::where("start", "<", $now)
        ->where("end", ">", $now)
        ->get();

    if(count($items) > 0){
        $itemModel = new \App\Models\Link();
        $selected = $itemModel->selectWeightedRandom($items);
        return redirect($selected->url);
    }else{
        return redirect("https://www.youtube.com/watch?v=dQw4w9WgXcQ");
    }


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
