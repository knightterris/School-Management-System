<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //create category
    public function createCategory(Request $request){
        $this->categoryValidation($request);
        $data = $this->getCategoryData($request);
        Category::create($data);
        return back()->with(['createSuccess'=>'Category Created.']);
    }
    //delete category
    public function deleteCategory($id){
       Category::where('id',$id)->delete();
       return back()->with(['deleteSuccess'=>'Category Deleted.']);
    }
    //delete all categories
    public function deleteAllCategory(){
        Category::truncate();
        return back()->with(['deleteAll'=>'Deleted All Categories.']);
    }
    //private functions
    //category validation
    private function categoryValidation($request){
        Validator::make($request->all(),[
            'categoryName'=>'required'
        ])->validate();
    }
    //get category data
    private function getCategoryData($request){
        return[
            'name'=>$request->categoryName
        ];
    }
}
