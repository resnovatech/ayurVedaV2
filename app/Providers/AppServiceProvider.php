<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
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
        if(\Illuminate\Support\Facades\Schema::hasTable('system_information')){

            $icon_name = DB::table('system_information')->value('icon');
            $logo_name = DB::table('system_information')->value('logo');
            $ins_name = DB::table('system_information')->value('name');
            $ins_add = DB::table('system_information')->value('address');

            $ins_email = DB::table('system_information')->value('email');

            $ins_phone = DB::table('system_information')->value('phone');

            view()->share('ins_name', $ins_name);
            view()->share('logo',  $logo_name);
            view()->share('icon', $icon_name);
            view()->share('ins_add', $ins_add);
            view()->share('ins_phone', $ins_phone);
            view()->share('ins_email', $ins_email);


        }else{

            $icon_name = '';
            $logo_name ='';
            $ins_name = '';
            $ins_add = '';

            $ins_email = '';

            $ins_phone = '';

            view()->share('ins_name', $ins_name);
            view()->share('logo',  $logo_name);
            view()->share('icon', $icon_name);
            view()->share('ins_add', $ins_add);
            view()->share('ins_phone', $ins_phone);
            view()->share('ins_email', $ins_email);

        }
    }
}
