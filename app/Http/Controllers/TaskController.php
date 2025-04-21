<?php

namespace App\Http\Controllers;
use App\Models\TaskModel;
use App\Models\MenuRights;
use App\Models\User;
use App\Models\DesignationModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Helpers\ImageManager;
class TaskController extends Controller
{
    public function index(){
         $user= auth()->user();
         if ($user->type === 'a') {
            // Admin: show all tasks
            $post = TaskModel::get();
        } else {
            // Regular user: filter where their ID is inside assigned_to (stored as JSON array)
            $post = TaskModel::whereJsonContains('assigned_to', (string) $user->id)->latest()->get();
        }
        $data = [
            'post' => $post,
        ];
        return view('task.list',$data);
    }
    public function add(){
        $flag='add';
        $users = DB::table('users')
        ->leftJoin('designation', 'users.designation_id', '=', 'designation.id')
        ->select('users.*', 'designation.designation as designation_name')
        ->get();
        $data = [
            'flag' => $flag,
            'users' => $users,
        ];
        return view('task.add',$data);
    }
    public function edit($id){
        $flag='edit';
        $post= TaskModel::find($id);
        $users = DB::table('users')
        ->leftJoin('designation', 'users.designation_id', '=', 'designation.id')
        ->select('users.*', 'designation.designation as designation_name')
        ->get();
        $usersDB = json_decode($post->assigned_to ?? '[]');
        $data = [
            'flag' => $flag,
            'post' => $post,
            'users' => $users,
            'usersDB' => $usersDB,
        ];
        return view('task.add',$data);
    }
    public function delete($id){
        $post= TaskModel::find($id);
        if($post){
            $post->delete();
            return redirect()->back()->with('success', 'Task deleted successfully!');
        }
        return redirect()->back()->with('error', 'Task not found!');
    }
    public function store(Request $request)
    {
      //  dd($request->all());
        $request->validate([
            'title' => 'required|string|max:200',
            'assigned_to' => 'required|array',
            'priority' => 'required|integer',
            'deadline' => 'nullable|date',
            'status' => 'required|integer',
            'description' => 'nullable|string',
        ]);
        $fields= __('master.task_fields');
        $flag= $request->input('flag');
        if($flag=='edit'){
            $tableObj= TaskModel::find($request->id);
        }
        else{
            $tableObj= new TaskModel();
        }
        foreach($fields as $field){
            if($request->has($field)){
                $tableObj->$field = $request->input($field);
            }
        }
        $tableObj->assigned_to = json_encode($request->input('assigned_to'));
        $file = $request->file('attachments');
        if ($file) {
            $uploadPath = "task/";
            $extension = $file->getClientOriginalExtension();
            $name = rand() . "." . $extension;
            $fileName = ImageManager::upload($uploadPath, $name, $file);
            $tableObj->attachments = $fileName;
        }   
        $tableObj->save();
        $msg = $flag == 'edit' ? 'Task updated successfully!' : 'Task added successfully!';
        return redirect()->back()->with('success', $msg);   
    }
       public function view($id)
       {
       $flag='view';
        $post= TaskModel::find($id);
        $users = DB::table('users')
        ->leftJoin('designation', 'users.designation_id', '=', 'designation.id')
        ->select('users.*', 'designation.designation as designation_name')
        ->get();
        $usersDB = json_decode($post->assigned_to ?? '[]');
        $data = [
            'flag' => $flag,
            'post' => $post,
            'users' => $users,
            'usersDB' => $usersDB,
        ];
        return view('task.view',$data);
       }
}
