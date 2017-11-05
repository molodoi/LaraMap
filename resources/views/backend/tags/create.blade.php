@extends('layouts.app', [ 'title' => 'News'])

@section('content')
    <div class="container">
        <div class="row">
             <h2>Ajouter un nouveau Tag</h2>
            {!! Form::open(['url' => route('backtags.store')]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name'); !!}
                    {!! Form::text('name', null, ['class'=>'form-control']); !!}
                </div>
                <button class="btn btn-primary">Envoyer</button>
            {!! Form::close() !!}
        </div>
    </div>
@stop