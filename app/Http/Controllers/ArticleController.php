<?php

namespace App\Http\Controllers;



use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    //

    public function index(Request $request){

       // $articles=DB::table('articles')->get();


        $articles=Article::orderby('id','desc');
        if($request->q)
        {
            $articles=$articles->where('title','LIKE','%'.$request->q.'%');
        }
        $articles=$articles->paginate(2)->appends('q',$request->q);

        //dd($articles);
        //$articles=Article::simplePaginate(2);

        return view('article.index',compact('articles'));

    }
    public function show($id){
        //$article=DB::table('articles')->find($id);
        $article=Article::find($id);
        return view('article.show',compact('article'));

    }
    public function create(){
        $categories=Category::all();
        return view('article.create',compact('categories'));

    }
    public function store( Request $request){

        /*
        $title=$request->title;
        $body=$request->body;
        $source=$request->source;
        DB::table('articles')->insert([
            'title'=>$title,
            'body'=>$body,
            'source'=>$source
        ]);
        */

       // dd($request->all()); // show send form
       // dd($request->file('image')->move(public_path(),'test.jpg'));
        $article=new Article();
        $article->title=$request->title;
        $article->body=$request->body;
        $article->source=$request->source;

        $article->save();

        $name='article-'.$article->id.'.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('images'),$name);
        $article->image=$name;
        $article->save();
        $article->categories()->sync($request->categories);


        return back();

    }
    public function edit($id){

       // $article=DB::table('articles')->find($id);
        $article=Article::find($id);
        $categories=Category::all();
        return view('article.edit',compact('article','categories'));

    }
    public function update(Request $request,$id){

//        $title=$request->title;
//        $body=$request->body;
//        $source=$request->source;
//        DB::table('articles')->where('id',$id)->update([
//            'title'=>$title,
//            'body'=>$body,
//            'source'=>$source
//        ]);

        $article=Article::find($id);
        $article->title=$request->title;
        $article->body=$request->body;
        $article->source=$request->source;

        $article->save();
        $name='article-'.$article->id.'.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('images'),$name);
        $article->image=$name;
        $article->save();

        $article->categories()->sync($request->categories);

        return redirect('/article');

    }
    public function destroy($id){
        DB::table('articles')->where('id',$id)->delete();
        return back();

    }

    //lesson 15

    public function storeComment(Request $request,$articleId)
    {
       $article=Article::find($articleId);
       $article->comments()->create([
           'author'=>$request->author,
           'body'=>$request->body

       ]);
       $article->save();
       return back();
    }
}
