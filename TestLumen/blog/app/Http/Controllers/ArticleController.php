<?php

namespace App\Http\Controllers;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
    public function showAllArticle(){
        return response()->json(Article::all());
    }

    public function showOneArticle($id){
        return response()->json(Article::find($id));
    }
    public function create(Request $request) {
        //validation
        $this->validate($request, [
            'title' => 'required',
            'description' =>'required'
        ]);
        // dd($this->validate($request, [
        //     'title' => 'required',
        //     'description' =>'required'
        // ]));

        $article = Article::create($request->all());
        
        return response()->json($article, 201); //201 là status khi làm việc với API
    }
    public function update($id, Request $request) {
        //validation
        $this->validate($request, [
            'title' => 'required',
            'description' =>'required'
        ]);

        //update record
        $article = Article::findOrFail($id);
        $article->update($request->all());

        Mail::send('email.email', [], function($message)
        {
            $message->to('huy96cpqnvn@gmail.com', 'A/C')->subject('Welcome!');
        });
        return response()->json($article, 200);
    }

    public function delete($id) {
        Article::findOrFail($id)->delete();
        return response('Delete successfully, 200');
    }
}
