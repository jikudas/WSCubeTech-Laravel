<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('./backend/dist/styles.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <style>
        .login {
            background: url("{{asset('./backend/dist/images/login-new.jpeg')}}")
        }
    </style>
    <title>Register</title>
</head>

<body class="h-screen font-sans login bg-cover">
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
    <div class="container mx-auto h-full flex flex-1 justify-center items-center">
        <div class="w-full max-w-lg">
            <div class="leading-loose">
                <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" action="{{route('register')}}" method="post">
                    @csrf
                    <p class="text-gray-800 font-medium text-center">Register</p>
                    <div class="">
                        <label class="block text-sm text-gray-00" for="cus_name">Name</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" name="full_name" type="text" placeholder="Your Name">
                        <span class="text-red-500 italic text-sm">
                            @error('full_name')
                            *{{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="cus_email">Email</label>
                        <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" name="email" type="email" placeholder="Your Email">
                        <span class="text-red-500 italic text-sm">
                            @error('email')
                            *{{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="cus_email">Password</label>
                        <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" name="password" type="password" placeholder="*************">
                        <span class="text-red-500 italic text-sm">
                            @error('password')
                            *The password and confirm password field do not match
                            @enderror
                        </span>
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="cus_email">Confirm Password</label>
                        <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" name="password_confirmation" type="password" placeholder="*************">
                    </div>
                    <div class="mt-4">
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Register</button>
                    </div>

                    <a class="inline-block right-0 align-baseline font-bold text-sm text-500 hover:text-blue-800" href="#">
                        Already have an account ?
                    </a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>