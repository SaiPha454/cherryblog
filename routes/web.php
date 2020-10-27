<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\WritterController;

use Carbon\Carbon;

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::resource('blog',PostsController::class);

Route::get('author',[WritterController::class,'authors']);
Route::get('blog/{id}/profile',[WritterController::class,'profile']);
Route::get('profile/edit',[WritterController::class,'edit']);
Route::put('profile/update_name',[WritterController::class,'updatename']);
Route::put('profile/update_email',[WritterController::class,'updatemail']);
Route::get('profile/choosepic',[WritterController::class,'choose_picture']);
Route::put('profile/upload',[WritterController::class,'uploadprofile']);

// Route::get('/date',function(){
//     // return Carbon::now('+6:30')->format('g:i:a');
//     // $tm = Carbon::create(2020,10,6,16,0,0,'+6:30');
//     // return $tm->toDateTimeString();
//     // $tm=Carbon::now('+6:30');
//     // return $tm->diffForHumans();


//     // 2020-10-06T09:54:36.164675Z
//     // $tm = Carbon::create(2020,10,6,4,47,20,'+6:30');
//     $tm = Carbon::now('+6:30');

//     echo $tm . '<br>';
//     $tm_time= $tm->format('g:i:s A');
//     // return $tm->day .'/'.$tm->month.'/'.$tm->year.' - '.$tm_time;
//     // return $tm->toFormattedDateString() . '- '. $tm_time; // => Oct 6, 2020- 4:41:PM
//     return $tm->format('l jS \\of F Y') . ' - ' .$tm_time; //=>Tuesday 6th of October 2020 - 9:54:36 AM
   

// });

Route::get('/format',function(){
    // 2020-10-06 17:07:39
    $date = Carbon::parse('2020-10-06 12:55:33','UTC');
    echo $date->isoFormat('MMMM Do dddd YYYY, h:mm:ss a'); // June 15th 2018, 5:34:15 pm
    echo "\n";
});

