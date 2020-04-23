<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;
use Hashids\Hashids;

use App\MessageCenter;
use App\MessengeUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

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
        view()->composer('admin.navbar', function ($view) {
            $alerts_center = MessageCenter::orderBy('created_at', 'DESC')->paginate(5);
            $view->with('alerts_center', $alerts_center);
        });

        view()->composer('admin.navbar', function ($view) {
            $total_not_read = MessageCenter::where('reader', 0)->count();
            $view->with('total_not_read', $total_not_read);
        });

        view()->composer('admin.navbar', function ($view) {
            $messenger_sent = MessengeUser::withTrashed()->where('to_user', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
            $view->with('messenger_sent', $messenger_sent);
        });

        view()->composer('admin.navbar', function ($view) {
            $count_messenger_sent = MessengeUser::withTrashed()->where('to_user', Auth::user()->id)->where('reader', 0)->count();
            $view->with('count_messenger_sent', $count_messenger_sent);
        });
    }
}