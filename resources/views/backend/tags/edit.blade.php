@extends('layouts.app', [ 'title' => 'Tags'])

@section('content')
    <div class="container">
        <div class="row">
            <h2>Editer</h2>
            {!! Form::open(['method' => 'put', 'url' => route('backtags.update', $tag->id)]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name'); !!}
                    {!! Form::text('name', $tag->name, ['class'=>'form-control']); !!}
                </div>

                <button class="btn btn-primary">Envoyer</button>
            {!! Form::close() !!}
        </div>
    </div>
@stop