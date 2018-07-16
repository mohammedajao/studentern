<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Like;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(15);
        return view('articles.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $article = new Article;
        $article->title = $request->input('title');
        $article->body = $request->input('body');
        $article->user_id = auth()->user()->id;
        $article->save();

        return redirect('/articles')->with('success', 'Post successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $article = Article::find($id);
        $likes = Like::where(['likeable_type' => 'article', 'likeable_id' => $article->id])->get();
        $owned_like = Like::where(['likeable_type' => 'article', 'likeable_id' => $article->id, 'user_id' => auth()->user()->id])->get();
        // return auth()->user()->likes()->where(['likeable_type' => 'article', 'likeable_id' => $article->id, 'user_id' => auth()->user()->id])->get();
        // return Like::where(['likeable_type' => 'article', 'likeable_id' => $article->id])->get();
        return view('articles.show')->with(['article' => $article, 'likes' => $likes, 'liked' => $owned_like]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function display($category)
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(15);
        return view('articles.display')->with('category', $category)->with('articles', $articles);
    }

    public function likeArticle(Request $request)
    {
        // $article_id = $request['article_id'];
        // $article = Article::find($article_id);
        // $like_type = $request['like_type'];
        // if(!$article)
        // {
        //     return null;
        // }
        // $user = Auth::user();
        // $like = $user->likes()->where('article_id', $article_id)->first();
        // if($like){
        //     $current_status = $like->like_type;
        //     if($current_status != $like_type) {
        //         $like->like_type = $like_type;
        //         return null;
        //     }
        // } else {
        //     $like = new Like();
        // }
        // $like->like = $is_like;
        // $like->user_id = $user->id;
        // $like->likeable_id = $article_id;
        // $like->likeable_type = 'article';
        // $like->save();
        // return null;

        $action = $request->get('action');
        $article_id = $request['article_id'];
        $like_type = $request['like_type'];
        $article = Article::find($article_id);
        $like = $user->likes()->where('article_id', $article_id)->first();

        if(!$like) {
            $like = new Like();
        }
        
        switch($action) 
        {
            case 'like':
                Article::where('id', $article_id)->increment('likes');
                $like->like_type = $action;
                break;
            case 'unlike':
                Article::where('id', $article_id)->decrement('likes');
                $like->like_type = $action;
                break;
        }
        $like->likeable_id = $article_id;
        $like->likeable_type = 'article';
        $like->user_id = $user->id;
        $like->save();
        return '';
    }
}
