<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /* lesson 2

    public function index(){

        return 'index';
    }

    public function users($id=null){
        return 'users id= '.$id;
    }

    public  function welcome()
    {
        return view('welcome');
    }

    */

    // lesson 3

    public function index(){
        //return view('index')->with('Name','mehdi555');
       // return view('index')->withName('mehdi555')->withFamily('rezaie');
       // return view('index',['name'=>'mehdi555', 'family'=>'rezaie']);

        $name='mehdi555';
        $family='rezaie';
        $users=['user1','user2'];
        return view('index',compact('name','family','users'));
    }
}
