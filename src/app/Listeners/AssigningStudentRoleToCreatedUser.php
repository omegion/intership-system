<?php

namespace App\Listeners;

use App\Models\Role;
use Illuminate\Auth\Events\Registered;

class AssigningStudentRoleToCreatedUser
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
     * @param Registered $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $role = Role::whereSlug('student')->first();

        $event->user->assignRole($role);
    }
}
