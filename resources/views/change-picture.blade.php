@extends('layout.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll">
        @include('layout.nav')
        <div class="px-2 md:px-5 mt-4">
            <div class="bg-white py-8 md:px-10 px-3">
                <h1 class="text-xl md:text-2xl font-bold mb-4">Change Picture</h1>
                <div class="w-full mx-auto gap-x-2">
                    <form action="/change/picture/{{ Crypt::encrypt($id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="font-bold mb-1 block">New Picture</label>
                            <input type="file" name="picture" class="md:w-80 w-full py-3 border-b-2 block shadow-md border-purple-500 px-1" id="">
                        </div>
                        <button class="py-3 px-6 bg-blue-500 text-white font-bold">Change</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
