<div class="bg-white rounded-xl shadow p-6">
    <h2 class="text-lg font-semibold mb-4 text-gray-700">Add New Contact</h2>

    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-3">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="block text-sm text-gray-600 mb-1">Name</label>
            <input type="text" wire:model="name"
                class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500" placeholder="John Doe">
            @error('name')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-sm text-gray-600 mb-1">Phone Number</label>
            <input type="text" wire:model="phone"
                class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500"
                placeholder="+91 9876543210">
            @error('phone')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-sm text-gray-600 mb-1">Email</label>
            <input type="email" wire:model="email"
                class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500"
                placeholder="john@example.com">
            @error('email')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="md:col-span-3 flex justify-end mt-2">
            <button type="submit"
                class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition flex items-center"
                wire:loading.attr="disabled">

                <!-- Normal State -->
                <span wire:loading.remove wire:target="save">Save Contact</span>

                <!-- Loading State -->
                <span wire:loading wire:target="save" class="flex items-center gap-2">
                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8 0 00-8 8z">
                        </path>
                    </svg>
                    Saving Contact...
                </span>
            </button>
        </div>
    </form>
</div>
