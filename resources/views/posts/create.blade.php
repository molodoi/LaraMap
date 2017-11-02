@extends('layouts.main', [ 'title' => 'News'])

@section('content')
    <h2>Ajouter un nouvel article</h2>

    {!! Form::open(['url' => route('posts.store')]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title'); !!}
            {!! Form::text('title', null, ['class'=>'form-control']); !!}
        </div>
        <div class="form-group">
            {!! Form::label('slug', 'Slug'); !!}
            {!! Form::text('slug', null, ['class'=>'form-control']); !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id', 'Categorie'); !!}
            {!! Form::select('category_id', $categories, null,['class'=>'form-control']); !!}
        </div>
        <div class="form-group">
            {!! Form::label('tags_list[]', 'Tags'); !!}
            {!! Form::select('tags_list[]', $tags, null,['class'=>'form-control', 'multiple' => true ]); !!}
        </div>
        <div class="form-group">
            {!! Form::label('content', 'Content'); !!}
            {!! Form::textarea('content', null, ['class'=>'form-control']); !!}
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