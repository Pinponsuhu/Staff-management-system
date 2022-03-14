@extends('layout.app')
@section('content')
    <main class="w-full">
        @include('layout.nav')
        <div class="px-5 mt-4">
            <div class="bg-white py-8 px-10">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-bold">All Staffs</h1>
                    <a href="/new/staff" class="py-2 font-bold px-6 bg-purple-500 text-white">Add Staff</a>
                </div>
                <div class="w-full mx-auto gap-x-2">
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
                    <div class="mt-3">
                        {{ $staffs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
