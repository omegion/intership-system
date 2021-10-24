<?php

namespace App\Listeners;

use App\Events\CompanyUpdated;
use App\Models\CompanyActivity;

class CreateCompanyUpdatedActivity
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
     * @param CompanyUpdated $event
     * @return void
     */
    public function handle(CompanyUpdated $event)
    {
        $event->company->activities()->save(new CompanyActivity([
            'name' => 'Company updated',
            'description' => sprintf('It is updated by %s.', $event->user->name),
            'user_id' => $event->user->id
        ]));
    }
}
