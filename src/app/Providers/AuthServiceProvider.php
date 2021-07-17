<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();
        Passport::loadKeysFrom(base_path('/keys'));
        Passport::hashClientSecrets();

        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addMonths(6));
        Passport::personalAccessTokensExpireIn(now()->addMonths(2));
        Passport::tokensCan([
            'do_anything' => 'Administrator',
            'create_device' =>'device',
            'group_management' =>'manage',
            'checkin'=>'everybody',
            'checkout'=>'everybody',
            'view'=>'everybody ',
            'update'=>'everybody ',
        ]);
        Passport::setDefaultScope([
            'checkin',
            'checkout',
            'view',
            'update',
        ]);
    }
}
