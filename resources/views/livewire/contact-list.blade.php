<div>
    <div class="bg-white rounded-xl shadow p-6 mt-5">
        <h2 class="text-lg font-semibold mb-4 text-gray-700">Saved Contacts</h2>
        @include('includes.flashMessage')
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-indigo-100 text-indigo-800">
                    <th class="text-left py-2 px-3">#</th>
                    <th class="text-left py-2 px-3">Name</th>
                    <th class="text-left py-2 px-3">Phone</th>
                    <th class="text-left py-2 px-3">Email</th>
                    <th class="text-left py-2 px-3">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @if ($contacts->count() == 0)
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">No contacts found.</td>
                    </tr>
                @else
                    @foreach ($contacts as $contact)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-3">{{ $loop->iteration }}</td>
                            <td class="py-2 px-3">{{ $contact->name }}</td>
                            <td class="py-2 px-3">{{ $contact->phone }}</td>
                            <td class="py-2 px-3">{{ $contact->email }}</td>
                            <td class="py-2 px-3">
                                <div class="flex space-x-2">
                                    <button
                                        class="px-3 py-1.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition"
                                        wire:click="editContact({{ $contact->id }})">
                                        Edit
                                    </button>

                                    <button
                                        class="px-3 py-1.5 bg-red-600 text-white rounded-md hover:bg-red-700 transition"
                                        wire:click="deleteContact({{ $contact->id }})"
                                        wire:confirm="Are you sure you want to delete this contact?">
                                        Delete
                                    </button>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
        {{ $contacts->links() }}
    </div>

    @if ($showEditModal)
        <!-- Modal Background -->
        <div id="contactModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">

            <!-- Modal Content -->
            <div class="bg-white rounded-xl shadow-lg w-96 p-6 relative">

                <!-- Modal Header -->
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold text-gray-700">Edit Contact</h2>
                    <button wire:click="closeModal()" class="text-gray-500 hover:text-gray-700 text-xl">&times;</button>
                </div>

                <!-- Modal Form -->
                <form id="contactForm" wire:submit.prevent="updateContact">
                    <div class="mb-3">
                        <label class="block text-sm text-gray-600 mb-1">Name</label>
                        <input type="text" id="name" wire:model="name"
                            class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500"
                            placeholder="John Doe">
                        @error('name')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="block text-sm text-gray-600 mb-1">Mobile</label>
                        <input type="text" id="mobile" wire:model="phone"
                            class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500"
                            placeholder="+91 9876543210">
                        @error('phone')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm text-gray-600 mb-1">Email</label>
                        <input type="email" id="email" wire:model="email"
                            class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500"
                            placeholder="john@example.com">
                        @error('email')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Modal Actions -->
                    <div class="flex justify-end gap-3">
                        <button type="button" wire:click="closeModal()"
                            class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition">
                            Close
                        </button>
                        <button type="submit"
                            class="bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700 transition">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

</div>
