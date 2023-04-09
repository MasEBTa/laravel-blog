@extends('layouts.main2')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-registration">
          <h1 class="h3 mb-3 fw-normal mt-4">Please Register Here!!</h1>
          <form action="/register" method="post">
            @csrf
            <div class="form-floating">
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingName" name="name" placeholder="Your Name" value="{{ old('name') }}">
              <label for="floatingName">Your Name</label>
              @error('name')
                <div class="invalid-feedback mb-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="text" class="form-control @error('username') is-invalid @enderror" id="floatingUserName" name="username" value="{{ old('username') }}" placeholder="Your User Name">
              <label for="floatingUserName">User Name</label>
              @error('username')
                <div class="invalid-feedback mb-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingEmail" name="email" value="{{ old('email') }}" placeholder="name@example.com">
              <label for="floatingEmail">Email address</label>
              @error('email')
                <div class="invalid-feedback mb-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" name="password" placeholder="Password">
              <label for="floatingPassword">Password</label>
              @error('password')
                <div class="invalid-feedback mb-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
        
            <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
          </form>
          <small class="d-block text-center mt-2">Already registered? <a href="/login">Login here!</a></small>
        </main>
    </div>
</div>
@endsection