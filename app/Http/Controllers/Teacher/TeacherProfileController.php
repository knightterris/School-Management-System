<?php

namespace App\Http\Controllers\Teacher;

use Storage;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TeacherProfileController extends Controller
{
    //update account
    public function updateProfile($id,Request $request){
        $this->updateAccountValidation($request);
        $data = $this->getUpdateProfileData($request);

        if($request->hasFile('image')){
            $oldData = User::where('id',$id)->first();
            $dbImage = $oldData->image;
            if($dbImage != null){
                Storage::delete('public/'.$dbImage);
            }
            $fileName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/',$fileName);
            $data['image'] = $fileName;
        }
        User::where('id',$id)->update($data);
        return redirect()->route('teacher#profilePage');
    }
     //change password
    public function changePassword(Request $request){
        $this->passwordValidationCheck($request);
        $currentID = Auth::user()->id;
        $userData = User::where('id',$currentID)->first();
        $oldHashedPassword = $userData->password;
        if(Hash::check($request->oldPassword, $oldHashedPassword)){
            $password = ['password'=>Hash::make($request->newPassword)];
            User::where('id',Auth::user()->id)->update($password);
            return redirect()->route('teacher#profilePage')->with(['changedPassword'=>'Password has Changed.']);
        }else{
            return back()->with(['failPassword'=>'Passwords do not match with our credentials']);
        }
    }
    //private functions
    //validation for update account
    private function updateAccountValidation($request){
        Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'nrc'=>'required',
        ])->validate();
    }
     //get updateProfileData
    private function getUpdateProfileData($request){
        return[
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'nrc'=>$request->nrc,
        ];
    }
    //password validation check
    private function passwordValidationCheck($request){
        Validator::make($request->all(),[
            'oldPassword'=>'required',
            'newPassword'=>'required|min:6|max:15',
            'confirmPassword'=>'required|min:6|max:15|same:newPassword'
        ])->validate();
    }
}
