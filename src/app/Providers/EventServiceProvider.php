<?php

namespace App\Providers;

use App\Events\CompanyCreated;
use App\Events\CompanyUnverified;
use App\Events\CompanyUpdated;
use App\Events\CompanyVerified;
use App\Listeners\AssigningStudentRoleToCreatedUser;
use App\Listeners\CreateCompanyCreatedActivity;
use App\Listeners\CreateCompanyUnverifiedActivity;
use App\Listeners\CreateCompanyUpdatedActivity;
use App\Listeners\CreateCompanyVerifiedActivity;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            AssigningStudentRoleToCreatedUser::class
        ],
        CompanyCreated::class => [
            CreateCompanyCreatedActivity::class,
        ],
        CompanyUpdated::class => [
            CreateCompanyUpdatedActivity::class,
        ],
        CompanyVerified::class => [
            CreateCompanyVerifiedActivity::class,
        ],
        CompanyUnverified::class => [
            CreateCompanyUnverifiedActivity::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
