@extends('layouts.app', [ 'title' => 'Tags'])

@section('content')
    <div class="container">
        <div class="row">
            <h2>Tags</h2> <a href="{{ route('backtags.create') }}" class="btn btn-success">Create Tag</a>
            <hr>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <th scope="row">{{ $tag->id }}</th>
                        <td>{{ $tag->name }}</td>

                        <td>

                            <a href="{{ route('backtags.edit', $tag->id) }}" class="btn btn-primary">Edit</a>

                            <a href="{{ route('backtags.destroy', $tag->id) }}"  class="btn btn-danger"
                                onclick="event.preventDefault();
                                         document.getElementById('delete-post-form-{{$tag->id}}').submit();">
                                Delete
                            </a>
                            {!! Form::open(['method' => 'delete', 'url' => route('backtags.destroy', $tag), 'id' => 'delete-post-form-'.$tag->id, 'style'=>'display:none']) !!}
                                {!! Form::hidden('tag_id', $tag->id, ['class'=>'form-control']); !!}
                                <button class="btn btn-danger">Delete</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>

            {{ $tags->links('vendor.pagination.bootstrap-4') }}

        </div>
    </div>
@stop