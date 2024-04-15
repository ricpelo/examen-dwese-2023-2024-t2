<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Videojuego;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('update-videojuego', function (User $user, Videojuego $videojuego) {
            return $user->videojuegos()->where('id', $videojuego->id)->exists();
            // return DB::table('posesiones')
            //     ->where('user_id', $user->id)
            //     ->where('videojuego_id', $videojuego->id)
            //     ->exists();
        });
    }
}
