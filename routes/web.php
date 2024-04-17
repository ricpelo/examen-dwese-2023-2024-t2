<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideojuegoController;
use App\Models\Videojuego;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/videojuegos/poseo', function () {
        return view('videojuegos.poseo', [
            'videojuegos' => Videojuego::all(),
        ]);
    })->name('videojuegos.poseo');
    Route::post('/videojuegos/update-poseo', function (Request $request) {
        $videojuego_id = $request->input('videojuego_id');
        if ($videojuego_id === null) {
            abort(404);
        } else {
            $videojuego = Videojuego::find($videojuego_id);
            if ($videojuego === null) {
                abort(404);
            }
        }
        if ($request->collect()->has('tengo')) {
            $existe = DB::table('posesiones')
                ->where('videojuego_id', '=', $videojuego_id)
                ->where('user_id', '=', Auth::user()->id)
                ->exists();
            if (!$existe) {
                DB::table('posesiones')->insert([
                    'videojuego_id' => $videojuego_id,
                    'user_id' => Auth::user()->id,
                ]);
            }
        } else {
            DB::table('posesiones')
                ->where('videojuego_id', '=', $videojuego_id)
                ->where('user_id', '=', Auth::user()->id)
                ->delete();
        }
        return redirect()->route('videojuegos.poseo');
    })->name('videojuegos.update-poseo');
    Route::resource('videojuegos', VideojuegoController::class);
});

require __DIR__.'/auth.php';
