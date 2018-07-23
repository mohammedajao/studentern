@extends('layouts.layout')

@section('content')
<div class="article-show-container container">
  <div class="article-show-container">
    <div class="card article-card" style="">
      <header style="">
        <div class="title" style="">
          <h2 class="headline" style="">{{$article->title}}</h2>
          <p style="">{!! $article->body !!}</p>
        </div>
        <div class="meta" style="">
          <time itemprop="datePublished" class="published" datetime="{{$article->created_at}}" style=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ strftime("%B %d, %Y",strtotime($article->created_at)) }}</font></font></time>
          <div class="creator" style="">
            <a  href="/" style="">
              <span class="article-author-name" style=""><span class="m-0">@</span>{{ str_replace(" ", "_", $article->user->name)}}</span>
              <img style="" src="https://abs.twimg.com/sticky/default_profile_images/default_profile_normal.png">
            </a>
          </div>
        </div>
      </header>
      {{Auth::user()->likes()->where(['like_type' => 'like', 'likeable_id' => $article->id])->first()}}
      <like-component article-id={{ $article->id }}
        likes={{ $article->likes()->where('like_type', 'like')->count() }}
        user-liked={{ $article->likes()->where(['user_id' => auth()->user()->id, 'like_type' => 'like'])->count() }}></like-component>
    </div>
  </div>
</div>
@endsection
