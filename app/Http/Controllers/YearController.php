<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class YearController extends Controller
{
    //direct year list page
    public function yearListPage(){
        $data = Year::paginate(4);
        return view('superAdmin.year.yearList',compact('data'));
    }
    //create year
    public function createYear(Request $request){
        $this->createYearValidation($request);
        $data = $this->getCreateYearData($request);
        Year::create($data);
        return back()->with(['createSuccess'=>'Created Successfully.']);
    }
    //delete year
    public function deleteYear($id){
        Year::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'Deleted Successfully.']);
    }
    //private functions
    //create year validation
    private function createYearValidation($request){
        Validator::make($request->all(),[
            'yearName'=>'required',
            'teacherCount'=>'required',
            'studentCount'=>'required',
            'duration'=>'required'
        ])->validate();
    }
    //get create data
    private function getCreateYearData($request){
        return[
            'name'=>$request->yearName,
            'teacher_count'=>$request->teacherCount,
            'student_count'=>$request->studentCount,
            'duration'=>$request->duration
        ];
    }
}
