<?php

namespace App\Listeners;

use App\Events\CompanyUnverified;
use App\Models\CompanyActivity;

class CreateCompanyUnverifiedActivity
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param CompanyUnverified $event
     * @return void
     */
    public function handle(CompanyUnverified $event)
    {
        $event->company->activities()->save(new CompanyActivity([
            'name' => 'Company unverified',
            'description' =>
                sprintf(
                    'It is unverified by %s. Either manually or company data has changed and needs to be verified again.',
                    $event->user->name
                ),
            'type' => 'warning',
            'user_id' => $event->user->id
        ]));
    }
}
