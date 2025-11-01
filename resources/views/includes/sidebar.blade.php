<!-- Sidebar -->
<aside class="w-64 bg-indigo-700 text-white flex flex-col">
    <div class="p-5 text-2xl font-bold border-b border-indigo-500">
        📇 MyPhonebook
    </div>
    <nav class="flex-1 p-4 space-y-2">
        <a href="{{ route('dashboard') }}" wire:navigate wire:current="bg-indigo-800 font-medium"
            class="block py-2.5 px-4 rounded-lg">Dashboard</a>
        <a href="{{ route('contacts') }}" wire:navigate wire:current="bg-indigo-800 font-medium"
            class="block py-2.5 px-4 rounded-lg hover:bg-indigo-600">Contacts</a>
        {{-- <a href="{{ route('settings') }}" wire:navigate class="block py-2.5 px-4 rounded-lg hover:bg-indigo-600">Settings</a> --}}
        <a href="{{ route('logout') }}" wire:navigate wire:current="bg-indigo-800 font-medium"
            class="block py-2.5 px-4 rounded-lg hover:bg-indigo-600">Logout</a>
    </nav>
    <div class="p-4 border-t border-indigo-500 text-sm text-indigo-200">
        Logged in as <br><span class="font-semibold">{{ Auth::user()->name }}</span>
    </div>
</aside>
