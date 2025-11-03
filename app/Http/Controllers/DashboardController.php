<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function getDashboard()
    {
        $title = 'Dashboard';
        $contacts = Auth::user()->contacts;
        return view('pages.dashboard', compact('title', 'contacts'));
    }

    public function getContacts()
    {
        $title = 'Contacts';
        $contacts = Auth::user()->contacts;
        return view('pages.contacts', compact('title', 'contacts'));
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('dashboard');
    }
}
