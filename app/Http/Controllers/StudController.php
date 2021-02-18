<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $province_list = DB::table('barangay_listing')
                                ->groupBy('province')
                                ->get();
        return view('register')->with('province_list', $province_list);
    }

    public function shs()
    {
        return view('shs');
    }

    public function jhs()
    {
        return view('jhs');
    }

    public function elem()
    {
        return view('elem');
    }

    public function col()
    {
        return view('col');
    }

    public function admin()
    {
        return view('admin');
    }

    public function clinic()
    {
        return view('clinic');
    }

    public function purchasing()
    {
        return view('po');
    }

    public function gso()
    {
        return view('gso');
    }

    public function main()
    {
        return view('maingate');
    }

    public function fetch(Request $request)
    {
        $select    = $request->get('select');
        $value     = $request->get('value');
        $dependent = $request->get('dependent');
        $data      = DB::table('barangay_listing')
                            ->where($select, $value)
                            ->groupBy($dependent)
                            ->get();
        $output    = '<option value="">Select '.ucfirst($dependent).'</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }
            echo $output;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logs(Request $request)
    {
        $typeOfUsr = $request->input('txtTypeOfUsr');
        $studNum   = $request->input('txtStudNum');
        $empNum    = $request->input('txtEmpNum');

        if($typeOfUsr == 'student') 
        {
            date_default_timezone_set('Asia/Manila');
            $date = Carbon::createFromFormat('F j, Y g:i:a', date('F j, Y g:i:a'));

            $student = DB::table('studs')->where('studNum', $studNum)->first();
            if ($student === null) 
            {
                return redirect()->back()->with('message','There is no record found!');
                } else {
                DB::table('logs')->insert([
                    'loc'        => request('txtLocation'),
                    'usersId'    => request('txtStudNum'),	
                    'temp'       => request('txtTemp'),
                    'created_at' => $date,
                    'updated_at' => $date,
                ]);
                    return redirect()->back()->with('message','Data was successfully saved!');
            }
        } else if($typeOfUsr == 'employee') {
            date_default_timezone_set('Asia/Manila');
            $date = Carbon::createFromFormat('F j, Y g:i:a', date('F j, Y g:i:a'));
            
            $employee = DB::table('emps')->where('empNum', $empNum)->first();
            if ($employee === null) {
                return redirect()->back()->with('message','There is no record found!');
             } else {
                DB::table('logs')->insert([
                    'loc'       => request('txtLocation'),
                    'usersId'   => request('txtEmpNum'),	
                    'temp'      => request('txtTemp'),
                    'created_at' => $date,
                    'updated_at' => $date,
                ]);
                    return redirect()->back()->with('message','Data was successfully saved!');
             }
        } else {
            return redirect()->back()->with('message','Something went wrong!');
        }
    }
    
    public function store(Request $request)
    {
        $studNum = $request->input('txtStudNum');
        $empNum = $request->input('txtEmpNum');
        $typeOfUsr = $request->input('txtTypeOfUsr');

        if($typeOfUsr == 'student') 
        {
            $student = DB::table('studs')->where('studNum', $studNum)->first();
            if($student === null) 
            {
                DB::table('studs')->insert([
                    'studNum'   => request('txtStudNum'),
                      'fname'   => request('txtFname'),	
                      'mname'   => request('txtMname'),
                      'lname'	=> request('txtLname'),
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
                ]);
                    return redirect()->back()->with('message','Data was successfully saved!');
            } else {
                return redirect()->back()->with('message','Your student number is already exist!');
            }
        } else if($typeOfUsr == 'employee') {
            $employee = DB::table('emps')->where('empNum', $empNum)->first();
            if($employee === null) {
                DB::table('emps')->insert([
                    'empNum' => request('txtEmpNum'),
                     'fname' => request('txtFname'),	
                     'mname' => request('txtMname'),
                     'lname' => request('txtLname'),
                     'xname' => request('txtXname'),
                    'gender' => request('txtGender'),
                       'dob' => request('txtDob'),
                  'province' => request('province'),
                      'city' => request('city'),
                      'brgy' => request('barangay'),
                  'frombrgy' => request('FrBrgyCovid'),
                      'temp' => request('tempUponEntry'),
                  'sanitize' => request('sanitizeUponEntry'),
                     'cough' => request('cough'),
                     'colds' => request('colds'),
                     'fever' => request('fever'),
                'sorethroat' => request('soreThroat'),	
                'diffbreath' => request('diffOfbreath'),
                 'travelhis' => request('travelHistory'),
             'travelhisdate' => request('txtDate'),
            'travelhisplace' => request('txtPlace'),	
              'closecontact' => request('contactToPatient'),
                     'email' => request('txtEmail'),
                 ]);
                     return redirect()->back()->with('message','Data was successfully saved!');
            } else {
                return redirect()->back()->with('message','Your employee number is already exist!');
            }
        } else {
            return redirect()->back()->with('message','Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
