<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get("/about", function(){
    return view("about", [
        "heading"=>"This is about page from the routes",
        "message" => "This is another message",
        "fruits" => [
            "avocado",
            "banana",
            "mango",
            "orange"
        ],
        "animals"=> [
            "cow" =>[
            "name"=>"Bihogo",
            "eyes"=> 2,
            "age"=> 12,
            "color"=> "Umukara"
            ],
            "cow2" =>[
            "name"=>"Bihogo2",
            "eyes"=> 4,
            "age"=> 6,
            "color"=> "Umweru"
            ],
        ]
    ]);
});


Route::resource("users", UserController::class);
