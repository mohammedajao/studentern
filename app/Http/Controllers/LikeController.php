<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Like;
use App\Events\NewLike;

class LikeController extends Controller
{
  public function store(Request $request)
  {
      $id = $request['id'];
      $article = Article::findOrFail($id);
      $user_id = $request->user()->id;
      $like = Like::where(['likeable_id' => $article->id, 'user_id' => $user_id])->first();
      $like_type = 'like';

      // check if article exists

      if(!$like) {
          $like = new Like([
              'user_id' => $user_id,
              'like_type' => 'like',
              'likeable_id' => $article->id,
              'likeable_type' => 'article'
          ]);
      } else {
          $like_type = $like->like_type;
          if($like->like_type == 'like') {
              $like->like_type = 'dislike';
          } else if($like->like_type == 'dislike') {
              $like->like_type = 'like';
          }
      }
      $like->save();

      // event(new NewLike($like));
      // redirect('/articles/'.$article->id);

      return ['like' => $like, 'articleLikes' => $article->likes()->count() ];
  }
}
