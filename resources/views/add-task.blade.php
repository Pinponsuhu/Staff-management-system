@extends('layout.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll">
        @include('layout.nav')
        <div class="px-8 mt-4">
            <div class="bg-white py-8 px-10">
                <h1 class="text-2xl font-bold mb-4">Add New Task</h1>
                <div class="w-full mx-auto gap-x-2">
                    <form action="/add/task" enctype="multipart/form-data" method="post" class="w-5/12 grid grid-cols-2 gap-x-4 mx-auto mt-4 items-center">
                        @csrf
                        <div class="col-span-2 mb-3">
                            <label class="font-bold block mb-1">Subject</label>
                            <input type="text" placeholder="Enter Task Subject" name="subject" class="block w-full border-b-2 border-purple-900 py-3 outline-none bg-purple-100 px-1.5">
                            @error('subject')
                                <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-2 mb-3">
                            <label class="font-bold block mb-1">Description</label>
                            <textarea name="description" class="resize-none block w-full border-b-2 border-purple-900 py-3 outline-none bg-purple-100 px-1.5" placeholder="Enter Surname"></textarea>
                            @error('description')
                                <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="font-bold block mb-1">Assigned to</label>
                            <select name="assigned_to" class="block w-full border-b-2 border-purple-900 py-4 outline-none bg-purple-100 px-1.5" id="">
                                <option value="" disabled selected>-- Assign task --</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->surname .' '. $user->othernames }}</option>
                                @endforeach
                                <option value="all">All</option>
                            </select>
                            @error('assigned_to')
                                <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="font-bold block mb-1">Deadline</label>
                            <input type="date" name="deadline" class="block w-full border-b-2 border-purple-900 py-3 outline-none bg-purple-100 px-1.5">
                            @error('deadline')
                                <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 col-span-2">
                            <label class="font-bold block mb-1">Attach Files (optional)</label>
                            <input type="file" name="files[]" multiple class="block w-full border-b-2 border-purple-900 py-3 outline-none bg-purple-100 px-1.5">
                            @error('files')
                                <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <button class="px-8 py-3 bg-purple-400 text-white font-bold col-span-2 w-32 text-center">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
