@extends('layouts.main', [ 'title' => 'News'])

@section('content')
<div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4">{{ ucfirst($post->title) }}</h1>
            <small>
                Posted on {{ $post->created_at }} in
                @if($post->category)
                    <a href="#">{{ $post->category->name }}</a>
                @endif
            </small>
            <br/>
            <br/>
            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
            <br/>
            <br/>
            <p>{{ $post->content }}</p>

            </div>
        </div>
@stop