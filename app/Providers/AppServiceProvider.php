<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;


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
        Validator::extend('time_range', function ($attribute, $value, $parameters, $validator) {
            $startTime = strtotime('08:00');
            $endTime = strtotime('16:00');
            $selectedTime = strtotime($value);
        
            return ($selectedTime >= $startTime && $selectedTime <= $endTime);
        });
        
    }
}
