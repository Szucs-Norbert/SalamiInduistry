<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalamiController;
use App\Http\Controllers\AuthController;


Route::post("/register",[AuthController::class,"signup"]);
Route::post("/login",[AuthController::class,"signin"]);
Route::post("/logout",[AuthController::class,"logout"]);
Route::get("/Salamies",[SalamiesController::class,"index"]);
Route::get("/Salamies/show/{id}",[SalamiesController::class,"show"]);
Route::get( "/Salamies/search/{name}", [ SalamiesController::class, "search" ]);
Route::get( "/Salamies/ingerdient/{ingerdient}", [ SalamiesController::class, "ingredientsearch" ]);


Route::group( ["middleware" => ["auth:sanctum"]], function(){
    Route::post("/Salamies",[SalamiesController::class,"store"]);
    Route::put("/Salamies/{Salamies}",[SalamiesController::class,"update"]);
    Route::delete("/Salamies/{id}",[SalamiesController::class,"destroy"]);
});
