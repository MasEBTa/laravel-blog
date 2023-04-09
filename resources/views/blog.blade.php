@extends('layouts.main2')
{{-- @dd($posts) --}}

@section('container')
    <br>
    @if (isset($judul))
        <h4 class="mb-5">{{  $judul }}</h4>
    @endif

    {{-- pengecekan ada tidaknya postingan --}}
    @if ($posts->count()>0)
      <div class="card mb-3 text-center">
        @if ($posts[0]->image)
          <div style="max-height: 350px; overflow: hidden;" class="card-img-top">
            <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" class="img-fluid">
          </div>
        @else
          <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
        @endif
        <div class="card-body">
          <h5 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-dark text-decoration-none">{{ $posts[0]->title }}</a></h5>
          <p>By : <a href="/blog?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a> in <a href="/blog?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a> <span class="card-text"><small class="text-muted">Created on {{ $posts[0]->created_at->diffForHumans() }} || Last updated {{ $posts[0]->updated_at->diffForHumans() }}</small></span></p> <!--fitur dr library karbon untuk mengatur waktu dan sudah ada did alam laravel-->
          <p class="card-text">{{ $posts[0]->exerpt }}...</p>
          <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-primary">Read more</a>
        </div>
      </div>
    @else
        <p class="text-center fs-4">No post found</p>
    @endif
    {{-- postingan --}}
            
    <div class="container">
        <div class="row mb-2">
            @foreach ($posts->skip(1) as $item)
            <div class="col-md-4">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                  {{-- <div class="col p-4 d-flex flex-column position-static"> --}}
                    <a href="/blog?category={{ $item->category->slug }}"  class="text-decoration-none"><div class="bg-dark text-light text-center" style="display: block; margin:1px 0 1px 0; padding:1px 0 1px 0;">{{ $item->category->name }}</div></a>
                    @if ($item->image)
                      <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->category->name }}" class="card-img-top">
                    @else
                      <img src="https://source.unsplash.com/1200x400?{{ $item->category->name }}" class="card-img-top" alt="{{ $item->category->name }}">
                    @endif
                    <div class="card-body p-2">
                        <h5 class="card-title"><a href="/posts/{{ $item->slug }}" class="text-dark text-decoration-none">{{ $item->title }}</a></h5>
                        <p>By : <a href="/blog?author={{ $item->author->username }}">{{ $item->author->name }}</a><br /><span class="card-text"><small class="text-muted">Created on {{ $item->created_at->diffForHumans() }} || Last updated {{ $item->updated_at->diffForHumans() }}</small></span></p> <!--fitur dr library karbon untuk mengatur waktu dan sudah ada did alam laravel-->
                        <p class="card-text">{{ $item->exerpt }}...</p>
                        <a href="/posts/{{ $item->slug }}" class="btn btn-primary">Read more</a>
                    </div> 
                  {{-- </div> --}}
                </div>
            </div>
            @endforeach
        </div>
        <div>
            {{ $posts->links() }}
        </div>
    </div>
@endsection