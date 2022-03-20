<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff Management System</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/lasu.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="{{ asset('js/all.js') }}"></script>
    <script src="{{ asset('js/tableToExcel.js') }}"></script>
    <style>
        body{
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-purple-100 flex">
    <nav class="bg-purple-400 w-32 pt-4 h-screen">
        <img src="{{ asset('img/lasu.png') }}" class="h-12 w-12 block mx-auto" alt="">
        <ul class="mt-6">
            @if (auth()->user()->user_type != 'staff')
            <a href="/">
                <li class="flex flex-col mb-2 gap-y-1.5 p-3 hover:bg-purple-100 hover:text-purple-400 justify-center text-white items-center">
                    <i class="fa fa-chart-pie  fa-2x text-center"></i>
                    <p class="font-bold text-md">Dashboard</p>
                </li>
            </a>
            @endif
            @if (auth()->user()->user_type != 'staff')
            <a href="/staffs">
                <li class="flex flex-col mb-2 gap-y-1.5 p-3 hover:bg-purple-100 hover:text-purple-400 justify-center text-white items-center">
                    <i class="fa fa-users  fa-2x text-center"></i>
                    <p class="font-bold text-md">Staffs</p>
                </li>
            </a>
            @endif
            @if (auth()->user()->user_type != 'staff' && auth()->user()->is_admin == '1')
            <a href="/report">
                <li class="flex flex-col mb-2 gap-y-1.5 p-3 hover:bg-purple-100 hover:text-purple-400 justify-center text-white items-center">
                    <i class="fa fa-file-alt  fa-2x text-center"></i>
                    <p class="font-bold text-md">Report</p>
                </li>
            </a>
            @endif
            <a href="/task/{{ Crypt::encrypt('unresolved') }}">
                <li class="flex flex-col mb-2 gap-y-1.5 p-3 hover:bg-purple-100 hover:text-purple-400 justify-center text-white items-center">
                    <i class="fa fa-tasks  fa-2x text-center"></i>
                    <p class="font-bold text-md">Task</p>
                </li>
            </a>
            @if (auth()->user()->is_admin == 1)
            <a href="/new/admin">
                <li class="flex flex-col mb-2 gap-y-1.5 p-3 hover:bg-purple-100 hover:text-purple-400 justify-center text-white items-center">
                    <i class="fa fa-user  fa-2x text-center"></i>
                    <p class="font-bold text-md">Add Admin</p>
                </li>
            </a>
            @endif
        </ul>
    </nav>
    @yield('content')
</body>
</html>
