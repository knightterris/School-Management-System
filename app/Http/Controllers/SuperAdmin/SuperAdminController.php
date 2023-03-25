<?php

namespace App\Http\Controllers\SuperAdmin;

use Storage;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SuperAdminController extends Controller
{
    //direct create user page
    public function createUserPage(){
        $studentList = User::where('role','user')->paginate(6);
        $teacherList = User::where('role','admin')->paginate(6);
        $yearList = Year::get();

        return view('superAdmin.createUser',compact('studentList','teacherList','yearList'));
    }
    //create user
    public function createUser(Request $request){
        $this->userInfoValidation($request);
        $userData = $this->getUserInfo($request);
        User::create($userData);
        return back()->with(['createSuccess'=>'Create Success!']);

    }
    //direct super admiin profile page
    public function profilePage(){
        return view('superAdmin.profile.profilePage');
    }
    //direct edit profile page
    public function editProfilePage(){
        return view('superAdmin.profile.updateProfile');
    }
    //update account
    public function updateAccount($id,Request $request){
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
        return redirect()->route('super#profilePage');
    }
    //direct password Page
    public function passwordPage(){
        return view('superAdmin.profile.changePassword');
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
            return redirect()->route('super#profilePage')->with(['changedPassword'=>'Password has Changed.']);
        }else{
            return back()->with(['failPassword'=>'Passwords do not match with our credentials']);
        }
    }
    //direct user update page
    public function updateUserPage($id){
        $data = User::where('id',$id)->first();
        $yearList = Year::get();
        return view('superAdmin.updateUser',compact('data','yearList'));
    }
    //update user
    public function updateUser($id,Request $request){
        $this->updateUserValidation($request);
        $userData = $this->updateUserInfo($request);
        User::where('id',$id)->update($userData);
        return redirect()->route('super#createUserPage')->with(['updateSuccess'=>'User Account Updated.']);
    }
    //delete user
    public function deleteUser($id){
        User::where('id',$id)->delete();
        return back();
    }



    //private functions
    private function userInfoValidation($request){
        Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'role'=>'required',
            'nrcNum'=>'required',
            // 'year'=>'required',
            'password'=>'required|min:6|max:15',
            'password_confirmation'=>'required|min:6|max:15|same:password'
        ])->validate();
    }
    //get user info
    private function getUserInfo($request){
        return[
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'role'=>$request->role,
            'nrc'=>$request->nrcNum,
            'year'=>$request->year,
            'password'=>Hash::make($request['password']),
            'created_at'=>Carbon::now()
        ];
    }
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
    //update user validation
    private function updateuserValidation($request){
        Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'nrcNum'=>'required',
            'role'=>'required',
            // 'year'=>'required'
        ])->validate();
    }
    //get update user data
    private function updateUserInfo($request){
        return[
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'role'=>$request->role,
            'nrc'=>$request->nrcNum,
            'year'=>$request->year,
            'updated_at'=>Carbon::now()
        ];
    }
    //invoice validation
    private function invoiceValidation($request){
        Validator::make($request->all(),[
            'invoice'=>'required'
        ])->validate();
    }
    //get invoice data
    private function invoiceStatus($request){
        return[
            'invoice'=>$request->invoice
        ];
    }
}
