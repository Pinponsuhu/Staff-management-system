@extends('layout.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll">
        @include('layout.nav')
        <div class="px-5 mt-4">
            <div class="bg-white py-8 px-10">
                <div>
                    <h1 class="text-2xl font-bold mb-2 text-purple-500">Subject: {{ $task->subject }}</h1>
                <p class="text-md mb-3">{{ $task->desc }}</p>
                <p class="text-gray-400">{{ $task->created_at }}</p>
                </div>
                <div class="text-md text-purple-500 flex gap-x-3">
                    @foreach ($files as $file)
                        <a href="/storage/tasks/{{ $file->file_name }}" download="true" class="underline">Download</a>
                    @endforeach
                </div>
                @if ($taskreply->count() == 0 && $task->status == 'unresolved')
                    <a href="/task/reply/{{ $task->id }}" class="bg-blue-500 block mt-3 w-28 text-center py-2 text-white">Reply</a>
                @endif
                <div class="mt-3">
                    @foreach ($taskreply as $reply)
                    <div class="border-b-2 py-4 border-gray-200">
                        <p class="text-md">{{ $reply->message }}</p>
                        @php
                            $files = \App\Models\TaskReplyFile::where(['task_reply_id' => $reply->id])->pluck('file_name');
                        @endphp
                        <div class="mt-2 flex gap-x-4">
                            @foreach ($files as $rep_f)
                            <a href="{{ '/storage/tasks/' . $rep_f }}" download="true" class="underline">Download</a>
                            @endforeach
                        </div>
                        @php
                            $name = \App\Models\User::where(['id' => $reply->from])->pluck('surname');
                            $name2 = \App\Models\User::where(['id' => $reply->from])->pluck('othernames');
                            // dd($name2);
                        @endphp
                        <p class="mt-0.5 text-sm text-purple-400">{{ $name[0]. ' '. $name2[0] }}</p>
                        <span class="text-sm">{{ $reply->created_at->diffForHumans() }}</span>
                    </div>
                @endforeach
                </div>
                @if ($taskreply->count() != 0 && $task->status == 'unresolved')
                    <a href="/task/reply/{{ $task->id }}" class="bg-blue-500 block mt-3 w-28 text-center py-2 text-white">Reply</a>
                @endif
            </div>
        </div>
    </main>
@endsection
