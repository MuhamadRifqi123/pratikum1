<?php

use App\Http\Controllers\BiodataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('biodata', function (){
    $data=[
        'nama'=>'Muhamad Rifqi',
        'lahir'=>'Bandung',
        'hobi'=>'badminton',
        'jk'=>'laki-laki',
        'agama'=>'Islam',
        'alamat'=>'Dsn.Bojong ereun RT 02/12 Des Cibeusi',
        'telp'=>'088102303221',
        'email'=>'nanal.setiawan1@gmail.com',
        'photo'=>'../img/ansellma.jpg',
    ];
    return view('biodata',$data);

});
Route::get('/bio', [HomeController::class, 'index']);
Route::get('/list', [BiodataController::class, 'index'])->name('list');
Route::get('/form_siswa', [BiodataController::class, 'create'])->name('form_siswa');
Route::post('/store_siswa', [BiodataController::class, 'store']);
Route::get('/edit/{id}', [BiodataController::class, 'edit'])->name('edit_siswa');
Route::put('/update/{id}', [BiodataController::class, 'update'])->name('update-siswa');
Route::delete('/delete/{id}', [BiodataController::class, 'destroy'])->name('destroy_siswa');
Route::get('/bio/{id}', [BiodataController::class, 'show'])->name('show_bio');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
