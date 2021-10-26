<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SettingGroup extends Model
{
    use HasFactory;

    protected array $fillable = [
        'description',
    ];

    public function settings(): HasMany
    {
        return $this->hasMany(Setting::class, 'group_id');
    }
}
