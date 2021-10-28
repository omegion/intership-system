<?php

namespace Database\Seeders;

use App\Models\CompanyCategory as CompanyCategoryModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

const API_URL = "https://gist.githubusercontent.com/omegion/f0deb37ee598f7a7c5c78b991a7ab5a2/raw/company-industries.json";

class CompanyCategory extends Seeder
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
            if (!CompanyCategoryModel::where('slug', Str::slug($item['Description']))->exists()) {
                CompanyCategoryModel::create([
                    'name' => $item['Description'],
                    'slug' => Str::slug($item['Description']),
                ]);
            }
        }
    }
}
