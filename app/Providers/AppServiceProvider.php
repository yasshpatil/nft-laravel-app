<?php

namespace App\Providers;

use Illuminate\Support\Facades\Queue;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Queue\Events\JobProcessing;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Support\Facades\Log;
use Artisan;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Queue::after(function (JobProcessed $event) {
            $jobs_count=DB::table('jobs')->count();
            if($jobs_count == 0){
                \Mail::to('hasan.redsignal@gmail.com')->send(new \App\Mail\QueueProcessStatusMail());
            }else{
                Log::info('Queue Worked');
                \Artisan::call('queue:work --once');  
            }
        });
    }
}
