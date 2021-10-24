<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

const API_URL = "https://raw.githubusercontent.com/omegion/turkey-cities/master/cities.json";

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->fetch();
    }

    protected function fetch()
    {
        $response = Http::get(API_URL);
        foreach ($response->json() as $item) {
            City::updateOrCreate([
                'name' => Str::title($item['name']),
                'slug' => Str::slug($item['name']),
                'verified_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
