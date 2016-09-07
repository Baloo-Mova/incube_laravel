<?php

namespace App\Providers;

use App\Models\Investor;
use App\Observers\InvestorObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Investor::observe(InvestorObserver::class);

        if ($this->app->environment() == 'local') {
            $this->app->register('Iber\Generator\ModelGeneratorProvider');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
