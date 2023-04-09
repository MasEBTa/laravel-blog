@extends('layouts.main2')

@section('container')
    <br>
    <h1>{{  $title }}</h1>

    <div class="container mb-3 mt-3">
      <div class="row">
        @foreach ($categories as $item)
        <div class="col-md-4">
          <a href="/blog?category={{ $item->slug }}">
            <div class="card bg-dark text-white">
              <img src="https://source.unsplash.com/500x400?{{ $item->name }}" class="card-img-top" alt="{{ $item->name }}">
              <div class="card-img-overlay d-flex align-items-center p-0">
                <h5 class="card-title flex-fill text-center p-3 text-decoration-none text-white" style="background-color: rgba(0, 0, 0, 0.7);">
                  {{ $item->name }}
                </h5>
              </div>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
    <a href="/blog">Back To Blog</a>
@endsection