<div class="py-4 shadow-md flex items-center justify-between px-8 bg-white w-full">
    <h1 class="text-3xl text-purple-400 font-bold">Staff Management System</h1>
        <img src="{{ asset('storage/staffs/' . auth()->user()->picture) }}" onmouseover="mouse()" class="h-12 w-12 rounded-full shadow-md" alt="">
</div>
<div id="hov" onmouseout="mouseO()" onmouseover="mouseOn()" class="fixed top-16 hidden right-6 w-52 p-4 bg-white rounded-md shadow-md">
    <a href="/change/password/{{ auth()->user()->id }}" class="flex gap-x-2 py-3 border-b-2 items-center hover:bg-purple-100 text-gray-400 hover:rounded-md px-2"><i class="fa fa-lock text-purple-500"></i>Change password</a>
    <a href="#" class="flex gap-x-2 py-3 border-b-2 items-center hover:bg-purple-100 text-gray-400 hover:rounded-md px-2"><i class="fa fa-user text-purple-500"></i>Profile</a>
    <a href="/logout" class="flex gap-x-2 py-3 border-b-2 items-center hover:bg-purple-100 text-gray-400 hover:rounded-md px-2"><i class="fa fa-sign-out-alt text-purple-500"></i>Logout</a>
</div>
<script>
    function mouse(){
        document.getElementById('hov').classList.remove('hidden');
    }
    function mouseOn(){
        document.getElementById('hov').classList.remove('hidden');
    }
    function mouseO(){
        document.getElementById('hov').classList.add('hidden');
    }
</script>
