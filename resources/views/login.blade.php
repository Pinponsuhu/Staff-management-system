<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff management System</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="{{ asset('js/all.js') }}"></script>
    <style>
        body{
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-purple-100">
    <div class="md:w-6/12 lg:w-4/12 w-11/12 mx-auto bg-white px-4 md:px-14 mt-8 md:mt-12 py-6 md:py-10">
        <img src="{{ asset('img/lasu.png') }}" class="h-16 w-auto" alt="">
        <h1 class="font-bold text-3xl text-purple-900 mt-6">Welcome Back</h1>
        <p class="text-md font-medium text-gray-400">Sign in to continue</p>
        <form action="/login" method="post" class="mt-4">
            @csrf
            @if (session('message'))
                <p class="text-red-400 text-md text-center font-bold text-sm my-2">{{ session('message') }}</p>
            @endif
            <input type="text" name="email" class="block w-full border-b-2 border-purple-900 mb-3 py-3 outline-none bg-purple-100 px-1.5" placeholder="Email Address">
            @error('email')
                <p class="text-red-400 font-bold my-1 text-sm">{{ $message }}</p>
            @enderror
            <input type="password" name="password" class="block w-full border-b-2 border-purple-900 mb-3 py-3 outline-none bg-purple-100 px-1.5" placeholder="Password">
            @error('password')
                <p class="text-red-400 font-bold my-1 text-sm">{{ $message }}</p>
            @enderror
            <div class="flex justify-between items-center mt-2">
                <div class="flex gap-x-2 items-center">
                    <input type="checkbox" name="remember_me" id="">
                    <p>Remember me</p>
                </div>
            </div>
            <button class="font-bold mt-3 bg-purple-500 text-white w-36 mx-auto py-2.5">Sign In</button>
        </form>
    </div>
</body>
</html>
