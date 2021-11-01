<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder as QBuilder;

trait QueryBuilder
{
    public static function builder(?Request $request = null): QBuilder
    {
        return QBuilder::for(self::query(), $request);
    }

    public static function isSortable(): bool
    {
        return request()->has('sortColumn') && request()->has('sortDirection');
    }

    public static function getSort(): string
    {
        return sprintf(
            "%s%s",
            request()->get('sortDirection') == 'descending' ? '-' : '',
            request()->get('sortColumn')
        );
    }
}
