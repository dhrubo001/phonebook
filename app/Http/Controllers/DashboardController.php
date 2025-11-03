<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function getDashboard()
    {
        $title = 'Dashboard';
        return view('pages.dashboard', compact('title'));
    }

    public function getContacts()
    {
        $title = 'Contacts';
        return view('pages.contacts', compact('title'));
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('dashboard');
    }
}
