@extends('master')

@section('jumbotron')
<div class="container text-center ">
  <h2>{{ $post->title }}</h2>
  <p>Autor : {{$post->user->fullName}} - {{$post->comments->count()}} comentários</p>
</div>
@endsection

@section('main')
<div class="container  d-flex justify-content-center">
  <div class="col-md-8">
    <p class="text-center">
      {{ $post->content }}
    </p>
  </div>
</div>  
@endsection
