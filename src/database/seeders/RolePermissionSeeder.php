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

const SETTING = [
    "Can List Setting",
    "Can Edit Setting",
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
            [
                "name" => "Admin",
                "description" => "Admin role includes all permission which can execute every possible operation in the system.",
                "permissions" => [
                    ...STUDENT,
                    ...COMPANY,
                    ...LOCATION,
                    ...SETTING
                ]
            ], [
                "name" => "Lecturer",
                "description" => "Lecturer role is operator role which can execute major operations.",
                "permissions" => [
                    ...STUDENT,
                    ...COMPANY
                ]
            ], [
                "name" => "Student",
                "description" => "Student role is a basic consumer role which can execute minor operations.",
                "permissions" => [
                ]
            ],
        ];

        foreach ($rolesPermissions as $role) {
            if (!Role::where('slug', Str::slug($role['name']))->exists()) {
                $createdRole = Role::create([
                    'name' => $role['name'],
                    'slug' => Str::slug($role['name']),
                    'description' => $role['description'],
                ]);
            } else {
                $createdRole = Role::whereSlug(Str::slug($role['name']))->firstOrFail();
                $createdRole->fill([
                    'description' => $role['description'],
                ])->save();
            }


            foreach ($role['permissions'] as $permission) {
                $permission = Permission::updateOrCreate([
                    'name' => $permission,
                    'slug' => Str::slug($permission),
                ]);

                if (!$createdRole->permissions()->where('id', $permission->id)->exists()) {
                    $createdRole->permissions()->save($permission);
                }
            }
        }
    }
}
