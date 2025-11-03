<?php

namespace App\Http\Controllers;

class SettingController extends Controller
{
    public function getSetting()
    {
        $title = "Settings";
        return view('pages.settings', compact('title'));
    }
}
