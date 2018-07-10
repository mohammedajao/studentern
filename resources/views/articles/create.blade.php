@extends('layouts.layout')

@section('content')
  <section class="articles">
    <div class="form-area">
      <div class="header category__header">
        <h2 class="category__title">Create Article</h2>
      </div>
      {!! Form::open(['action' => 'ArticlesController@store', 'method' => 'POST']) !!}
        {{Form::text('title', '', ['placeholder' => 'Title'])}}
        {{Form::textarea('body', '', ['placeholder' => 'Write your article content here.'])}}
        {{Form::submit('Submit', ['class' => 'btn submit-button'])}}
      {!! Form::close() !!}
    </div>
  </section>
@endsection