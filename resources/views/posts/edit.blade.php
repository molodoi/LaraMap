@extends('layouts.main', [ 'title' => 'News'])

@section('content')
    <h2>Editer</h2>

    {!! Form::open(['method' => 'put', 'url' => route('posts.update', $post)]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title'); !!}
            {!! Form::text('title', $post->title, ['class'=>'form-control']); !!}
        </div>
        <div class="form-group">
            {!! Form::label('slug', 'Slug'); !!}
            {!! Form::text('slug', $post->slug, ['class'=>'form-control']); !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id', 'Categorie'); !!}
            {!! Form::select('category_id', $categories, $post->category_id ,['class'=>'form-control']); !!}
        </div>
        <div class="form-group">
            {!! Form::label('tags_list[]', 'Tags'); !!}
            {!! Form::select('tags_list[]', $tags, $post->tags->pluck('id'),['class'=>'form-control', 'multiple' => true ]); !!}
        </div>
        <div class="form-group">
            {!! Form::label('content', 'Content'); !!}
            {!! Form::textarea('content', $post->content, ['class'=>'form-control']); !!}
        </div>
        <div class="form-group">
            <label>
                {!! Form::checkbox('published', 1, $post->published); !!}
                En ligne
            </label>
        </div>

        <button class="btn btn-primary">Envoyer</button>
    {!! Form::close() !!}


@stop