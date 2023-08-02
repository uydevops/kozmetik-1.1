<?php

namespace App\Http\Controllers\backend\SiteSettings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSettings;

class SiteController extends Controller
{
    public function siteSettingsUpdate(Request $request)
    {
        $requestData = $request->except('_token');

        foreach ($requestData as $key => $value) {
            SiteSettings::where('settings_name', $key)->update(['settings_value' => $value]);
        }

        return redirect()->back()->with('success', 'Site Ayarları Başarıyla Güncellendi');
    }

    public function siteSettingsAdd(Request $request)
    {

        SiteSettings::insert([
            'settings_name' => $request->settings_name,
            'settings_value' => $request->settings_value,
        ]);

        return redirect()->back()->with('success', 'Site Ayarları Başarıyla Eklendi');
    }

    public function SiteSettingsAddForm()
    {
        return view('admin.panel.site-settings-add');

    }

    public function siteSettingsDelete(string $value)
    {
       $valueFind = SiteSettings::where('settings_name', $value)->first();
         $valueFind->delete();
        return redirect()->back()->with('success', 'Site Ayarları Başarıyla Silindi');

    }

}
