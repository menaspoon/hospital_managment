<?php

namespace App\Providers;
use App\Models\User;
use App\Models\Contact;
use App\Models\Message\Notifications;
use App\Models\Chat\Messenger;
use App\Models\Hospital;
use App\Models\Settings;

use Illuminate\Support\ServiceProvider;

use View;
use DB;
use Auth;

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
    public function boot() {
        View::composer('*', function($view){
            if(Auth::id()) :
                $view->with("user", User::where("id", Auth::id())->first());
                $view->with("hospital", Hospital::where("id", Auth::user()->hospital)->first());
                $view->with("notificationsCount", Notifications::where("user", Auth::id())->count());
                $view->with("settings", Settings::where("hospital", Auth::user()->hospital)->first());

            endif;

            //$view->with("contact", Contact::where("id", 1)->first());
            //$view->with("notificationsCount", Notifications::where("user", Auth::id())->where("user_view", 0)->count());
            //$view->with("countMessage", Messenger::where("user_view", Auth::id())->Where("view", 0)->count());

        });
    }
}
 