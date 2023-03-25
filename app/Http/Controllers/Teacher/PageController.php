<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Book;
use App\Models\User;
use App\Models\Year;
use App\Models\MyClass;
use App\Models\Project;
use App\Models\TimeTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    //direct teacher home page
    public function teacherHomePage(){
        $teacherList = User::where('role','admin')->where('status',1)->get();
        $studentList = User::where('role','user')->where('status',1)->get();
        $projectList = Project::get();
        $bookList    = Book::get();
        return view('teacher.home',compact('teacherList','studentList','projectList','bookList'));
    }
    //direct teacher profile page
    public function teacherProfile(){
        return view('teacher.profile.myProfile');
    }
    //direct update profile page
    public function updateProfilePage(){
        return view('teacher.profile.updateProfile');
    }
    //direct password page
    public function passwordPage(){
        return view('teacher.profile.changePassword');
    }
    //direct class list page
    public function classListPage(){
        $classList = MyClass::get();
        return view('teacher.class.classList',compact('classList'));
    }
    //direct timetable page
    public function timetablePage(){
        $yearList = Year::get();
        $data = TimeTable::get();
        return view('teacher.timetable.index',compact('yearList','data'));
    }
    //direct attendance page
    public function attendanceListPage(){
        $studentAttendance = User::where('role','user')->where('status',1)->get();
        return view('teacher.attendance.index',compact('studentAttendance'));
    }
    //direct project list page
    public function projectListPage(){
        $data = Project::get();
        return view('teacher.project.index',compact('data'));
    }
    //direct payment page
    public function paymentPage(){
        return view('teacher.payment.index');
    }
    //direct booklist page
    public function bookListPage(){
        $data = Book::select('books.*','categories.name as categoryName')
                     ->leftJoin('categories','categories.id','books.category')
                     ->get();
        return view('teacher.book.index',compact('data'));
    }
    //direct read book page
    public function readBook($id){
        $book = Book::where('id',$id)->first();
        return view('teacher.book.read',compact('book'));
    }
}
