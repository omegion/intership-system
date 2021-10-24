<?php

namespace App\Http\Middleware;

use App\Traits\InteractsWithBanner;
use Closure;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class RoleRequired
{
    use InteractsWithBanner;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $redirectToRoute
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse|null
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $routeTitle = Str::of($request->route()->getName())->replace('.', ' ')->title();

        if (!$request->user()->hasRole(...$roles)) {
            $message = "You cannot review <strong>${routeTitle}</strong> page.";
            $this->banner($message, 'warning');
            return $request->expectsJson()
                ? abort(403, $message)
                : Redirect::guest(URL::route('dashboard'));
        }

        return $next($request);
    }
}
