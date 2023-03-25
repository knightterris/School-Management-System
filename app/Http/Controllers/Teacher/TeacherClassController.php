<?php

namespace App\Http\Controllers\Teacher;

use App\Models\User;
use App\Models\MyClass;
use App\Models\Project;
use App\Models\TimeTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TeacherClassController extends Controller
{
    //change class situation
    public function changeSituation($id,Request $request){
        $this->changeSituationValidation($request);
        $data = $this->getChangeSituationData($request);
        MyClass::where('id',$id)->update($data);
        return back();
    }
    //create timetable
    public function createTimetable(Request $request){
        $this->timeTableValidation($request);
        $data = $this->timeTableData($request);
        TimeTable::create($data);
        return back();
    }
     //delete all time table
    public function deleteAllTimeTable(){
        TimeTable::truncate();
        return back()->with(['deleteAllSuccess'=>'All Timetables were deleted.']);
    }
    //delete timetable
    public function deleteTimetable($id){
        TimeTable::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'A timetable is deleted.']);
    }
    //change attendance
    public function changeAttendance($id,Request $request){
        $this->attendanceValidation($request);
        $data = $this->attendanceData($request);
        User::where('id',$id)->update($data);
        return back();
    }
    //create project
    public function createProject(Request $request){
        $this->projectValidation($request);
        $data = $this->getProjectData($request);
        Project::create($data);
        return back()->with(['createSuccess'=>'Project Created.']);
    }
    //deleteallproject
    public function deleteAllProject(){
        Project::truncate();
        return back();
    }
    //delete project
    public function deleteProject($id){
        Project::where('id',$id)->delete();
        return back();
    }
    //private functions
    //change situation validation
    private function changeSituationValidation($request){
        Validator::make($request->all(),[
            'classSituation'=>'required'
        ])->validate();
    }
    //get situation data
    private function getChangeSituationData($request){
        return[
            'situation'=>$request->classSituation
        ];
    }
    //timetable validation
    private function timeTableValidation($request){
        Validator::make($request->all(),[
            'day'=>'required',
            'teacher'=>'required',
            'className'=>'required',
            'duration'=>'required',
            'year'=>'required'
        ])->validate();
    }
    //get time table data
    private function timeTableData($request){
        return[
            'day'=>$request->day,
            'teacher'=>$request->teacher,
            'class'=>$request->className,
            'time'=>$request->duration,
            'year'=>$request->year
        ];
    }
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
    //project validation
    private function projectvalidation($request){
        Validator::make($request->all(),[
            'groupName'=>'required',
            'projectName'=>'required',
            'memberCount'=>'required',
            'deadLine'=>'required',
            'task'=>'required'
        ])->validate();
    }
    //get data for project
    private function getProjectData($request){
        return[
            'group_name'=>$request->groupName,
            'project_name'=>$request->projectName,
            'group_member'=>$request->memberCount,
            'deadline'=>$request->deadLine,
            'task'=>$request->task
        ];
    }
}
