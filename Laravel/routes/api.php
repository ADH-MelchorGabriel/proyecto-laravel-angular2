<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToolsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get('/tools', [ToolsController::class, 'index']);
Route::get('/tools/{id}', [ToolsController::class, 'show']);
Route::get('/tools/category/{category}', [ToolsController::class, 'byCategory']);
