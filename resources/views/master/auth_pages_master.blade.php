<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Phonebook Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex min-h-screen">

    @include('includes.sidebar')

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        @include('includes.header')
        <!-- Content Area -->
        <main class="flex-1 p-6">

            @yield('content')

        </main>

    </div>
</body>

</html>
