<?php

namespace App\Http\Controllers;

use App\Http\Requests\passwordRequest;
use App\Models\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetPasswordController extends Controller
{
    public function show(){
        return view('auth.confirmPassword',['data' => Auth::user()]);
    }

    public function update(Request $request , passwordRequest $validateReq){
        $validate = $validateReq->validated();

        if ($validate) {
            $data = User::find($request->user_id);
            $data->password = $request->password;
            $data['password'] = bcrypt($data['password']);
            $data->save();

            return redirect('/home');
        }
    }
}
