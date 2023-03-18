<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel_CRUD</title>
    @vite('resources/css/app.css')
</head>

<body class="antialiased bg-gray-700">
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
    <div class="container flex justify-center px-5 py-5">
        <div class="bg-gray-100 w-3/4 h-3/4 py-5">
            <h2 class="text-blue-700 text-2xl text-center mb-5">Update Customer</h2>
            <form class="mx-5" action="{{route('customer.update', ['id' => $customer->customer_id])}}" method="post">
                @csrf
                <div class="flex mb-5">
                    <div class="flex flex-col w-full mr-5">
                        <label class="mb-3 text-gray-700">Name: <span class="text-red-500">*</span></label>
                        <input class="border border-gray-200 shadow-sm w-full pl-2 py-1" type="text" placeholder="Your Name" name="name" value="{{$customer->name}}" />
                        <span class="text-red-500 italic text-sm">
                            @error('name')
                            *{{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="flex flex-col w-full">
                        <label class="mb-3 text-gray-700">Email: <span class="text-red-500">*</span></label>
                        <input class="border border-gray-200 shadow-sm w-full pl-2 py-1" type="email
                        " placeholder="Your Email Address" name="email" value="{{$customer->email}}" />
                        <span class="text-red-500 italic text-sm">
                            @error('email')
                            *{{$message}}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="flex mb-5">
                    <div class="flex flex-col w-full mr-5">
                        <label class="mb-3 text-gray-700">Password: <span class="text-red-500">*</span></label>
                        <input class="border border-gray-200 shadow-sm w-full pl-2 py-1" type="password" placeholder="Type a Password" name="password" />
                    </div>
                    <div class="flex flex-col w-full">
                        <label class="mb-3 text-gray-700">Confirm Password: <span class="text-red-500">*</span></label>
                        <input class="border border-gray-200 shadow-sm w-full pl-2 py-1" type="password" placeholder="Confirm your password" name="password_confirmation" />
                        <span class="text-red-500 italic text-sm">
                    </div>
                </div>
                <div class="flex mb-5">
                    <div class="flex flex-col w-full mr-5">
                        <label class="mb-3 text-gray-700">Country:</label>
                        <input class="border border-gray-200 shadow-sm w-full pl-2 py-1 outline-2 outline-offset-2" type="text" placeholder="Your Country" name="country" value="{{$customer->country}}" />
                    </div>
                    <div class="flex flex-col w-full">
                        <label class="mb-3 text-gray-700">State:</label>
                        <input class="border border-gray-200 shadow-sm w-full pl-2 py-1 outline-2 outline-offset-2" type="text" placeholder="Your State" name="state" value="{{$customer->state}}" />
                    </div>
                </div>
                <div class="flex mb-5">
                    <div class="flex flex-col w-full">
                        <label class="mb-3 text-gray-700">Address:</label>
                        <input class="border border-gray-200 shadow-sm w-full pl-2 py-1 outline-0 hover:outline-2 hover:outline-dotted hover:outline-zinc-500" type="textarea" placeholder="Your Address" name="address" value="{{$customer->address}}" />
                    </div>
                </div>
                <div class="flex mb-5">
                    <div class="flex flex-col w-full">
                        <label class="text-gray-700">Gender:</label>
                        <div class="flex w-full mr-5 justify-left items-center mt-3">
                            <input class="border border-gray-200 shadow-sm mr-2" type="radio" value="M" name="gender" {{$customer->gender === "M" ? 'checked' : ''}} /><span class="mr-2">Male</span>
                            <input class="border border-gray-200 shadow-sm mr-2" type="radio" value="F" name="gender" {{$customer->gender === "F" ? 'checked' : ''}} /><span class="mr-2">Female</span>
                            <input class="border border-gray-200 shadow-sm mr-2" type="radio" value="O" name="gender" {{$customer->gender === "O" ? 'checked' : ''}} /><span class="mr-2">Other</span>
                        </div>
                    </div>
                    <div class="flex flex-col w-full">
                        <label class="mb-3 text-gray-700">Date of Birth:</label>
                        <input class="border border-gray-200 shadow-sm w-full pl-2 py-1 outline-0" type="date" placeholder="Date of Birth" name="dob" value="{{$customer->dob}}"/>
                    </div>
                </div>
                <button class="w-full bg-blue-600 text-white py-2 rounded-md text-lg">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>