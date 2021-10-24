<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

const API_URL = "https://restcountries.com/v3.1/all?fields=name,flags,cca2";

class CountrySeeder extends Seeder
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
            $res = Country::updateOrCreate([
                'name' => $item['name']['common'],
                'slug' => Str::slug($item['name']['common']),
                'code' => $item['cca2'],
                'flag_url' => $item['flags']['svg'],
                'verified_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
