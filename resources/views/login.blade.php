@extends('master')

@section('jumbotron')
<div class="container text-center">
  <h2>Login</h2>
</div>
@endsection

@section('main')
<div class="container d-flex justify-content-center">
  <div class="col-md-8">

    {{-- Mensagem de erro do Auth::attempt --}}
    @if(session()->has('errors_login'))
        <div class="alert alert-danger">
            {{ session('errors_login') }}
        </div>
    @endif

    @auth
        {{-- Usuário já está logado --}}
        <div class="alert alert-info text-center">
            Você já está logado como <strong>{{ Auth::user()->fullName }}</strong>!
        </div>
    @endauth

    @guest
        {{-- Form de login apenas para usuários não logados --}}
        <form action="{{ route('login.store') }}" method="POST">
          @csrf

          <input type="text" name="email" value="{{ old('email') }}" class="form-control mb-1" placeholder="Email">
          @error('email')
              <div class="text-danger small">{{ $message }}</div>
          @enderror

          <input type="password" name="password" class="form-control mb-1" placeholder="Password">
          @error('password')
              <div class="text-danger small">{{ $message }}</div>
          @enderror

          <button type="submit" class="btn btn-primary mt-2">Login</button>
        </form>
    @endguest

  </div>
</div><br>
@endsection

