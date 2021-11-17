<?php

namespace App\Models;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyCategory extends Model
{
    use HasFactory;

  protected $fillable = [
    'name',
    'slug',
  ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot',
    ];

    public static function search($query = '', array $current_ids = null): LengthAwarePaginator
    {
        $q = CompanyCategory::query();

        if ($current_ids !== null && count($current_ids) > 0) {
            $ids = implode(',', $current_ids);

            $q->orderByRaw("IF(id IN (${ids}), 0,1)");
        }

        return $q->where('name', 'LIKE', "%{$query}%")
            ->paginate(Setting::get('system.pagination-page-size', 1000));
    }
}
