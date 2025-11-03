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
        //$contacts = Contact::where('user_id', Auth::id())->latest()->paginate(10);
        return view('pages.contacts', compact('title'));
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('dashboard');
    }
}
