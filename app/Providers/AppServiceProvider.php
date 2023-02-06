<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Models\People;
use App\Observers\PeopleObserver;
use App\Models\Historystatu;
use App\Observers\HistorystatuObserver;


class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        
		$this->app->bind(
			'App\Interfaces\v1\PeopleInterface',
			'App\Repositories\v1\PeopleRepository'
		);
		$this->app->bind(
			'App\Interfaces\v1\HistorystatuInterface',
			'App\Repositories\v1\HistorystatuRepository'
		);
        $this->app->bind(
            'Illuminate\Contracts\Filesystem\Factory',
            'Illuminate\Contracts\Filesystem\Factory'
        );
    }

    public function boot()
    {
        Schema::defaultStringLength(191);
        
		People::observe(PeopleObserver::class);
		Historystatu::observe(HistorystatuObserver::class);
         
    }
}