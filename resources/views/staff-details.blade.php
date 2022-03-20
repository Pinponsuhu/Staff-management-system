@extends('layout.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll">
        @include('layout.nav')
        <div class="px-2 md:px-5 mt-4">
            <div class="bg-white py-8 md:px-5 lg:px-10 px-3">
                <div class="flex justify-between md:flex-row flex-col mb-4 items-center">
                    <h1 class="text-2xl font-bold">Staff Details</h1>
                    <div class="flex  items-center gap-x-3">
                        <a href="/edit/staff/{{ Crypt::encrypt($staff->id) }}" class="py-2 px-5 bg-blue-500 font-bold text-white">Edit</a>
                        <a href="/delete/staff/{{ Crypt::encrypt($staff->id) }}" class="py-2 px-5 bg-red-500 font-bold text-white">Delete</a>
                        @if (auth()->user()->is_admin == '1')
                        <a href="/password/staff/{{ Crypt::encrypt($staff->id) }}" class="py-2 px-5 bg-green-500 font-bold text-white">Reset Password</a>
                        @endif
                    </div>
                </div>
                <div class="w-full mx-auto gap-x-4 flex md:flex-row flex-col items-start">
                    <div>
                        <img src="{{ asset('storage/staffs/' . $staff->picture) }}" class="w-40 h-auto block mb-3" alt="">
                        <a href="/change/picture/{{ Crypt::encrypt($staff->id) }}" class="font-bold py-3 px-6 bg-purple-400 text-white ">Change Picture</a>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <h1 class="text-2xl font-bold">{{ $staff->surname . ' ' . $staff->othernames }}</h1>
                        <p class="mt-2"><b>Staff ID:</b> {{ $staff->id_number }}</p>
                        <p class="mt-2 capitalize"><b>Department:</b> {{ $staff->department }}</p>
                        <p class="mt-2 capitalize"><b>Phone Number:</b> {{ $staff->phone_number }}</p>
                        <p class="mt-2 capitalize"><b>Email Address:</b> {{ $staff->email }}</p>
                        <p class="mt-2 capitalize"><b>Gender:</b> {{ $staff->gender }}</p>
                        <p class="mt-2 capitalize"><b>Date of Birth:</b> {{ $staff->date_of_birth }}</p>
                    </div>
                </div>
                <div>
                    <div class="mt-6 flex justify-between items-center">
                        <h1 class="text-2xl text-purple-400 font-bold">Qualifications</h1>
                        <span onclick="addQualifiaction()" class="py-2 px-5 font-bold cursor-pointer bg-purple-400 text-white">Add New</span>
                    </div>
                    <div class="mt-3 flex flex-col gap-y-4 px-8">
                        @foreach ($quals as $qual)
                        <div class="border-b-2 pb-2 flex justify-between items-center">
                            <div>
                                <h1 class="text-xl text-purple-400"><b class="text-gray-800">Type: </b>{{ $qual->type }}</h1>
                                <p class="text-md mt-0.5 text-gray-500"><b>From:</b> {{ $qual->start_date }}  <b>To: </b>{{ $qual->end_date }}</p>
                            </div>
                            <div class="flex gap-x-2 items-center">
                                <a href="/delete/qualification/{{ $qual->id }}" class=" py-2 px-5 bg-red-500 text-white font-bold">Delete</a>
                                <a href="{{ '/storage/qualifications/'. $qual->proof }}" target="_blank" class="px-5 py-2 bg-blue-400 text-white font-bold">Certification</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div id="addQual" class="fixed h-screen hidden w-screen bg-gray-800 bg-opacity-70">
        <div class="flex justify-end mt-4 mr-4">
            <i onclick="clsQualifiaction()" class="fa fa-times cursor-pointer fa-2x text-white"></i>
        </div>
        <form action="/add/qualification/{{ Crypt::encrypt($staff->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="w-80 md:w-96 mx-auto md:grid md:grid-cols-2 gap-x-4 bg-white mt:7 md:mt-14 px-6 py-8">
                <div class="md:col-span-2">
                    <label class="text-md font-bold block mb-0.5">Qualification Type:</label>
                    <input type="text" name="type" id="" class="shadow-md outline-none block w-full py-3 border-b-2 border-purple-500 px-1" placeholder="Qualification Type">
                </div>
                <div class="mt-2">
                    <label class="text-md font-bold block mb-0.5">Start Date:</label>
                    <input type="date" name="start_date" id="" class="shadow-md outline-none block w-full py-3 border-b-2 border-purple-500 px-1">
                </div>
                <div class="mt-2">
                    <label class="text-md font-bold block mb-0.5">End Date:</label>
                    <input type="date" name="end_date" id="" class="shadow-md outline-none block w-full py-3 border-b-2 border-purple-500 px-1">
                </div>
                <div class="md:col-span-2 mt-2">
                    <label class="text-md font-bold block mb-0.5">Proof:</label>
                    <input type="file" name="proof" id="" class="shadow-md outline-none block w-full py-3 border-b-2 border-purple-500 px-1">
                </div>
                <button class="block w-32 py-3 mt-3 text-center font-bold text-white bg-blue-500">Submit</button>
            </div>
        </form>
    </div>
    <script>
        function addQualifiaction(){
            document.getElementById('addQual').classList.remove('hidden');
        }
        function clsQualifiaction(){
            document.getElementById('addQual').classList.add('hidden');
        }
    </script>
@endsection
