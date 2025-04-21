<?php

namespace App\Http\Controllers\Auth;
use App\Models\MenuRights;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Auth;
use Hash;
use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Redis;
use Session;
class LoginController extends BaseController
{
    public function index()
    {
        return view('auth.login');
    }

    public function login_post(Request $request)
    {
        $remember = $request->has('remember');
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password],$remember)) {

           $menu = MenuRights::where("designation_id",auth()->user()->designation_id)->pluck('menu_id')->toArray();
            Session::put('menu_rights',$menu);
            // Authentication passed
            return redirect()->route('task_list')->with('success', 'Login successfully..');
        }
        // Authentication failed
        return back()->withErrors([
            'error' => 'Email or password is wrong..',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function password()
    {
        $user_id = Auth::user()->id;
        $data=[
            'user_id' => $user_id,
        ];
      //  $post = User::find($id);
        //return view('auth.change_password', compact('post'));
        return view('auth.change_password',$data);
    }


    public function change_password(Request $request)
    {
        
         $request->validate([
      'confirm_pwd' => 'required'
         ]);
        $post = User::where('id', $request->user_id)->first();
        if (Hash::check($request->input('current_pwd'), $post->password)) {
            if (($request->input('new_pwd')) == ($request->input('confirm_pwd'))) {
                $post->password = Hash::Make($request->input('confirm_pwd'));

                $post->save();
              

                return back()->with("success", 'Your password is Change..');
            } else {
                return back()->with("error",'Your password is not match..' );
            }
        } else {
            return back()->withErrors([
                'error' => 'Current password is wrong..',
            ]);
        }
    }
    
}