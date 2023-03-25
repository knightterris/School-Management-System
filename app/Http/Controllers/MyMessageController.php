<?php

namespace App\Http\Controllers;

use App\Models\MyMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MyMessageController extends Controller
{
    //create message
    public function createMessage(Request $request){
        $this->messageValidation($request);
        $data = $this->getMessageData($request);
        MyMessage::create($data);
        return back();
    }
    //direct message list page
    public function messageList(){
        $data = MyMessage::get();
        return view('superAdmin.message.messageList',compact('data'));
    }
    //direct read message page
    public function readMessage($id){
        $data = MyMessage::where('id',$id)->first();
        return view('superAdmin.message.readMessage',compact('data'));
    }
    //delete all messages
    public function deleteAllMessage(){
        MyMessage::truncate();
        return back();
    }
    //private functionns
    //message validation
    private function messageValidation($request){
        Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required'
        ])->validate();
    }
    //get message data
    private function getMessageData($request){
        return[
            'name'=>$request->name,
        'email'=>$request->email,
        'subject'=>$request->subject,
        'message'=>$request->message
        ];
    }
}
