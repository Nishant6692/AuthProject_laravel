<?php

use App\Http\Controllers\AdminControllar;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::prefix('admin')->group(function(){
    
// });

Route::middleware(["alreadyLogIn"])->group(function(){
    Route::get('/', [AuthController::class,'signUp'])->name('signUp');
    Route::get('/login', [AuthController::class,'logIn'])->name('logIn');
});


Route::post('/registration-user',[AuthController::class,'registerUser'])->name('register-user');
Route::post('/login-user',[AuthController::class,'loginUser'])->name('login-user');
Route::get('/dashboard' ,[AuthController::class,'dashboard'])->name('dashboard');
Route::get('/logout-user',[AuthController::class,'logOutUser'])->name('logout-user');
Route::prefix('admin')->group(function(){
    Route::get('/dashboard', [AdminControllar::class,'adminDashboard'])->name('admin-dashboard');
   
});


//demo example

// Route::get('/user/{user}',function(User $user){

//     return $user->email;
// });

 

