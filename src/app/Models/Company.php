<?php

namespace App\Models;

use App\Traits\CompanyActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Company extends Model
{
    use HasFactory;
    use CompanyActivity;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'creator_user_id',
        'country_id',
        'city_id',
    ];

    protected $appends = [
        'is_verified',
        'profile_photo_url',
        'activities',
        'category_ids',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(CompanyCategory::class, 'companies_categories');
    }

    public function getIsVerifiedAttribute()
    {
        return $this->verified_at !== null;
    }

    public function getProfilePhotoUrlAttribute()
    {
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=7F9CF5&background=EBF4FF';
    }

    public function getActivitiesAttribute()
    {
        return $this->activities()->orderBy('id', 'desc')->take(10)->get();
    }

    public function getCategoryIdsAttribute()
    {
        return $this->categories()->allRelatedIds();
    }
}
