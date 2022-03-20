<?php

namespace App\Http\Controllers;

use App\Models\Qualification;
use App\Models\Staff;
use App\Models\Task;
use App\Models\TaskFile;
use App\Models\TaskReply;
use App\Models\TaskReplyFile;
use App\Models\User;
use App\Rules\alpha_space;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class NavigateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if(auth()->user()->user_type == 'staff'){
             return redirect('/task/' . Crypt::encrypt('unresolved'));
        }
        $staffs = Staff::count();
        $unresolved = Task::where('status','unresolved')->count();
        $tasks = Task::latest()->where('status','unresolved')->limit(3)->get();
        // dd($tasks);
        $resolved = Task::where('status','resolved')->count();
        return view('dashboard',['staff' => $staffs,'unresolved' => $unresolved,'resolved' => $resolved,'tasks'=>$tasks]);
    }
    public function report(){
        if(auth()->user()->user_type == 'staff'){
             return redirect('/task/' . Crypt::encrypt('unresolved'));
        }
        return view('report');
    }
    public function staff(){
        if(auth()->user()->user_type == 'staff'){
             return redirect('/task/' . Crypt::encrypt('unresolved'));
        }
        $staffs = Staff::orderBy('surname', 'ASC')->paginate(15);
        // dd($staffs);
        return view('staffs',['staffs'=> $staffs]);
    }
    public function new_staff(){
        if(auth()->user()->user_type == 'staff'){
             return redirect('/task/' . Crypt::encrypt('unresolved'));
        }
        return view('add-staff');
    }
    public function store_staff(Request $request){
        // dd($request->all());
        $request->validate([
            'picture' => 'required|mimes:png,jpg,jpeg|max:1024',
            'surname' => 'required|alpha',
            'othernames' => ['required',new alpha_space],
            'id_number' => 'required|numeric',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'department' => 'required',
            'phone_number' => 'required|numeric|digits:11',
            'email' => 'required|email'
        ]);

        // dd($request->all());

        $staff = new Staff;
        $destination = 'public/staffs';

        $path = $request->file('picture')->store($destination);

        $staff->picture = str_replace('public/staffs/','',$path);
        $staff->surname = $request->surname;
        $staff->othernames = $request->othernames;
        $staff->id_number = $request->id_number;
        $staff->date_of_birth = $request->date_of_birth;
        $staff->gender = $request->gender;
        $staff->department = $request->department;
        $staff->phone_number = $request->phone_number;
        $staff->email = $request->email;
        $staff->save();

        $user = new User;

        $user->picture = str_replace('public/staffs/','',$path);
        $user->surname = $request->surname;
        $user->othernames = $request->othernames;
        $user->id_number = $request->id_number;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;
        $user->department = $request->department;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->is_admin = 0;
        $user->user_type = 'staff';
        $user->password = Hash::make('password1');
        $user->save();



        return redirect('/staffs');

    }

    public function staff_details($id){
        if(auth()->user()->user_type == 'staff'){
             return redirect('/task/' . Crypt::encrypt('unresolved'));
        }
        $staff = Staff::where('id_number',$id)->first();
        // dd($staff);
        $qual = Qualification::where('staff_id',$staff->id)->get();
        // dd($qual);
        return view('staff-details',['staff' => $staff,'quals' => $qual]);
    }

    public function add_qualification(Request $request){
        if(auth()->user()->user_type == 'staff'){
             return redirect('/task/' . Crypt::encrypt('unresolved'));
        }
        $request->validate([
            'type' => ['required',new alpha_space],
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'proof' => 'mimes:png,jpg,jpeg,pdf,docx,doc'
        ]);
        $destination = 'public/qualifications';

        $path = $request->file('proof')->store($destination);
        $qualification = new Qualification;
        // dd($path);
        $qualification->proof =  str_replace('public/qualifications/','',$path);
        $qualification->type = $request->type;
        $qualification->start_date = $request->start_date;
        $qualification->end_date = $request->end_date;
        $qualification->staff_id = $request->id;
        $qualification->save();

        return redirect()->back();
    }

    public function edit_staff($id){
        if(auth()->user()->user_type == 'staff'){
             return redirect('/task/' . Crypt::encrypt('unresolved'));
        }
        $staff = Staff::find(Crypt::decrypt($id));
        $genders = array('Male','Female');
        return view('edit-staff', ['staff' => $staff,'genders' => $genders]);
    }

    public function update_staff(Request $request){
        $request->validate([
            'surname' => 'required|alpha',
            'othernames' => ['required',new alpha_space],
            'id_number' => 'required|numeric',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'department' => 'required',
            'phone_number' => 'required|numeric|digits:11',
            'email' => 'required|email'
        ]);

        // dd($request->all());

        $staff = Staff::find(Crypt::decrypt($request->id));

        $staff->surname = $request->surname;
        $staff->othernames = $request->othernames;
        $staff->id_number = $request->id_number;
        $staff->date_of_birth = $request->date_of_birth;
        $staff->gender = $request->gender;
        $staff->department = $request->department;
        $staff->phone_number = $request->phone_number;
        $staff->email = $request->email;
        $staff->save();

        return redirect('/staffs');
    }

    public function edit_picture($id){
         $idd = Crypt::decrypt($id);
        // if(auth()->user()->user_type == 'staff'){
        //      return redirect('/task/' . Crypt::encrypt('unresolved'));
        // }
        return view('change-picture',['id' => $idd]);
    }

    public function update_picture(Request $request){
        if(auth()->user()->user_type == 'staff'){
             return redirect('/task/' . Crypt::encrypt('unresolved'));
        }
        $request->validate([
            'picture' => 'required|mimes:png,jpg,jpeg|max:1024'
        ]);
        $staff = Staff::find($request->id);
        $destination = 'storage/staffs/';
        $dest = 'public/staffs';

        $path = $request->file('picture')->store($dest);

        if(file_exists($destination.$staff->picture)){
            unlink($destination.$staff->picture);
            $staff->picture = str_replace('public/staffs/','',$path);
            $staff->save();
        }else{
            $staff->picture = str_replace('public/staffs/','',$path);
            $staff->save();
        }

        return redirect('/staffs');
    }

    public function delete_qualification($id){
        if(auth()->user()->user_type == 'staff'){
             return redirect('/task/' . Crypt::encrypt('unresolved'));
        }
        $qualification = Qualification::find($id);

        $qualification->delete();

        return redirect()->back();
    }

    public function delete_staff($id){
        if(auth()->user()->user_type == 'staff'){
             return redirect('/task/' . Crypt::encrypt('unresolved'));
        }
        $staff = Staff::find(Crypt::decrypt($id));

        $staff->delete();

        return redirect('/staffs');
    }

    public function task($task){
        if(auth()->user()->user_type !== 'staff'){
            $tasks = Task::latest()->where('status',Crypt::decrypt($task))->get();
        }else{
            $tasks = Task::latest()->where('status',Crypt::decrypt($task))->where('assigned_to',auth()->user()->id)->get();
        }
        return view('task',['tasks' => $tasks,'type' => Crypt::decrypt($task)]);
    }
    public function add_task(){
        if(auth()->user()->user_type == 'staff'){
             return redirect('/task/' . Crypt::encrypt('unresolved'));
        }
        $users = User::select('surname','othernames','id')->where('user_type','staff')->get();
        // dd($users);
        return view('add-task',['users' => $users]);
    }

    public function store_task(Request $request){

        $request->validate([
            'subject' => ['required',new alpha_space],
            'description' => 'required',
            'assigned_to' => 'required',
            'deadline' => 'required|date',
            'files.*' => 'mimes:png,jpeg,docx,doc,txt,pdf,xls,html,xlsx,ppt,pptx',
            'files' =>'required'
        ]);
        // dd($request->file('files'));

        $task = new Task;

        $users = User::where('user_type','staff')->get();

        $dest = 'public/tasks';

        if($request->assigned_to !== 'all'){
            $task->subject = $request->subject;
            $task->desc = $request->description;
            $task->assigned_to = $request->assigned_to;
            $task->deadline = $request->deadline;
            $task->created_by = auth()->user()->id;
            $task->status = 'unresolved';
            $task->save();

            foreach($request->file('files') as $file){
                $taskImg = new TaskFile;

                $path = $file->store($dest);
                $taskImg->file_name = str_replace('public/tasks/','',$path);
                $taskImg->task_id = $task->id;
                $taskImg->save();
            }
        }else{
                foreach($users as $user){
                    $task->subject = $request->subject;
                    $task->desc = $request->description;
                    $task->assigned_to = $user->id;
                    $task->deadline = $request->deadline;
                    $task->created_by = auth()->user()->id;
                    $task->status = 'unresolved';
                    $task->save();

                    foreach($request->file('files') as $attachment){
                        $taskImg = new TaskFile;

                        $path = $attachment->store($dest);
                        $taskImg->file_name = str_replace('public/tasks/','',$path);
                        $taskImg->task_id = $task->id;
                        $taskImg->save();
                }
                }
        }
         return redirect('/task/' . Crypt::encrypt('unresolved'));
    }

    public function follow_up($id){
        $task = Task::find($id);
        // // dd($task);
        $taskreply = TaskReply::where('task_id',$id)->get();
        // $reply_files = TaskReplyFile::where('task_id',$id)->get();
        // $user = User::select('surname','othernames')->where('id',$task->assigned_to)->first();
        // // dd($user);
        $files = TaskFile::where('task_id',$id)->get();
        // // dd($files);

        // return view('task-followup',['task'=> $task,,'user'=> $user]);
        return view('task-followup',['task'=> $task,'files'=> $files,'taskreply' => $taskreply]);
    }

    public function task_reply($id){
        $task = Task::find($id);

        return view('task-reply',['task'=> $task]);
    }

    public function store_reply(Request $request){

        $destination = 'public/task_replies';
        if(auth()->user()->user_type != 'staff'){
            $request->validate([
                'message' => 'required',
                'files.*' => 'mimes:png,jpeg,docx,doc,txt,pdf,xls,html,xlsx,ppt,pptx',
                'status' => 'required'
            ]);

            $task = Task::where('id',$request->id)->first();

            $reply = new TaskReply;
            $reply->message = $request->message;
            $reply->task_id = $request->id;
            $reply->from = auth()->user()->id;
            $reply->to = $task->assigned_to;
            $reply->save();

            $task->status = $request->status;
            $task->save();

            if($request->hasFile('files')){
                foreach($request->file('files') as $file){
                    $path = $file->store($destination);
                    $reply_files = new TaskReplyFile;

                    $reply_files->task_id = $request->id;
                    $reply_files->task_reply_id = $reply->id;
                    $reply_files->file_name = str_replace('public/task_replies/','',$path);
                    $reply_files->save();
                }
            }
            return redirect('/');
        }else{
            $request->validate([
                'message' => 'required',
                'files.*' => 'mimes:png,jpeg,docx,doc,txt,pdf,xls,html,xlsx,ppt,pptx'
            ]);

            $task = Task::where('id',$request->id)->first();

            $reply = new TaskReply;
            $reply->message = $request->message;
            $reply->task_id = $request->id;
            $reply->from = auth()->user()->id;
            $reply->to = $task->assigned_to;
            $reply->save();

            $task->status = 'unresolved';
            $task->save();

            if($request->hasFile('files')){
                foreach($request->file('files') as $file){
                    $path = $file->store($destination);
                    $reply_files = new TaskReplyFile;

                    $reply_files->task_id = $request->id;
                    $reply_files->task_reply_id = $reply->id;
                    $reply_files->file_name = str_replace('public/task_replies/','',$path);
                    $reply_files->save();
                }
            }
        }

         return redirect('/task/' . Crypt::encrypt('unresolved'));
    }

    public function logout(){
        auth()->logout();
        return redirect('/login');
    }

    public function show_password($id){
        return view('change-password',['id'=>Crypt::decrypt($id)]);
    }

    public function store_pasword(Request $request){
        $request->validate([
            'password' => 'required|confirmed'
        ]);

        $user = User::find(Crypt::decrypt($request->id));

        $user->password = Hash::make($request->password);
        $user->save();

        auth()->logout();

        return redirect('/login');
    }

    public function search_staff(Request $request){
        if(auth()->user()->is_admin == 'staff'){
             return redirect('/task/' . Crypt::encrypt('unresolved'));
        }
        $staffs = Staff::where('id_number',$request->search)->orWhere('surname',$request->search)->get();

        return view('search-staff',['staffs' => $staffs, 'search' => $request->search]);
    }

    public function new_admin(){
        if(auth()->user()->is_admin == 0){
            return redirect('/task/' . Crypt::encrypt('unresolved'));
        }
        return view('add-admin');
    }

    public function store_admin(Request $request){
            // dd($request->all());
            $request->validate([
                'picture' => 'required|mimes:png,jpg,jpeg|max:1024',
                'surname' => 'required|alpha',
                'othernames' => ['required',new alpha_space],
                'id_number' => 'required|numeric',
                'date_of_birth' => 'required|date',
                'gender' => 'required',
                'department' => 'required',
                'phone_number' => 'required|numeric|digits:11',
                'email' => 'required|email'
            ]);

            // dd($request->all());

            $staff = new Staff;
            $destination = 'public/staffs';

            $path = $request->file('picture')->store($destination);

            $staff->picture = str_replace('public/staffs/','',$path);
            $staff->surname = $request->surname;
            $staff->othernames = $request->othernames;
            $staff->id_number = $request->id_number;
            $staff->date_of_birth = $request->date_of_birth;
            $staff->gender = $request->gender;
            $staff->department = $request->department;
            $staff->phone_number = $request->phone_number;
            $staff->email = $request->email;
            $staff->save();

            $user = new User;

            $user->picture = str_replace('public/staffs/','',$path);
            $user->surname = $request->surname;
            $user->othernames = $request->othernames;
            $user->id_number = $request->id_number;
            $user->date_of_birth = $request->date_of_birth;
            $user->gender = $request->gender;
            $user->department = $request->department;
            $user->phone_number = $request->phone_number;
            $user->email = $request->email;
            $user->is_admin = 1;
            $user->user_type = 'admin';
            $user->password = Hash::make('password1');
            $user->save();



            return redirect('/staffs');

    }

    public function view_generate(Request $request){

        $request->validate([
            'from' => 'required|date',
            'to' => 'required|date'
        ]);

        $tasks = Task::whereBetween('created_at',[$request->from,$request->to])->orWhereBetween('created_at',[$request->to,$request->from])->get();

        return view('view-report',['tasks' => $tasks]);
    }

    public function view_profile(){
        $staff = User::where('id',auth()->user()->id)->first();
        $genders = array('Male','Female');
        return view('profile',['staff' => $staff,'genders'=> $genders]);
    }

    public function update_profile(Request $request){
        $request->validate([
            'surname' => 'required|alpha',
            'othernames' => ['required',new alpha_space],
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'department' => 'required',
            'phone_number' => 'required|numeric|digits:11',
            'email' => 'required|email'
        ]);

        // dd($request->all());

        $staff = Staff::find(auth()->user()->id);
// dd($staff);
        $staff->surname = $request->surname;
        $staff->othernames = $request->othernames;
        $staff->date_of_birth = $request->date_of_birth;
        $staff->gender = $request->gender;
        $staff->department = $request->department;
        $staff->phone_number = $request->phone_number;
        $staff->email = $request->email;
        $staff->save();

        $user = User::find(auth()->user()->id);
        $user->surname = $request->surname;
        $user->othernames = $request->othernames;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;
        $user->department = $request->department;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->save();
        if(auth()->user()->user_type == 'staff'){
            return redirect('/task');
        }
        return redirect('/');
    }
}
