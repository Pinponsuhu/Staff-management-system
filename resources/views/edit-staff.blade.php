@extends('layout.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll">
        @include('layout.nav')
        <div class="px-2 md:px-5 mt-4">
            <div class="bg-white py-8 md:px-5 lg:px-10 px-3">
                <h1 class="text-xl md:text-2xl font-bold mb-4">Edit Staff Details</h1>
                <div class="w-full mx-auto gap-x-2">
                    <form action="/edit/staff/{{ Crypt::encrypt($staff->id) }}" enctype="multipart/form-data" method="post" class=" w-11/12 md:w-8/12 grid md:grid-cols-2 gap-x-4 mx-auto mt-4 items-center">
                        @csrf
                        <div class=" mb-3">
                            <label class="font-bold block mb-1">Surname</label>
                            <input type="text" value="{{ $staff->surname }}" name="surname" class="block w-full border-b-2 border-purple-900 py-3 outline-none bg-purple-100 px-1.5" placeholder="Enter Surname">
                            @error('surname')
                                <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="font-bold block mb-1">Othernames</label>
                            <input type="text" value="{{ $staff->othernames }}" name="othernames" class="block w-full border-b-2 border-purple-900 py-3 outline-none bg-purple-100 px-1.5" placeholder="Enter Othernames">
                            @error('othernames')
                                <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="font-bold block mb-1">ID Number</label>
                            <input type="text" value="{{ $staff->id_number }}" name="id_number" class="block w-full border-b-2 border-purple-900 py-3 outline-none bg-purple-100 px-1.5" placeholder="Enter ID number">
                            @error('id_number')
                                <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="font-bold block mb-1">Date of birth</label>
                            <input type="date" value="{{ $staff->date_of_birth }}" name="date_of_birth" class="block w-full border-b-2 border-purple-900 py-3 outline-none bg-purple-100 px-1.5">
                            @error('date_of_birth')
                                <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="font-bold block mb-1">Gender</label>
                            <select name="gender" class="block w-full border-b-2 border-purple-900 py-3 outline-none bg-purple-100 px-1.5" id="">
                                <option value="{{ $staff->gender }}" selected>{{ $staff->gender }}</option>
                                @foreach ($genders as $gender)
                                    @if ($gender != $staff->gender)
                                    <option value="{{ $gender }}">{{ $gender }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('gender')
                                <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="font-bold block mb-1">Department</label>
                            <input type="text" value="{{ $staff->department }}" name="department" class="block w-full border-b-2 border-purple-900 py-3 outline-none bg-purple-100 px-1.5" placeholder="Department">
                            @error('department')
                                <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="font-bold block mb-1">Phone Number</label>
                            <input type="text" value="{{ $staff->phone_number }}" name="phone_number" class="block w-full border-b-2 border-purple-900 py-3 outline-none bg-purple-100 px-1.5" placeholder="Phone Number">
                            @error('phone_number')
                                <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="font-bold block mb-1">Email Address</label>
                            <input type="email" value="{{ $staff->email }}" name="email" class="block w-full border-b-2 border-purple-900 py-3 outline-none bg-purple-100 px-1.5" placeholder="Email Address">
                            @error('email')
                                <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <button class="px-8 py-3 bg-purple-400 text-white font-bold md:col-span-2 w-32 text-center">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
