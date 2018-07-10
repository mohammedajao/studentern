@extends('layouts.layout')

@section('content')
  <section class="articles">
    <a href="articles/create" class="btn btn-custom create-button">
      + Create Post
    </a>
    <section class="featured-news">
      <div class="header category__header">
        <h2 class="category__title">Featured News</h2>
        <a href="" class="category__link">View all</a>
      </div>

      <div class="row">
        @php 
          $featured_count = 0;
        @endphp
        @foreach($articles as $article)
          @if($article->featured == true)
            @php   
              $featured_count++;
            @endphp
            <div class="col-sm-4 ">
              <a href="articles/{{$article->id}}" class="col-12 card">
                <div class="card-body">
                  <span class="label"><strong>{{ strftime("%b %d, %Y",strtotime($article->created_at)) }}</strong></span>
                  <h4>{{$article->title}}</h4>
                </div>
              </a>
            </div>
          @endif
        @endforeach
        @if($featured_count == 0)
          <div class="col-sm-4">
            <p>No results found.</p>
          </div>
        @endif
      </div>
    </section>

    <section class="latest-news">
      <div class="header category__header">
        <h2 class="category__title">Latest News</h2>
        <a href="article/latest%20news" class="category__link">View all</a>
      </div>
      <!-- Looping through 3 items max before making a new row -->
      @foreach($articles->chunk(3) as $items) 
        <div class="row">
          @foreach($items as $article)
            <div class="col-sm-4 ">
              <a href="articles/{{$article->id}}" class="col-12 card">
                <div class="card-body">
                  <span class="label"><strong>{{ strftime("%b %d, %Y",strtotime($article->created_at)) }}</strong></span>
                  <h4>{{$article->title}}</h4>
                </div>
              </a>
            </div>
          @endforeach
        </div>
      @endforeach
    </section>
  </section>
@endsection