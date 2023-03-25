<?php

namespace App\Http\Controllers\Student;

use Storage;
use App\Models\Book;
use App\Models\User;
use App\Models\MyClass;
use App\Models\Project;
use App\Models\TimeTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentPageController extends Controller
{
    //direct student home page
    public function studentHomePage(){
        $bookList = Book::get();
        $classList = MyClass::get();
        $projectList = Project::get();
        return view('student.home',compact('bookList','classList','projectList'));
    }
    //direct booklist page
    public function bookListPage(){
        $data = Book::select('books.*','categories.name as categoryName')
                      ->leftJoin('categories','categories.id','books.category')
                      ->get();
        return view('student.bookList',compact('data'));
    }
    //direct read book page
    public function readBookPage($id){
        $book = Book::where('id',$id)->first();
        return view('student.read',compact('book'));
    }
    //direct teacher profile page
    public function profilePage(){
        return view('student.profile');
    }
    //direct update profile page
    public function editProfilePage(){
        return view('student.editProfilePage');
    }
    //direct project list page
    public function projectListPage(){
        $data = Project::get();
        return view('student.project',compact('data'));
    }
    //direct class list page
    public function classListPage(){
        $classList = MyClass::get();
        return view('student.classList',compact('classList'));
    }
    //direct timetable page
    public function timetablePage(){
        $data = TimeTable::get();
        return view('student.timetable',compact('data'));
    }
    //update account
    public function updateStudentProfile($id,Request $request){
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
        return redirect()->route('student#profilePage');
    }
    //direct password page
    public function changePasswordPage(){
        return view('student.password');
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
            return redirect()->route('student#profilePage')->with(['changedPassword'=>'Password has Changed.']);
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
