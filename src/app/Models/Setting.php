<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected array $fillable = [
        'value',
        'description',
    ];

    protected $appends = [
        'casted_value',
    ];

    public function getCastedValueAttribute()
    {
        return $this->cast($this->value, $this->value_type);
    }

    public static function get(string $slug, $default = false)
    {
        $setting = Setting::query()->where('slug', $slug)->first();

        if (is_null($setting)) {
            return $default;
        }

        return (new Setting)->cast($setting->value, $setting->value_type);
    }

    private function cast(string $value, string $type)
    {
        switch ($type) {
            case "boolean":
                return filter_var($value, FILTER_VALIDATE_BOOLEAN);
            case "integer":
                return (integer)$value;
            default:
                return $value;
        }
    }
}
