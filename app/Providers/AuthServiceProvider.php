<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        //new gate
        Gate::resource('posts','App\Policies\PostPolicy');
        Gate::resource('settings','App\Policies\SettingsPolicy');
        Gate::resource('pages','App\Policies\PagesPolicy');
        Gate::resource('permissions','App\Policies\Permissions');
        Gate::resource('downloads','App\Policies\Downloads');
        Gate::resource('banners','App\Policies\Banners');
        Gate::resource('csd','App\Policies\Case_studies');
        Gate::resource('members','App\Policies\Members');
        Gate::resource('offers','App\Policies\Offers');
        Gate::resource('reviews','App\Policies\Reviews');
        Gate::resource('services','App\Policies\Services');
        Gate::resource('portfolios','App\Policies\Portfolios');
        Gate::resource('images','App\Policies\Images');
        Gate::resource('users','App\Policies\Users');
        Gate::resource('roles','App\Policies\Roles');
        Gate::resource('categories','App\Policies\Categories');
        Gate::resource('tags','App\Policies\Tags');
        Gate::resource('mails','App\Policies\Mails');
    }
}
