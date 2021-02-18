<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;
use App\Models\User;
use App\Models\log;

class UserAuthController extends Controller
{
    function login() {
        return view('auth.login');
    }

    function reg() {
        return view('auth.reg');
    }

    function create(Request $request) {
        //Validation
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12'
        ]);
        //Store to database
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $query = $user->save();

        if($query) {
            return back()->with('success', 'You have been successfully registered!');
        } else {
            return back()->with('fail','Something went wrong');
        }
    }

    function check(Request $request) {
        //Validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);
        //Login
        $user = User::where('email','=', $request->email)->first();

        if($user) {
            if(Hash::check($request->password, $user->password)) {
                $request->session()->put('LoggedUser', $user->id);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Incorrect email or password');
            }
        } else {
            return back()->with('fail','No records found for this email!');
        }
    }

    function dashboard(log $log) {
        if(session()->has('LoggedUser')) {
            $data['logs']=$log::simplePaginate(2);
            return view('admin.dashboard', $data);
        }
    }
}
