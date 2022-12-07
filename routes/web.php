<?php

use App\Http\Controllers\TodolistController;
use App\Http\Controllers\TodolistDetailController;
use Illuminate\Support\Facades\Route;

Route::resource("todolist", TodolistController::class);
Route::resource("todolist-detail", TodolistDetailController::class);
Route::get("todolist-detail/create/{todolist}", [TodolistDetailController::class, "create"])->name("todolist-detail.create.item");
