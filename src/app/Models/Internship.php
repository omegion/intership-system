<?php

namespace App\Models;

use App\Traits\QueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

const RANDOM_CODE_LENGTH = 8;
const RANDOM_CODE_FORMAT = 'I-%s';

class Internship extends Model
{
    use HasFactory;
    use QueryBuilder;

    protected array $fillable = [
        'code',
        'education_year',
        'country_id',
        'city_id',
        'company_id',
        'user_id',
        'starts_at',
        'ends_at',
        'verified_at',
    ];

    public function setRandomCode()
    {
        $this->code = sprintf(RANDOM_CODE_FORMAT, Str::upper(Str::random(RANDOM_CODE_LENGTH)));
        while (Internship::query()->where('code', $this->code)->exists()) {
            $this->code = sprintf(RANDOM_CODE_FORMAT, Str::upper(Str::random(RANDOM_CODE_LENGTH)));
        }
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
