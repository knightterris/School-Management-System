<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MyAttendanceController extends Controller
{
    //direct attendance list page
    public function attendanceList(){
        $studentAttendance = User::where('role','user')->where('status',1)->get();
        $teacherAttendance = User::where('role','admin')->where('status',1)->get();
        $allAttendance = User::where('status',1)->get();
        return view('superAdmin.attendance.index',compact('studentAttendance','teacherAttendance','allAttendance'));
    }
    //update attendance
    public function changeAttendance($id,Request $request){
        $this->attendanceValidation($request);
        $data = $this->attendanceData($request);
        User::where('id',$id)->update($data);
        return back()->with(['updateSuccess'=>'Changed Successfuly']);
    }
    //private functions
    //attendance validation
    private function attendanceValidation($request){
        Validator::make($request->all(),[
            'attendance'=>'required'
        ])->validate();
    }
    //get attendance data
    private function attendanceData($request){
        return[
            'attendance'=>$request->attendance
        ];
    }
}
