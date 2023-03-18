<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WSCube Tech Laravel</title>
    @vite('resources/css/app.css')
</head>

<body class="antialiased">
    <div class="container mx-auto">
        <nav class="flex items-center bg-gray-700 text-white px-10 py-3">
            <div class="pr-10 flex items-center">
                <a href="{{route('/')}}" class="text-2xl">Easyfie</a>
            </div>
            <div class="flex items-center">
                <ul class="flex">
                    <li class="pr-5">
                        <a href="{{route('/')}}">Home</a>
                    </li>
                    <li class="pr-5">
                        <a href="{{route('register')}}">Register</a>
                    </li>
                    <li class="pr-5">
                        <a href="{{route('customer.view')}}">Customer</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</body>

</html>