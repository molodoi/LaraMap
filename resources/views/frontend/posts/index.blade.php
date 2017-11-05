@extends('layouts.main', [ 'title' => 'News'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1 class="my-4">News
                <small>Follow our actuality</small>
            </h1>
            <hr>

            @foreach($posts as $post)
            <div class="card mb-4">
                <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                <div class="card-body">
                    <h2><a href="{{ route('posts.show', $post->id) }}">{{ ucfirst($post->title) }}</a></h2>
                    <p>{{ str_limit($post->content, $limit = 140, $end = '...') }}</p>
                </div>
                <div class="card-footer text-muted">
                    Posted on {{ $post->created_at }} in
                    @if($post->category)
                        <a href="{{ route('categories.show', $post->category->id )  }}">{{ $post->category->name }}</a>
                    @endif
                </div>
            </div>
            @endforeach
            {{ $posts->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@stop