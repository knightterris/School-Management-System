<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Year;
use App\Models\Course;
use App\Models\MyClass;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class DirectController extends Controller
{
    //direct welcome page
    public function mainPage(){
        return view('welcome');
    }
    //direct login page 
    public function loginPage(){
        return view('auth.login');
    }
    //register page
    public function registerPage(){
        return view('auth.register');
    }

    //direct super admin home page
    public function superHomepage(){
        $teacherList = Auth::user()->where('role','admin')->get();
        $studentList = Auth::user()->where('role','user')->get();
        $projectList = Project::get();
        $bookList = Book::get();
        $classList = MyClass::get();
        $yearList = Year::get();
        $courseList = Course::get();
        $pendingList = User::where('status',0)->get();

        return view('superAdmin.superHomePage',compact('teacherList','studentList','projectList','bookList','classList','yearList','courseList','pendingList'));
    }
    //direct create book page
    public function createBookPage(){
        $category = Category::get();
        $book = Book::select('books.*','categories.name as category_name')
                    ->leftJoin('categories','books.category','categories.id')
                    ->get();
        return view('superAdmin.createBook',compact('category','book'));
    }
    //direct pending page
    public function pendingPage(){
        return view('pendingPage');
    }
    //direct reject page
    public function rejectPage(){
        return view('rejectPage');
    }
    //direct payment list page
    public function paymentListPage(){
        $data = User::where('role','admin')->get();
        return view('superAdmin.payment.paymentList',compact('data'));
    }
    //direct change payment page
    public function changePaymentPage($id){
        $data = User::where('id',$id)->first();
        return view('superAdmin.payment.changepayment',compact('data'));
    }
    //change payment
    public function changePayment($id,Request $request){
        $this->changePaymentValidation($request);
        $data = $this->getChangePaymentInfo($request);
        User::where('id',$id)->update($data);
        return redirect()->route('super#paymentListPage');
    }
    //private functions
    //payment change validation
    private function changePaymentValidation($request){
        Validator::make($request->all(),[
            'payment'=>'required'
        ])->validate();
    }
    //get data for change payment
    private function getChangePaymentInfo($request){
        return[
            'payment'=>$request->payment
        ];
    }
}
