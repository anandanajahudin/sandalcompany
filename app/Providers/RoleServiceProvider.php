<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::directive('hasAnyRole', function ($roles) {
            return "<?php if(auth()->check() && in_array(auth()->user()->user_type, {$roles})): ?>";
        });

        Blade::directive('endHasAnyRole', function () {
            return '<?php endif; ?>';
        });
    }
}
