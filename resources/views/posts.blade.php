@extends('master')

@section('jumbotron')
<div class="d-flex justify-content-center mb-5">
    <form action="{{route('home')}}" method="GET" class="input-group" style="max-width: 600px; width: 100%;">
        
        <input 
            type="search" 
            name="s" 
            class="form-control rounded-start" 
            placeholder="Buscar posts..." 
            aria-label="Buscar posts"
            value="{{request()->input('s')}}"
        >
        <button class="btn btn-primary rounded-end" type="submit">
            <i class="fas fa-search"></i>
        </button>
    </form>
</div>
@endsection


@section('main')
<!--Section: Content-->
<section class="text-center ">
    <div class="container">
        <h4 class="mb-5"><strong>Posts</strong></h4>

        @forelse ($posts as $post)
            @if ($loop->first)
                <div class="row justify-content-center">
            @endif

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm h-100 border-0 rounded-3 overflow-hidden">
                    
                    <!-- Imagem -->
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="{{ $post->thumb }}" class="img-fluid w-100" alt="{{ $post->title }}">
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);"></div>
                        </a>
                    </div>

                    <!-- Conteúdo -->
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold text-truncate">
                            {{ $post->title }}
                        </h5>
                        <p class="card-text text-muted mb-4">
                            {{ Str::limit($post->content, 80, '...') }}
                        </p>
                        <p>Autor : {{$post->user->fullName}} - {{$post->comments->count()}} comentários</p>
                        <a href="{{ route('post', $post->slug)}}" class="btn btn-primary mt-auto">
                            Ler mais
                        </a>
                    </div>
                </div>
            </div>

            @if ($loop->last)
                </div> <!-- fecha row -->
            @endif
        @empty
            <div class="row">
                <div class="col-12 text-center py-5">
                    <h2 class="text-muted">Nenhum post encontrado</h2>
                </div>
            </div>
        @endforelse
    </div>
</section>
<!--Section: Content-->

<!-- Pagination -->
<div class="d-flex justify-content-center my-4">
    {{ $posts->links('pagination::bootstrap-5') }}
</div>

@endsection