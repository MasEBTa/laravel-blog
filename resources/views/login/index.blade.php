@extends('layouts.main2')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-signin">
          @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
              <strong>Selamat!</strong> {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          <h1 class="h3 mb-3 fw-normal mt-4">Please sign in</h1>
          <form action="/login" method="post">
            @csrf
            <div class="form-floating">
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" name="email" placeholder="name@example.com" {{ (session()->has('success')) ? '' : 'autofocus' }} value="{{ old('email') }}" required>
              <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
              <input type="password" class="form-control @error('passwoed') is-invalid @enderror" id="floatingPassword" name="password" placeholder="Password" value="{{ old('passwoed') }}" required>
              <label for="floatingPassword">Password</label>
            </div>
            
            <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
            @if ($errors->any())
                <div class="alert alert-danger mt-2">
                  Email atau Password salah
                </div>
            @endif
          </form>
          <small class="d-block text-center mt-2">Not registered? <a href="/register">Register Now!</a></small>
        </main>
    </div>
</div>
@endsection