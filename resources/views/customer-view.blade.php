<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Customers</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <div class="flex mx-11 my-5">
        <div class="flex items-center w-4/5">
            <form action="" class="w-full">
                <input type="search" name="search" placeholder="Search your desire" value="{{$search}}" class="border-2 border-gray-300 pl-3 py-1 rounded-md text-lg w-4/5 mr-5">
                <button class="bg-green-300 text-lg px-3 py-2 rounded-lg">Search</button>
                <a href="{{route('customer.view')}}">
                    <button type="button" class="bg-yellow-300 text-lg px-3 py-2 rounded-lg">Reset</button>
                </a>
            </form>
        </div>
        <div class="ml-auto flex items-center">
            <a href="{{route('customer.trash')}}" class="text-lg text-white bg-red-500 px-3 py-2 rounded-md mr-5">Go to Trash
            </a>
            <a href="{{route('customer.create')}}" class="text-lg text-white bg-blue-500 px-3 py-2 rounded-md">Add
            </a>
        </div>
    </div>
    <div class="flex justify-center">
        <table class="mx-5">
            <thead>
                <tr>
                    <th class="px-5 py-1 border-2 border-green-300">Name</th>
                    <th class="px-5 py-1 border-2 border-green-300">Email</th>
                    <th class="px-5 py-1 border-2 border-green-300">Gender</th>
                    <th class="px-5 py-1 border-2 border-green-300">DOB</th>
                    <th class="px-5 py-1 border-2 border-green-300">Address</th>
                    <th class="px-5 py-1 border-2 border-green-300">State</th>
                    <th class="px-5 py-1 border-2 border-green-300">Country</th>
                    <th class="px-5 py-1 border-2 border-green-300">Status</th>
                    <th class="px-5 py-1 border-2 border-green-300">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                <tr>
                    <td class="px-1 border-2 border-green-300 text-center">{{$customer->name}}</td>
                    <td class="px-1 border-2 border-green-300 text-center">{{$customer->email}}</td>
                    <td class="px-1 border-2 border-green-300 text-center">
                        @if($customer->gender === 'M')
                        Male
                        @elseif($customer->gender === 'F')
                        Female
                        @else
                        Other
                        @endif
                    </td>
                    <td class="px-1 border-2 border-green-300 text-center">{{$customer->dob}}</td>
                    <td class="px-1 border-2 border-green-300 text-center">{{$customer->address}}</td>
                    <td class="px-1 border-2 border-green-300 text-center">{{$customer->state}}</td>
                    <td class="px-1 border-2 border-green-300 text-center">{{$customer->country}}</td>
                    <td class="px-1 border-2 border-green-300 text-center">
                        @if($customer->status === 1)
                        <a href="#" class="bg-green-500 px-1 rounded">Active</a>
                        @else
                        <a href="#" class="bg-red-500 px-1 rounded">Inactive</a>
                        @endif
                    </td>
                    <!-- <td class="px-3 border-2 border-green-300 text-center">
                        <a href="">
                            <i class="fa-regular fa-pen-to-square pr-5 text-xl text-yellow-700"></i>
                        </a>
                        <a href="">
                            <i class="fa-solid fa-trash text-xl text-red-700"></i>
                        </a>
                    </td> -->
                    <td class="px-3 border-2 border-green-300 text-center">
                        <a class="text-white bg-yellow-600 px-3 py-2 rounded" href="{{route('customer.edit', ['id' => $customer->customer_id])}}">Edit</a>
                        <a class="text-white bg-red-600 px-3 py-2 rounded" href="{{route('customer.delete', ['id' => $customer->customer_id])}}">Trash</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="py-12 mx-auto flex items-center justify-center">
        <ul class="flex">
            <li class="border border-1 border-green-300 px-2 py-1">Prev</li>
            <li class="border border-1 border-green-300 px-2 py-1">1</li>
            <li class="border border-1 border-green-300 px-2 py-1">2</li>
            <li class="border border-1 border-green-300 px-2 py-1">3</li>
            <li class="border border-1 border-green-300 px-2 py-1">4</li>
            <li class="border border-1 border-green-300 px-2 py-1">5</li>
            <li class="border border-1 border-green-300 px-2 py-1">6</li>
            <li class="border border-1 border-green-300 px-2 py-1">7</li>
            <li class="border border-1 border-green-300 px-2 py-1">8</li>
            <li class="border border-1 border-green-300 px-2 py-1">9</li>
            <li class="border border-1 border-green-300 px-2 py-1">10</li>
            <li class="border border-1 border-green-300 px-2 py-1">{{$customers->lastPage()}}</li>
            <li class="border border-1 border-green-300 px-2 py-1">Next</li>
        </ul>
    </div>
    <!-- {{$customers->links()}} -->
</body>

</html>