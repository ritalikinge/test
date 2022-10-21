<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function submit_registration(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:5',
        ]);

        $input['password'] = md5($input['password']);
        $users = new User();
        $users->name = $input['name'];
        $users->email = $input['email'];
        $users->password = $input['password'];
        $users->save();
        return redirect()->back()->with('success', 'Account Created Successfully');
    }

    public function submit_login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $result = User::where('email', $request->email)->where('password', md5($request->password))->first();
        if ($result) {
            $sessArry = array();
                $sessArry = array(
                    'id' => $result->id,
                    'name' => $result->name,
                    'email' =>$result->email,
                    'is_superadmin'=>$result->is_superadmin
                );
                Session::put('logged_in',$sessArry);
            return redirect('all_product');
        } else {
            $request->session()->flash('error', 'Invalid Email or Password !');
            return back()->withInput($request->only('email'));
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }
}
