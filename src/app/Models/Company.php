<?php

namespace App\Models;

use App\Traits\CompanyActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Company
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int|null $creator_user_id
 * @property string|null $verified_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $is_verified
 * @property-read mixed $profile_photo_url
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatorUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereVerifiedAt($value)
 * @mixin \Eloquent
 */
class Company extends Model
{
    use HasFactory;
    use CompanyActivity;

    protected array $fillable = [
        'name',
        'email',
        'creator_user_id',
        'country_id',
        'city_id',
    ];

    protected $appends = [
        'is_verified',
        'profile_photo_url',
        'activities',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
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
}
