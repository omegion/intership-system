<?php

namespace App\Listeners;

use App\Events\CompanyVerified;
use App\Models\CompanyActivity;

class CreateCompanyVerifiedActivity
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
     * @param CompanyVerified $event
     * @return void
     */
    public function handle(CompanyVerified $event)
    {
        $event->company->activities()->save(new CompanyActivity([
            'name' => 'Company verified',
            'description' => sprintf('It is verified by %s.', $event->user->name),
            'type' => 'success',
            'user_id' => $event->user->id
        ]));
    }
}
