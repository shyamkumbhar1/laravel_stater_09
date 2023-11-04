<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


Route::get('/', function () {


    return "All Is Good";
 });
Route::get('/migrate', function () {
    Artisan::call('migrate');

    return "Migration run successfully";
 });
Route::get('migrate:fresh', function() {

    Artisan::call('migrate:fresh');

    return "Migration Run Successfully";
 });


 Route::get('/clear-cache', function () {
     Artisan::call('cache:clear');
     Artisan::call('route:clear');

     return "Cache cleared successfully";
  });
 Route::get('/db:seed', function () {
     Artisan::call('db:seed');


     return "Db Seed successfully";
  });
 Route::get('/db:seed --class=CountrySateCitySeeder', function () {
     Artisan::call('db:seed --class=CountrySateCitySeeder');


     return "Db Seed successfully";
  });
   Route::get('/storage:link', function () {
     Artisan::call('storage:link');


     return "Storage Create successfully";
  });
