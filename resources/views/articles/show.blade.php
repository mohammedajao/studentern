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
        <!-- <div class="d-md-none text-center" style="clear: both">
          <span class="article-author-name" style=""><span class="m-0">@</span>{{$article->user->name}}</span>
          <img style="" class="article-user-image" src="https://abs.twimg.com/sticky/default_profile_images/default_profile_normal.png">  
        </div> -->
      </header>

      @auth
      <footer>
      </ul>
        <ul class="stats float-right" style="">
          <li style=""> 
            <a href="" onclick="event.preventDefault(); actOnArticle()"><span class="d-none">Like</span><i @if(count($liked) > 0) class="fas fa-heart like-button like-button-blue" @else class="fas fa-heart like-button" @endif data-article-id={{$article->id}} style=""></i></a>
            <span>{{count($likes)}}</span>
          </li>
        </ul>
      </footer>
      @endauth
    </div>
  </div>
</div>
@endsection