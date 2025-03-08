<?php

use App\Events\PrivateChannelEvent;
use App\Events\PublicChannelEvent;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function(){
    event(new PrivateChannelEvent('hello private', 1));
    event(new PublicChannelEvent('hello public'));
    return 'done';
});
