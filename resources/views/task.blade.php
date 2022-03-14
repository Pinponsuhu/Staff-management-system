@extends('layout.app')
@section('content')
    <main class="w-full">
        @include('layout.nav')
        <div class="px-5 mt-4">
            <div class="bg-white py-8 px-10">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold mb-4">All Task</h1>
                    <a href="/add/task" class="py-2.5 px-6 bg-purple-500 text-white font-bold">Add Task</a>
                </div>
                @if (auth()->user()->user_type == 'staff')
                    <h1 class="text-lg font-bold mt-4">My Tasks</h1>
                    <div class="w-full px-8 mx-auto ">
                        <table class="w-full">
                            <thead>
                                <tr class="text-lg font-bold text-gray-800">
                                    <td class="py-2 border-b-4 border-gray-800">Subject</td>
                                    <td class="py-2 border-b-4 border-gray-800">Description</td>
                                    <td class="py-2 border-b-4 border-gray-800">Created On</td>
                                    <td class="py-2 border-b-4 border-gray-800">Deadline</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                <tr>
                                    <td class="w-1/6 py-3 text-sm border-b-2 border-white pl-1 bg-purple-100 font-medium">{{ $task->subject }}</td>
                                    <td class="w-2/6 py-3 text-sm border-b-2 border-white bg-purple-100 font-medium text-ellipsis">@if (strlen($task->desc) > 30)
                                            {{ Str::limit($task->desc,30) }}

                                            @else
                                            {{ $task->desc }}
                                    @endif</td>
                                    <td class="w-1/6 py-3 text-sm border-b-2 border-white bg-purple-100 font-medium text-ellipsis">{{ $task->created_at }}</td>
                                    <td class="w-1/6 py-3 text-sm border-b-2 border-white bg-purple-100 font-medium text-ellipsis">{{ $task->deadline }}</td>
                                    <td class="w-1/6 py-3 text-sm border-b-2 border-white bg-purple-100 font-medium text-ellipsis"><a href="/task/follow/up/{{ $task->id }}" class="py-2 px-6 bg-blue-500 text-white font-bold">Details</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else

                    <h1 class="text-lg font-bold mt-4">All Tasks</h1>
                    <div class="w-full px-8 mx-auto ">
                        <table class="w-full">
                            <thead>
                                <tr class="text-lg font-bold text-gray-800">
                                    <td class="py-2 border-b-4 border-gray-800">Subject</td>
                                    <td class="py-2 border-b-4 border-gray-800">Description</td>
                                    <td class="py-2 border-b-4 border-gray-800">Created On</td>
                                    <td class="py-2 border-b-4 border-gray-800">Deadline</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                <tr>
                                    <td class="w-1/6 py-3 text-sm border-b-2 border-white pl-1 bg-purple-100 font-medium">{{ $task->subject }}</td>
                                    <td class="w-2/6 py-3 text-sm border-b-2 border-white bg-purple-100 font-medium text-ellipsis">@if (strlen($task->desc) > 30)
                                            {{ Str::limit($task->desc,30) }}

                                            @else
                                            {{ $task->desc }}
                                    @endif</td>
                                    <td class="w-1/6 py-3 text-sm border-b-2 border-white bg-purple-100 font-medium text-ellipsis">{{ $task->created_at }}</td>
                                    <td class="w-1/6 py-3 text-sm border-b-2 border-white bg-purple-100 font-medium text-ellipsis">{{ $task->deadline }}</td>
                                    <td class="w-1/6 py-3 text-sm border-b-2 border-white bg-purple-100 font-medium text-ellipsis"><a href="/task/follow/up/{{ $task->id }}" class="py-2 px-6 bg-blue-500 text-white font-bold">Details</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                @endif

            </div>
        </div>
    </main>
@endsection
