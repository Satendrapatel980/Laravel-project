<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
 
Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/create', [CourseController::class, 'create']);
Route::post('/courses', [CourseController::class, 'store']);
Route::get('/courses/{id}/edit', [CourseController::class, 'edit']);
Route::put('/courses/{id}', [CourseController::class, 'update']);
Route::delete('/courses/{id}', [CourseController::class, 'destroy']);



// Route::get('/', function () {
//     return view('welcome');
// }); 

// Route::get('/hello', function(){
//     return "Hello Laravel ";
// });

// Route::get('/page', function(){
//     return view("welcome");
// });

// Route::get('/about', function(){
//     return view("about");
// });

// Route::get('/profile',function(){
//     return view('profile',[
//         'name' => 'Satendra'
//     ]);
// });

// Route::get('/home', [PageController::class,'home']);
// Route::get('/about',[PageController::class,'about']);
// Route::get('/students/create',[StudentController::class, 'create']);
// Route::post('/students',[StudentController::class,'store']);
// Route::get('/students',[StudentController::class, 'index']);
// Route::get('/students/{id}/edit', [StudentController::class, 'edit']);
// Route::put('/students/{id}', [StudentController::class, 'update']);
// Route::delete('/students/{id}', [StudentController::class,'destroy']);

// Route::get('/check', function(){
//     return view('check',[
//         'isLoggedIn' => true
//     ]);
// });

// Route::get('/status',function(){
//     return view('status',[
//         'isLoggedIn' => true
//     ]);
// });

// Route::get('/users', function(){
//     return view('users',[
//         'users' => ['John', 'Wick', 'Alex']
//     ]);
// });