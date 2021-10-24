<?php

namespace App\Listeners;

use App\Events\CompanyCreated;
use App\Models\CompanyActivity;

class CreateCompanyCreatedActivity
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
     * @param CompanyCreated $event
     * @return void
     */
    public function handle(CompanyCreated $event)
    {
        $event->company->activities()->save(new CompanyActivity([
            'name' => 'Company created',
            'description' => sprintf('It is created by %s.', $event->user->name),
            'type' => 'success',
            'user_id' => $event->user->id
        ]));
    }
}
