<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified','set.password']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', ['data' => User::all()]);
    }
    public function myApplicants(){
        return view('myApplicants', ['user' => User::with(['applicants'])->where('id','=',Auth::user()->id)->get()]);
    }

    public function showApplicants(){
        return view('applicants', ['data' => Applicant::all()]);
    }

    public function store(Request $request)
 {
    if( $request->has('name') ) {
        foreach ($request->name as $id) {
            $data = Applicant::find($id);
            $data->status = 'on';
            $data->user_id = $request->user_id;
            $data->save();
        }
        return redirect()->back();
    }
  }


}
