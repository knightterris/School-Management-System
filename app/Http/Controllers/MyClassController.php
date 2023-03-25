<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\MyClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MyClassController extends Controller
{
    //direct class create page
    public function createClassPage(){
        $classList = MyClass::paginate(6);
        $yearList = Year::get();
        return view('superAdmin.myClass.classCreatePage',compact('classList','yearList'));
    }
    //create class
    public function createClass(Request $request){
        $this->classValidationCheck($request);
        $data = $this->getClassData($request);
        MyClass::create($data);
        return back()->with(['createSuccess'=>'A Class is created.']);
    }
    //delete all classes
    public function deleteAllClasses(){
        MyClass::truncate();
        return back()->with(['deleteAllClasses'=>'All Classes were deleted']);
    }
    //delete class
    public function deleteClass($id){
        MyClass::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'A Class is Deleted.']);
    }
    //direct update class page
    public function updateClassPage($id){
        $data = MyClass::where('id',$id)->first();
        $yearList = Year::get();
        return view('superAdmin.myClass.updateClass',compact('data','yearList'));
    } 
    //update class
    public function updateClass($id,Request $request){
        $this->updateClassValidation($request);
        $data = $this->updateClassData($request);
        MyClass::where('id',$id)->update($data);
        return redirect()->route('super#createClassPage')->with(['updateSuccess'=>'Class is updated']);
    }
    //private functions
    //class validation
    private function classValidationCheck($request){
        Validator::make($request->all(),[
            'className'=>'required',
            'studentID'=>'required',
            'year'=>'required'
        ])->validate();
    }
    //get class data
    private function getClassData($request){
        return[
            'class_name'=>$request->className,
            'student_id'=>$request->studentID,
            'year'=>$request->year
        ];
    }
    //update class validation
    private function updateClassValidation($request){
        Validator::make($request->all(),[
            'className'=>'required',
            'studentID'=>'required',
            'status'=>'required',
            'year'=>'required'
        ])->validate();
    }
    //get update class data
    private function updateClassData($request){
        return[
            'class_name'=>$request->className,
            'student_id'=>$request->studentID,
            'status'=>$request->status,
            'year'=>$request->year
        ];
    }
}
