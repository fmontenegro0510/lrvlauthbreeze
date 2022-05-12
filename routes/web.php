<?php


use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


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
// Route::get('/', function () {
//     return view('welcome');
// });
//se puede acceder solo a las funciones del controller que se le pasa en el array except
// $routes = ['except' => ['index','show']];
// Route::resource('products', ProductController::class, $routes);
// Route::middleware(['auth'])->get('/', function () {
//     return view('welcome');
// })->name('welcome');

//dashboard
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


Route::get('/', function () {
    return view('welcome');
})->name('welcome');    

//en esta funcion agrego todas las rutas que van a estar protegidas del acceso
Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
    
    // Route::get('/', function () {
    //     return view('welcome');
    // })->name('welcome');

    Route::get('/dashboard', function () {
        $user = User::find(1);
        return view('dashboard', compact('user'));
    })->name('dashboard');
});

require __DIR__.'/auth.php';
