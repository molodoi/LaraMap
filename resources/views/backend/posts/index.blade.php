@extends('layouts.app', [ 'title' => 'News'])

@section('content')
    <div class="container">
        <div class="row">
            <h2>News</h2> <a href="{{ route('backposts.create') }}" class="btn btn-success">Create News</a>
            <hr>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Category</th>
                  <th scope="col">Created At</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>
                            @if($post->category)
                                <em>{{ $post->category->name }}</em>
                            @endif
                        </td>
                        <td>{{ $post->created_at }}</td>
                        <td>

                            <a href="{{ route('backposts.edit', $post->id) }}" class="btn btn-primary">Edit</a>

                            <a href="{{ route('backposts.destroy', $post->id) }}"  class="btn btn-danger"
                                onclick="event.preventDefault();
                                         document.getElementById('delete-post-form-{{$post->id}}').submit();">
                                Delete
                            </a>
                            {!! Form::open(['method' => 'delete', 'url' => route('backposts.destroy', $post), 'id' => 'delete-post-form-'.$post->id, 'style'=>'display:none']) !!}
                                {!! Form::hidden('post_id', $post->id, ['class'=>'form-control']); !!}
                                <button class="btn btn-danger">Delete</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>

            {{ $posts->links('vendor.pagination.bootstrap-4') }}

        </div>
    </div>
@stop