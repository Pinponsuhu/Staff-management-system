@extends('layout.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll">
        @include('layout.nav')
        <div class="mt-3 px-4 md:px-8">
            <div class="p-3 md:p-6 bg-white rounded-md shadow-md">
                <h1 class="text-xl font-bold text-purple-400 mb-3">Reply Request: "{{ $task->subject }}"</h1>
                <form action="{{ '/task/reply/'.$task->id }}" class="w-11/12 md:w-7/12 mt-3" enctype="multipart/form-data" method="post">
                    @csrf
                    <label class="block font-bold mb-1 mt-2 text-md text-purple-800">Message *</label>
                    <textarea name="message" placeholder="Send Message" class="outline-none shadow-md w-full block resize-none py-3 px-3 border-l-4 rounded-md border-purple-400" id="" cols="30" rows="4">{{ old('content') }}</textarea>
                    <label class="block font-bold mb-1 mt-2 text-md text-purple-800">File Attachment <span class="font-medium">(Optional)</span></label>
                    <input type="file" name="files[]" multiple class="block text-purple-500 py-3 px-4 w-full shadow-md rounded-md border-l-4 border-purple-400" id="">
                    @if (auth()->user()->user_type == 'manager')
                        <select name="status" class="mt-2 block" id="">
                            <option value="" disabled selected>-- Set Task Status --</option>
                            <option value="resolved">Resolved</option>
                            <option value="unresolved">Unresolved</option>
                        </select>
                    @endif
                    <button class="block mt-2 w-32 text-center py-3 rounded-md text-white bg-purple-500">Submit</button>
                </form>
            </div>
        </div>
    </main>
@endsection
