<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    //direct about page
    public function aboutPage(){
        $student = User::where('role','user')->where('status',1)->get();
        $teacher = User::where('role','admin')->where('status',1)->get();
        $courseList = Course::get();
        return view('about',compact('student','teacher','courseList'));
    }
    //direct blog page
    public function blogPage(){
        return view('blog');
    }
    //direct scholarship
    public function scholarshipPage(){
        return view('scholarship');
    }
    //direct contact page
    public function contactPage(){
        return view('contact');
    }
}
