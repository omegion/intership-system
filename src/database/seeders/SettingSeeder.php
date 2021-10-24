<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

const GROUPS = array(
    array(
        "name" => "system",
        "description" => "General settings for the system",
        "settings" => array(
            array(
                "name" => "allow",
                "description" => "Allow",
            )
        )
    ),
    array(
        "name" => "user",
        "description" => "General settings for the system",
        "settings" => array()
    ),
);

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (GROUPS as $group) {
            foreach ($group['settings'] as $setting) {
                print($setting['name']);
            }
        }
    }
}
