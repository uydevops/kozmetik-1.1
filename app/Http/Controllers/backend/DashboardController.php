<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SiteSettings;
use App\Models\News;

class DashboardController extends Controller
{

    public function index()
    {
        $currentUser = auth()->user();
        return view('admin.panel.dashboard', compact('currentUser'));
    }

    public function siteSettingsForm()
    {
        return view('admin.panel.site-settings');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }


    public function newsList()
    {

        $newsList = News::all();
        #dd($newsList);

        return view('admin.panel.newsList', compact('newsList'));
    }

    public function newsForm()
    {
        return view('admin.panel.newsAdd');
    }
}
