<div>
    <div class="bg-white shadow-xl rounded-2xl w-full max-w-md p-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Profile Settings</h2>
        @include('includes.flashMessage', ['key' => 'profile'])
        <!-- Update Name & Email Form -->
        <form class="space-y-5" wire:submit.prevent="updateProfile">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" id="name" wire:model="name" placeholder="John Doe"
                    class="mt-1 block w-full rounded-xl border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm" />
                @error('name')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" id="email" wire:model="email" placeholder="you@example.com"
                    class="mt-1 block w-full rounded-xl border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm" />
                @error('email')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 text-white font-medium py-2 rounded-xl hover:bg-indigo-700 transition-all duration-200">
                Update Profile
            </button>
        </form>


        <!-- Divider -->
        <div class="flex items-center my-8">
            <div class="flex-1 h-px bg-gray-200"></div>
            <span class="px-3 text-sm text-gray-500">or</span>
            <div class="flex-1 h-px bg-gray-200"></div>
        </div>

        <!-- Reset Password Form -->
        @include('includes.flashMessage', ['key' => 'password'])
        <form class="space-y-5" wire:submit.prevent="resetPassword">
            <div>
                <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                <input type="password" id="current_password" wire:model="current_password" name="current_password"
                    placeholder="••••••••"
                    class="mt-1 block w-full rounded-xl border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm" />
                @error('current_password')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
                <input type="password" id="new_password" wire:model="new_password" name="new_password"
                    placeholder="••••••••"
                    class="mt-1 block w-full rounded-xl border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm" />
                @error('new_password')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" wire:model="new_password_confirmation" name="new_password_confirmation"
                    id="new_password_confirmation" placeholder="••••••••"
                    class="mt-1 block w-full rounded-xl border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm" />
                @error('new_password_confirmation')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-red-600 text-white font-medium py-2 rounded-xl hover:bg-red-700 transition-all duration-200">
                Reset Password
            </button>
        </form>
    </div>
</div>
