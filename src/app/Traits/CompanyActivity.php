<?php

namespace App\Traits;

use App\Models\CompanyActivity as CompanyActivityModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait CompanyActivity
{
    public function activities(): HasMany
    {
        return $this->hasMany(CompanyActivityModel::class, 'company_id');
    }
}
