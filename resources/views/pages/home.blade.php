@extends('master.index')
@section('content')
    <div class="w-full max-w-md bg-white/90 backdrop-blur-md rounded-2xl shadow-xl p-8">
        @include('includes.flashMessage')
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Welcome Back 👋</h1>
            <p class="text-gray-500 text-sm">Please sign in to your account</p>
        </div>

        <form action="{{ route('postLogin') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" id="email" name="email" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="you@example.com" />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="••••••••" />
            </div>

            {{-- <div class="flex items-center justify-between text-sm">
                <label class="flex items-center space-x-2 text-gray-600">
                    <input type="checkbox" class="text-indigo-600 rounded" />
                    <span>Remember me</span>
                </label>
                <a href="#" class="text-indigo-600 hover:underline">Forgot password?</a>
            </div> --}}

            <button type="submit"
                class="w-full bg-indigo-600 text-white font-semibold py-2.5 rounded-lg hover:bg-indigo-700 transition-all duration-200">
                Sign In
            </button>
        </form>

        <p class="text-center text-gray-600 text-sm mt-6">
            Don’t have an account?
            <a href="#" class="text-indigo-600 font-semibold hover:underline">Create one</a>
        </p>
    </div>
@endsection
