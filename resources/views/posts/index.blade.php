@extends('layouts.main', [ 'title' => 'News'])

@section('content')

    	<h2>News</h2>
    	<hr>
        @foreach($posts as $post)
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            @if($post->category)
                <p><small>Categorie : <em>{{ $post->category->name }}</em></small></p>
            @endif
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
            {!! Form::open(['method' => 'delete', 'url' => route('posts.destroy', $post)]) !!}
                <button class="btn btn-danger">Delete</button>
            {!! Form::close() !!}
            <hr>
        @endforeach
        <a href="{{ route('posts.create') }}" class="btn btn-success btn-block btn-lg">Create Post</a>
@stop