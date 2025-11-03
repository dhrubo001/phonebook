<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function getSetting()
    {
        $title = "Settings";
        return view('pages.settings', compact('title'));
    }
}
