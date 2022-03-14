@extends('layout.app')
@section('content')
    <main class="w-full">
        @include('layout.nav')
        <div class="px-5 mt-4">
            <div class="bg-white py-8 px-10">
                <h1 class="text-2xl font-bold mb-4">Get Report</h1>
                <div class=" w-full mx-auto gap-x-2">
                    <form action="" class="w-4/12 mx-auto">
                        <input type="text" class="block px-1 outline-none w-full py-3 border-b-2 border-gray-500" placeholder="Search by ID number or Surname">
                        <button class="block w-32 text-center py-3 mt-3 bg-blue-500 text-white">Generate</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
