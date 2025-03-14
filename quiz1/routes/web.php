<?php

Route::get('hello/{Elljay}', function($name) {
    return 'hi ' . $name; // Example: "hi Elljay"
});

use App\Http\Controllers\InventoryController;

Route::resource('/inventory', InventoryController::class);
