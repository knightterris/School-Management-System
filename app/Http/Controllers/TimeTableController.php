<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\TimeTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TimeTableController extends Controller
{
    //direct timetable page
    public function createTimetablePage(){
        $data = TimeTable::paginate(5);
        $yearList = Year::get();
        // dd($data);
        return view('superAdmin.myClass.createTimetable',compact('data','yearList'));
    }
    //create timetable
    public function creatTimeTable(Request $request){
        $this->timeTableValidation($request);
        $data = $this->timeTableData($request);
        TimeTable::create($data);
        return back()->with(['createSuccess'=>'TimeTable Created.']);
    }
    //delete all time table
    public function deleteAllTimeTable(){
        TimeTable::truncate();
        return back()->with(['deleteAllSuccess'=>'All Timetables were deleted.']);
    }
    //direct update timetable page
    public function updateTimetablePage($id){
        $data = TimeTable::where('id',$id)->first();
        $yearList = Year::get();
        return view('superAdmin.myClass.updateTimeTable',compact('data','yearList'));
    }
    //update time table
    public function updateTimeTable($id,Request $request){
        $this->timeTableValidation($request);
        $data = $this->timeTableData($request);
        TimeTable::where('id',$id)->update($data);
        return redirect()->route('super#timeTablePage')->with(['updateSuccess'=>'Timetable updated successfully']);
    }
    //delete timetable
    public function deleteTimetable($id){
        TimeTable::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'A timetable is deleted.']);
    }
    //private functions
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
}
