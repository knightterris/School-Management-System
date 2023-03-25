<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    //direct year list page
    public function courseListPage(){
        $data = Course::paginate(4);
        return view('superAdmin.course.courseList',compact('data'));
    }
    //create year
    public function createCourse(Request $request){
        $this->createCourseValidation($request);
        $data = $this->getCreateCourseData($request);
        Course::create($data);
        return back()->with(['createSuccess'=>'Created Successfully.']);
    }
    //delete year
    public function deleteCourse($id){
        Course::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'Deleted Successfully.']);
    }
    //private functions
    //create year validation
    private function createCourseValidation($request){
        Validator::make($request->all(),[
            'courseName'=>'required',
            'teacher'=>'required',
            'duration'=>'required'
        ])->validate();
    }
    //get create data
    private function getCreateCourseData($request){
        return[
            'course'=>$request->courseName,
            'teacher'=>$request->teacher,
            'duration'=>$request->duration
        ];
    }
}
