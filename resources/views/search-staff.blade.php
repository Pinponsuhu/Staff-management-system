@extends('layout.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll">
        @include('layout.nav')
        <div class="px-2 md:px-5 mt-4">
            <div class="bg-white py-8 md:px-5 lg:px-10 px-3">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-bold">Search Staffs</h1>
                </div>
                    <form action="" method="get" action="/search/staff">
                        @csrf
                        <div class="flex w-11/12 md:w-8/12 mx-auto items-center">
                            <div class="p-2.5 bg-purple-500 border-b-2 border-purple-500 text-white">
                                <i class="fa fa-search  text-2xl"></i>
                            </div>
                            <input type="search" name="search" value="{{ $search }}" class="my-3 block w-full mx-auto outline-none px-1 py-3 border-b-2 bg-purple-100 border-purple-500" placeholder="Search By Surname or ID Number">
                    </div>
                    </form>
                    <div class="w-full mx-auto gap-x-2">
                       <div class="overflow-x-scroll">
                        <table class="w-11/12 mx-auto mt-4">
                            <thead>
                                <tr class="border-b-2 border-gray-800 pb-2">
                                    <td class="w-1/5 px-2 text-md font-bold py-1.5 uppercase text-purple-900">Surname</td>
                                    <td class="w-1/5 text-md font-bold py-1.5 uppercase text-purple-900">Othernames</td>
                                    <td class="w-1/5 text-md font-bold py-1.5 uppercase text-purple-900">Department</td>
                                    <td class="w-1/5 text-md font-bold py-1.5 uppercase text-purple-900">Phone Number</td>
                                    <td class="w-1/5 text-md font-bold py-1.5 uppercase text-purple-900">Email Address</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($staffs as $staff)
                                <tr class="border-b-2 border-white text-gray-800">
                                    <td class="w-1/6 px-2 text-md capitalize bg-purple-200 bg-opacity-70 py-3">{{ $staff->surname }}</td>
                                    <td class="w-1/6 text-md capitalize bg-purple-200 bg-opacity-70 py-3">{{ $staff->othernames }}</td>
                                    <td class="w-1/6 text-md capitalize bg-purple-200 bg-opacity-70 py-3">{{ $staff->department }}</td>
                                    <td class="w-1/6 text-md capitalize bg-purple-200 bg-opacity-70 py-3">{{ $staff->phone_number }}</td>
                                    <td class="w-1/6 text-md bg-purple-200 bg-opacity-70 py-3">{{ $staff->email }}</td>
                                    <td class="w-1/6 px-2 text-md  bg-purple-200 bg-opacity-70 py-3"><a href="/staff/details/{{ $staff->id_number }}" class="bg-blue-400 text-white px-5 py-2">Details</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                       </div>
                    </div>
            </div>
        </div>
    </main>
@endsection
