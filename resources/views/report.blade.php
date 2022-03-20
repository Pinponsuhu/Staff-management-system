@extends('layout.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll">
        @include('layout.nav')
        <div class="px-2 md:px-5 mt-4">
            <div class="bg-white py-8 md:px-5 lg:px-10 px-3">
                <h1 class="text-2xl font-bold mb-4">Get Report</h1>
                <div class=" w-full mx-auto gap-x-2">
                    <form action="/generate/report" class="w-11/12 md:w-4/12 mx-auto" method="GET">
                        @csrf
                        <label class="font-bold block mb-1">From</label>
                        <input type="date" name="from" class="block px-1 outline-none w-full py-3 border-b-2 border-gray-500">
                        <label class="font-bold block my-1">To</label>
                        <input type="date" name="to" class="block px-1 outline-none w-full py-3 border-b-2 border-gray-500">
                        <button class="block w-32 text-center py-3 mt-3 bg-blue-500 text-white">Generate</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
