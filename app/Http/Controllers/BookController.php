<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    //create book
    public function createBook(Request $request){
        $this->createBookValidation($request);
        $data = $this->getBookData($request);
        $fileName = uniqid().$request->file('book')->getClientOriginalName();
        $request->file('book')->storeAs('public/books/',$fileName);
        $data['book'] = $fileName;
        Book::create($data);
        return back()->with(['bookCreate'=>'Book Created.']);

    }
    //delete book
    public function deleteBook($id){
        Book::where('id',$id)->delete();
        return back()->with(['deleteBook'=>'Book Deleted.']);
    }
    //delete all books
    public function deleteAllBook(){
        Book::truncate();
        return back()->with(['deleteAllBook'=>'Deleted all books.']);
    }
    //direct read book page
    public function readBook($id){
        $book = Book::where('id',$id)->first();
        return view('superAdmin.viewBook',compact('book'));
    }
    //private functions
    //create book validation
    private function createBookValidation($request){
        Validator::make($request->all(),[
            'name'=>'required',
            'authur'=>'required',
            'category'=>'required',
            'book'=>'required|mimes:doc,docx,xlsx,pdf'
        ])->validate();
    }
    //get book data
    private function getBookData($request){
        return[
            'name'=>$request->name,
            'authur'=>$request->authur,
            'category'=>$request->category,
        ];
    }
}
