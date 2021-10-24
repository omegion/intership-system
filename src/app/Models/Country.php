<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected array $fillable = [
        'name',
        'slug',
        'code',
        'flag_url',
        'verified_at',
    ];

    public static function search($query = '', $current_id = null): Collection
    {
        $q = Country::query();

        if ($current_id !== null) {
            $q->orderByRaw("IF(id = {$current_id}, 0,1)");
        }

        $q->where('name', 'LIKE', "%{$query}%")
            ->take(config('app.page_size'));

        return $q->get();
    }
}
