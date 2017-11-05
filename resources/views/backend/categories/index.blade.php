@extends('layouts.app', [ 'title' => 'Categories'])
@section('content')
    <div class="container">
        <div class="row">
            <h2>Categories </h2> <a href="{{ route('backcategories.create') }}" class="btn btn-success">Create Category</a>
            <hr>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Slug</th>
                  <th scope="col">Created at</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            <a href="{{ route('backcategories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('backcategories.destroy', $category->id) }}"  class="btn btn-danger"
                                onclick="event.preventDefault();
                                         document.getElementById('delete-post-form-{{$category->id}}').submit();">
                                Delete
                            </a>
                            {!! Form::open(['method' => 'delete', 'url' => route('backcategories.destroy', $category), 'id' => 'delete-post-form-'.$category->id, 'style'=>'display:none']) !!}
                                {!! Form::hidden('category_id', $category->id, ['class'=>'form-control']); !!}
                                <button class="btn btn-danger">Delete</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>

            {{ $categories->links('vendor.pagination.bootstrap-4') }}

        </div>
    </div>
@stop