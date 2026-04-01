<?php

use App\Livewire\TrackInv;

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');

//  });
Route::livewire('/', 'trackbox');
Route::livewire('/track', 'trackinvoice');
