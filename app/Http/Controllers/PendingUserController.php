<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PendingUserController extends Controller
{
    //list page
    public function listPage(){
        $userList = User::where('status',0)->paginate(8);
        return view('superAdmin.myClass.pendingUser',compact('userList'));
    }
    //change status
    public function changeStatus($id,Request $request){
        $this->changeStatusValidation($request);
        $data = $this->changeStatusData($request);
        User::where('id',$id)->update($data);
        return redirect()->route('super#createUserPage')->with(['']);
    }
    //private functions
    //change status validation
    private function changeStatusValidation($request){
        Validator::make($request->all(),[
            'status'=>'required'
        ])->validate();
    }
    //get change status data
    private function changeStatusData($request){
        return[
            'status'=>$request->status
        ];
    }
}
