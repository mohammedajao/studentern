@extends('layouts.layout')

@section('content')
  <div class="container">
    <div class="card article-card" style="">
      <header style="">
        <div class="title" style="">
          <h2 class="headline" style="">{{$article->title}}</h2>
          <p style="">{{$article->body}}</p>
        </div>
        <div class="meta" style="">
          <time itemprop="datePublished" class="published" datetime="{{$article->created_at}}" style=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ strftime("%B %d, %Y",strtotime($article->created_at)) }}</font></font></time>
          <div class="creator" style="">
            <a  href="/" style="">
              <span style="">@Mohammed_Ajao</span>
              <img style="" src="https://abs.twimg.com/sticky/default_profile_images/default_profile_normal.png">  
            </a>
          </div>
        </div>
      </header>
      <footer>
      </ul>
        <ul class="stats float-right" style="">
          <li style=""> 
            <i class="fas fa-heart like-button" style=""></i>
            <span>{{$article->likes}}</span>
          </li>
        </ul>
      </footer>
    </div>
  </div>
@endsection