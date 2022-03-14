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
    <div class="w-8/12 gap-x-3 items-center mx-auto bg-white px-14 mt-8 py-10">
        <img src="{{ asset('img/lasu.png') }}" class="h-16 w-auto" alt="">
        <h1 class="font-bold text-3xl text-purple-900 mt-4">Register Staff</h1>
        <p class="text-md font-medium text-gray-400">Add new Staff details</p>
        <form action="" method="post" class="mt-5 gap-x-4 grid grid-cols-2 w-full">
            <div class="mb-3">
                <input type="file" name="picture" class="block w-full border-b-2 border-purple-900 py-3 outline-none bg-purple-100 px-1.5" placeholder="">
                @error('picture')
                <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input type="text" name="surname" class="block w-full border-b-2 border-purple-900 py-3 outline-none bg-purple-100 px-1.5" placeholder="Surname">
                @error('surname')
                <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input type="text" name="othernames" class="block w-full border-b-2 border-purple-900 py-3 outline-none bg-purple-100 px-1.5" placeholder="Othernames">
                @error('othernames')
                <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input type="text" name="phone_number" class="block w-full border-b-2 border-purple-900 py-3 outline-none bg-purple-100 px-1.5" placeholder="phone_number">
                @error('phone_number')
                <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
           <div class="mb-3">
            <input type="email" name="email" class="block w-full border-b-2 border-purple-900 mb-3 py-3 outline-none bg-purple-100 px-1.5" placeholder="Email Address">
            @error('email')
                <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
                @enderror
           </div>
            <div class="mb-3">
                <select name="user_type"  class="block w-full border-b-2 border-purple-900 mb-3 py-3 outline-none bg-purple-100 px-1.5" id="">
                <option value="" disabled selected>-- Select User type --</option>
                <option value="staff">Staff</option>
                <option value="manager">Manager</option>
            </select>
            @error('user_type')
                <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="block w-full border-b-2 border-purple-900 py-3 outline-none bg-purple-100 px-1.5" placeholder="Password">
                @error('password')
                <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <input type="password" name="password_confirmation" class="block w-full border-b-2 border-purple-900 mb-3 py-3 outline-none bg-purple-100 px-1.5" placeholder="Confirm Password">
            <button class="font-bold mt-2 bg-purple-500 text-white w-36 col-span-2 py-2.5">Sign In</button>
        </form>
    </div>
</body>
</html>
