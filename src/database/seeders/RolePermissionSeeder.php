<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

const STUDENT = [
    "Can List Students",
    "Can View Students",
    "Can Edit Students",
];

const COMPANY = [
    "Can Verify Company",
];

const LOCATION = [
//    Country
    "Can List Country",
    "Can View Country",
    "Can Edit Country",
    "Can Delete Country",
//    City
    "Can List City",
    "Can View City",
    "Can Edit City",
    "Can Delete City",
];

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolesPermissions = [
            "Admin" => [
                ...STUDENT,
                ...COMPANY,
                ...LOCATION
            ],
            "Lecturer" => [
                ...STUDENT,
                ...COMPANY
            ],
            "Student" => [

            ],
        ];

        foreach ($rolesPermissions as $role => $permissions) {
            $role = Role::updateOrCreate([
                'name' => $role,
                'slug' => Str::slug($role),
            ]);

            foreach ($permissions as $permission) {
                $permission = Permission::updateOrCreate([
                    'name' => $permission,
                    'slug' => Str::slug($permission),
                ]);

                if (!$role->permissions()->where('id', $permission->id)->exists()) {
                    $role->permissions()->save($permission);
                }
            }
        }
    }
}
