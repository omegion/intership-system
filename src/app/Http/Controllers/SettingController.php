<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\SettingGroup;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SettingController extends Controller
{
    public function index(Request $request): Response
    {
        $settingGroups = SettingGroup::with('settings')->get();

        return Inertia::render('Setting/List', [
            'settingGroups' => $settingGroups
        ]);
    }

    public function update(Request $request, Setting $setting)
    {
        $setting->fill([
            'value' => $request->input('value'),
        ]);

        if ($setting->isDirty()) {
            $setting->save();
        }

        return $request->wantsJson()
            ? new JsonResponse('', 200)
            : back();
    }
}
