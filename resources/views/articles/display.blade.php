@extends('layouts.layout')

@section('content')
<section class="articles">
    <section class="latest-news">
      <div class="header category__header">
        <h2 class="category__title">{{$category}}</h2>
      </div>
      <!-- Looping through 3 items max before making a new row -->
      @foreach($articles->chunk(3) as $items) 
        <div class="row">
          @foreach($items as $article)
            <div class="col-sm-4 ">
              <a href="/articles/{{$article->id}}" class="col-12 card">
                <div class="card-body">
                  <span class="label"><strong>{{ strftime("%b %d, %Y",strtotime($article->created_at)) }}</strong></span>
                  <h4>{{$article->title}}</h4>
                </div>
              </a>
            </div>
          @endforeach
        </div>
      @endforeach
      <div class="mb-5"></div>
      {{$articles->links()}}
    </section>
  </section>
@endsection