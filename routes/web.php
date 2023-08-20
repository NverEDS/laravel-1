<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

Route::get('/', function () {
//    return view('welcome');
//    $users = DB::select("select * from users");

//    $user = DB::insert('insert into users (name, email, password) values (?,?,?)', ['Nver3', 'nver3@gmail.com', '12345678']);

//    $user = DB::update("update users set name = ? where email=?", ['NverNew', 'nver3@gmail.com']);

//    $user = DB::delete('delete from users where email = ?', ['nver3@gmail.com']);

//    with Query Builder

//    $user = DB::table('users')->insert([
//        'name' => 'Nver222',
//        'email' => 'nver222@gmail.com',
//        'password' => '12345678',
//    ]);

//    DB::table('users')->delete();
//    DB::table('users')->update(['name' => 'Nver78787899']);

//    $user = User::find(15);
//
//    $user->update([
//        'name' => 'Just Nver'
//    ]);

//    $users = User::get();

//    User::create([
//        'name' => 'Nver999',
//        'email' => 'nver999@gmail.com',
//        'password' => '12345678',
//    ]);

//    $users = User::all();
//    $user->delete();

    $user = User::find(13);

    dd($user->name);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
