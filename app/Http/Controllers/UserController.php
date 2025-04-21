<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DesignationModel;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    public function index(){
        $users = DB::table('users')
        ->leftJoin('designation', 'users.designation_id', '=', 'designation.id')
        ->select('users.*', 'designation.designation as designation_name')
        ->get();
        $data = [
            'users' => $users,
        ];
        return view('user.list',$data);
    }
    public function add(){
        $flag='add';
        $designations = DesignationModel::pluck('designation','id');
        $data = [
            'flag' => $flag,
            'designations' => $designations,
        ];
        return view('user.add',$data);
    }
    public function edit($id){
        $flag='edit';
        $designations = DesignationModel::pluck('designation','id');
        $user = User::find($id);
        $data = [
            'flag' => $flag,
            'designations' => $designations,
            'user' => $user,
        ];
        return view('user.add',$data);
    }
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }
    public function store(Request $request){
    
        $request->validate([
            'user_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'designation_id' => 'required',
        ]);
        $fields = __('master.users_fields');
        $flag = $request->flag;
        if($flag == 'edit'){
            $tblObj = User::find($request->id);
            $msg= "User updated successfully";
            
        }else{
            $tblObj = new User();
            $msg= "User added successfully";
        }
        foreach($fields as $field){
            if($request->has($field)){
                $tblObj->$field = $request->$field;
            }
        }
        $designation = DesignationModel::find($request->designation_id);
        $desig = Str::of($designation->designation)->lower()->replaceMatches('/[^a-z0-9]/', '');   
         
        if ($desig == 'admin') {
              $tblObj->type = 'a';
             } else {
           $tblObj->type = 'u';
             }
             $tblObj->status = 1;
          $tblObj->password = Hash::make($request->password);
        $tblObj->save();
        return redirect()->back()->with('success', $msg);

    }
}
