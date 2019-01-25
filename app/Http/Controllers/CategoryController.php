<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories=Category::all();
        return view('category.index',compact('categories'));

    }
    public function store(Request $request){
        $category= new Category();
        $category->title=$request->title;
        $category->save();
        return back();


    }
    public function destroy($id){
        Category::find($id)->delete();
        return back();

    }
}
