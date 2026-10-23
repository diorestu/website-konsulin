<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\SiteSetting;
use App\Support\PublicContent;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class SettingController extends Controller
{
    public function edit(): Response
    {
        return Inertia::render('Admin/Settings', ['settings' => PublicContent::settings()]);
    }

    public function update(SettingRequest $request): RedirectResponse
    {
        SiteSetting::updateOrCreate(['key' => 'website'], ['value' => $request->validated()]);

        return back()->with('success', 'Pengaturan website disimpan.');
    }
}
