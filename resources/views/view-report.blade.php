@extends('layout.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll">
        @include('layout.nav')
        <div class="px-5 mt-4">
            <div class="bg-white py-8 px-10">
                <div class="">
                    <h1 class="text-2xl font-bold mb-2">Task Report</h1>
                    <span id="button-excel" class="px-5  bg-blue-400 text-white font-bold py-2.5">Export Excel</span>
                    <div class="w-full px-8 mt-3 mx-auto ">
                        <table class="w-full" id="resultTable">
                            <thead>
                                <tr class="text-lg font-bold text-gray-800">
                                    <td class="py-2 border-b-4 border-gray-800">Subject</td>
                                    <td class="py-2 border-b-4 border-gray-800">Description</td>
                                    <td class="py-2 border-b-4 border-gray-800">Status</td>
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
                                    <td class="w-1/6 py-3 text-sm border-b-2 border-white bg-purple-100 font-medium text-ellipsis">{{ $task->status }}</td>
                                    <td class="w-1/6 py-3 text-sm border-b-2 border-white bg-purple-100 font-medium text-ellipsis">{{ $task->created_at }}</td>
                                    <td class="w-1/6 py-3 text-sm border-b-2 border-white bg-purple-100 font-medium text-ellipsis">{{ $task->deadline }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

            </div>
        </div>
    </main>

    <script>

let button = document.querySelector("#button-excel");

button.addEventListener("click", e => {
  let table = document.querySelector("#resultTable");
  TableToExcel.convert(table);
});
    </script>
@endsection
