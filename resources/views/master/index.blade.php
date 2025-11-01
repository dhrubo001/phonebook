<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'PhoneBook' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>

    @livewireStyles
</head>

<body
    class="min-h-screen bg-gradient-to-br from-blue-500 via-indigo-500 to-purple-600 flex items-center justify-center px-4">

    @yield('content')
    @livewireScripts
</body>

</html>
