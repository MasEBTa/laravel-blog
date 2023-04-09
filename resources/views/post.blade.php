@extends('layouts.main2')
{{-- @dd($post) --}}

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <article class="mb-3 mt-3">
                    <h2>
                        {{ $post->title }}
                    </h2>
                    @if ($post->image)
                        <div style="max-height: 300px; overflow: hidden;">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
                        </div>
                    @else
                        <img src="http://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
                    @endif
                    <p>By : <a href="/blog?author={{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/blog?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
                    <p class="card-text"><small class="text-muted">Created on {{ $post->created_at->diffForHumans() }} || Last updated {{ $post->updated_at->diffForHumans() }}</small></p>
                    {!! $post->body !!}
                </article>
                <a href="/blog">Back To Blog</a>
            </div>
        </div>
    </div>
@endsection