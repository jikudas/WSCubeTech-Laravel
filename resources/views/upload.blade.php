<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel_CRUD</title>
    @vite('resources/css/app.css')
</head>

<body class="antialiased">
    <form action="{{route('customer.upload')}}" method="post" enctype="multipart/form-data" class="bg-gray-100 flex items-center justify-center mt-12 w-1/2">
        @csrf
        <label class="pr-5">Upload : </label>
        <input type="file" name="img"/>
        <button class="bg-blue-300 rounded-md px-3 py-2">Submit</button>
    </form>
</body>

</html>