<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;
use App\Models\User;
use App\Models\log;
use App\Models\Visitors;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            $data['logs']=$log::simplePaginate(10);
            return view('admin.dashboard', $data);
        }
    }

    function logout() {
        if(session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('enPH920PH920');
        }
    }

    function dashboardv(Visitors $visitor) {
        if(session()->has('LoggedUser')) {
            $data['visitors']=$visitor::simplePaginate(1);
            return view('admin.dashboardv', $data);
        }
    }

    function visitors() {
        $province_list = DB::table('barangay_listing')
                                ->groupBy('province')
                                ->get();
        return view('visitors')->with('province_list', $province_list);
    }

    function RegVist() {
        date_default_timezone_set('Asia/Manila');
        $date = Carbon::createFromFormat('F j, Y g:i:a', date('F j, Y g:i:a'));
        DB::table('visitors')->insert([
                'loc'   => request('txtLocation'),
            'vistNum'   => request('txtVistNum'),
              'fname'   => request('txtFname'),	
              'mname'   => request('txtMname'),
              'lname'	=> request('txtLname'),
            'contact'   => request('txtContact'),
              'xname'	=> request('txtXname'),
             'gender'	=> request('txtGender'),
                'dob'	=> request('txtDob'),
           'province'	=> request('province'),
               'city'	=> request('city'),
               'brgy'	=> request('barangay'),
           'frombrgy'	=> request('FrBrgyCovid'),
               'temp'	=> request('tempUponEntry'),
           'sanitize'	=> request('sanitizeUponEntry'),
              'cough'	=> request('cough'),
              'colds'	=> request('colds'),
              'fever'	=> request('fever'),
         'sorethroat'   => request('soreThroat'),	
         'diffbreath'   => request('diffOfbreath'),
          'travelhis'	=> request('travelHistory'),
      'travelhisdate'	=> request('txtDate'),
     'travelhisplace'   => request('txtPlace'),	
       'closecontact'	=> request('contactToPatient'),
              'email'   => request('txtEmail'),
        'created_at'    => $date,
        'updated_at'    => $date,
        ]);
            return redirect()->back()->with('message','Data was successfully saved!');
    }
    public function search(Request $request)
    {

        $search = $request->get('search');
        $visitor = DB::table('visitors')
            ->where('vistNum','like','%'.$search.'%')
            ->orWhere('fname', 'like', '%'.$search.'%')
            ->orWhere('mname', 'like', '%'.$search.'%')
            ->orWhere('lname', 'like', '%'.$search.'%')
            ->orWhere('created_at', 'like', '%'.$search.'%')
            ->paginate(5);
        return view('admin.dashboardv', ['visitors'=> $visitor]);

    }
}
