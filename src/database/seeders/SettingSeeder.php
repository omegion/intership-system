<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\SettingGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

const GROUPS = array(
    array(
        "name" => "system",
        "description" => "General settings for the system",
        "settings" => array(
            array(
                "name" => "Pagination page size",
                "description" => "You can change the pagination page size. It sets how many items will be shown per page. Default value is set to 10.",
                "default" => [
                    "value" => "10",
                    "type" => "integer",
                ]
            )
        )
    ),
    array(
        "name" => "user",
        "description" => "General settings for the users",
        "settings" => array(
            array(
                "name" => "User verification required",
                "description" => "Require user verification to be able to login.",
                "default" => [
                    "value" => "true",
                    "type" => "boolean",
                ]
            )
        )
    ),
    array(
        "name" => "company",
        "description" => "General settings for the companies",
        "settings" => array(
            array(
                "name" => "Require verification after update",
                "description" => "Require verification again after changing company details. When a company altered, its verification will change to unverified. Default value is true.",
                "default" => [
                    "value" => "true",
                    "type" => "boolean",
                ]
            )
        )
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
            if (!SettingGroup::where('slug', Str::slug($group['name']))->exists()) {
                $settingGroup = SettingGroup::create([
                    'name' => $group['name'],
                    'slug' => Str::slug($group['name']),
                    'description' => $group['description'],
                ]);
            } else {
                $settingGroup = SettingGroup::where('slug', Str::slug($group['name']))->first();
                $settingGroup->fill([
                    'description' => $settingGroup['description'],
                ])->save();
            }

            foreach ($group['settings'] as $setting) {
                if (!Setting::where('slug', Str::slug($setting['name']))->exists()) {
                    Setting::create([
                        'name' => $setting['name'],
                        'slug' => sprintf("%s.%s", $group['name'], Str::slug($setting['name'])),
                        'description' => $setting['description'],
                        'value' => $setting['default']['value'],
                        'value_type' => $setting['default']['type'],
                        'group_id' => $settingGroup->id,
                    ]);
                } else {
                    $existingSetting = Setting::where('slug', Str::slug($setting['name']))->first();
                    $existingSetting->forceFill([
                        'description' => $setting['description'],
                    ])->save();
                }

                print($setting['name']);
            }
        }
    }
}
