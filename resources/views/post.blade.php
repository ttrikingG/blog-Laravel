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

    <hr>
    <h4>Comentários</h4>

    {{-- mensagem de sucesso fora do loop --}}
    @if(session('delete_success'))
        <div class="alert alert-success">
            {{ session('delete_success') }}
        </div>
    @endif

    @forelse ($post->comments as $comment)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $comment->user->fullName }}</h5>
                <p class="card-text">{{ $comment->comment }}</p>
                <p class="card-text">
                    <small class="text-muted">{{ $comment->created_at->format('d/m/Y H:i') }}</small>
                    @if(auth()->check() && (auth()->user()->id === $comment->user_id || auth()->user()->is_admin))
                        <a href="{{ route('comment.destroy', $comment->id) }}">Deletar</a>
                    @endif
                </p>
            </div>
        </div>
    @empty
        <h4 class="text-primary">Esse post não possui nenhum comentário!!!</h4>
    @endforelse



    <hr>
      @if (auth()->check())

      @if(session('success_comment'))
          <div class="alert alert-success">{{ session('success_comment') }}</div>
      @endif
      @if(session('error_comment'))
          <div class="alert alert-danger">{{ session('error_comment') }}</div>
      @endif

    
      <h4>Adicionar Comentário</h4>
      <div class="mb-3"> 
        {{$errors->first('comment')}}
        <form action="{{route('comment', $post->id)}}" method="POST">
          @csrf
          <input type="hidden" name="post_id" value="{{$post->id}}">
          <div class="mb-3">
            <label for="comment" class="form-label">Comentário</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </div>
      @endif
  </div> 
@endsection
