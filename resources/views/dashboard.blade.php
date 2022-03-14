@extends('layout.app')
@section('content')
    <main class="w-full">
        @include('layout.nav')
        <div class="px-5 mt-4">
            <div class="bg-white py-8 px-10">
                <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
                <div class="grid grid-cols-3 w-full mx-auto gap-x-2">
                    <div class="bg-emerald-400 text-white rounded-md w-9/12 bg-opacity-95 py-5 px-4 mx-auto">
                        <div class="flex justify-center bg-white text-emerald-500 items-center h-12 w-12 rounded-full">
                            <i class="fa fa-users text-2xl"></i>
                        </div>
                        <h1 class="text-xl font-bold mt-0.5">Total Staffs</h1>
                        <h1 class="text-3xl font-bold">{{ $staff }}</h1>
                    </div>
                    <div class="bg-rose-400 text-white rounded-md w-9/12 bg-opacity-95 py-5 px-4 mx-auto">
                        <div class="flex justify-center bg-white text-rose-600 items-center h-12 w-12 rounded-full">
                            <i class="fa fa-users text-2xl"></i>
                        </div>
                        <h1 class="text-xl font-bold mt-0.5">Unresolved Tasks</h1>
                        <h1 class="text-3xl font-bold">{{ $unresolved }}</h1>
                    </div>
                    <div class="bg-cyan-400 text-white rounded-md w-9/12 bg-opacity-95 py-5 px-4 mx-auto">
                        <div class="flex justify-center bg-white text-cyan-600 items-center h-12 w-12 rounded-full">
                            <i class="fa fa-users text-2xl"></i>
                        </div>
                        <h1 class="text-xl font-bold mt-0.5">Completed Tasks</h1>
                        <h1 class="text-3xl font-bold">{{ $resolved }}</h1>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mt-7 items-center">
                        <h1 class="text-2xl font-bold">Unresolved Task</h1>
                        <a href="#" class="py-2 font-bold px-6 bg-purple-500 text-white">View All</a>
                    </div>
                    <table class="w-11/12 mx-auto mt-4">
                        <thead>
                            <tr>
                                <td class="w-1/5 text-lg font-bold uppercase text-purple-900">Assigned to</td>
                                <td class="w-1/5 text-lg font-bold uppercase text-purple-900">Title</td>
                                <td class="w-1/5 text-lg font-bold uppercase text-purple-900">Created by</td>
                                <td class="w-1/5 text-lg font-bold uppercase text-purple-900">Created on</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b-2 border-white">
                                <td class="w-1/5 text-md capitalize px-3 bg-purple-200 py-3">Assigned to</td>
                                <td class="w-1/5 text-md capitalize px-3 bg-purple-200 py-3">Title</td>
                                <td class="w-1/5 text-md capitalize px-3 bg-purple-200 py-3">Created by</td>
                                <td class="w-1/5 text-md capitalize px-3 bg-purple-200 py-3">Created on</td>
                                <td class="w-1/5 text-md capitalize px-3 bg-purple-200 py-3"><a href="#" class="bg-purple-500 text-white px-5 py-2">Details</a></td>
                            </tr>
                            <tr class="border-b-2 border-white">
                                <td class="w-1/5 text-md capitalize px-3 bg-purple-200 py-3">Assigned to</td>
                                <td class="w-1/5 text-md capitalize px-3 bg-purple-200 py-3">Title</td>
                                <td class="w-1/5 text-md capitalize px-3 bg-purple-200 py-3">Created by</td>
                                <td class="w-1/5 text-md capitalize px-3 bg-purple-200 py-3">Created on</td>
                                <td class="w-1/5 text-md capitalize px-3 bg-purple-200 py-3"><a href="#" class="bg-purple-500 text-white px-5 py-2">Details</a></td>
                            </tr>
                            <tr class="border-b-2 border-white">
                                <td class="w-1/5 text-md capitalize px-3 bg-purple-200 py-3">Assigned to</td>
                                <td class="w-1/5 text-md capitalize px-3 bg-purple-200 py-3">Title</td>
                                <td class="w-1/5 text-md capitalize px-3 bg-purple-200 py-3">Created by</td>
                                <td class="w-1/5 text-md capitalize px-3 bg-purple-200 py-3">Created on</td>
                                <td class="w-1/5 text-md capitalize px-3 bg-purple-200 py-3"><a href="#" class="bg-purple-500 text-white px-5 py-2">Details</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
