<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Blade;
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
        //
        $role=Role::where('name', 'user')->first();

        $users = User::whereDoesntHave('roles', function($query) {
            $query->where('name', 'admin');
        })->get();
        $use = User::whereHas('roles', function($query) {
            $query->where('name', 'admin');
        })->get();
        
        $products = Product::all();
        view()->share([
            "role"=>$role,
            "users"=>$users,
            "products"=>$products,
            "check"=>$use
        ]);
        Blade::directive('checkRole', function (string $role) {
            return "<?php if (Auth::check() && Auth::user()->hasRole($role)) : ?>";
        });

        Blade::directive('endCheckRole', function () {
            return "<?php endif ; ?>";
        });
    }
}
