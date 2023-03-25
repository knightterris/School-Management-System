<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    //direct project page
    public function projectPage(){
        $data = Project::get();
        return view('superAdmin.project.projectPage',compact('data'));
    }
    //create project
    public function createProject(Request $request){
        $this->projectValidation($request);
        $data = $this->getProjectData($request);
        // dd($data);
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
