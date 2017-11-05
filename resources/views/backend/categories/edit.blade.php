@extends('layouts.app', [ 'title' => 'Tags'])

@section('content')
    <div class="container">
        <div class="row">
            <h2>Editer</h2>
            {!! Form::open(['method' => 'put', 'url' => route('backcategories.update', $category->id)]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name'); !!}
                    {!! Form::text('name', $category->name, ['class'=>'form-control']); !!}
                </div>
                <button class="btn btn-primary">Envoyer</button>
            {!! Form::close() !!}
        </div>
    </div>
@stop