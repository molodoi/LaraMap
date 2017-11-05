@extends('layouts.main', [ 'title' => 'Contactez'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="my-4">Contact
                <small>Answer your questions</small>
            </h1>
            <hr>
    	    <form action="{{ route('contact.store') }}" method="POST">
                @if ($errors->has('name'))
                    <div class="alert alert-danger" role="alert">
                        Something's wrong!
                    </div>
                @endif
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" id="name" aria-describedby="name" placeholder="Enter your name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <small id="name" class="form-text invalid-feedback">{{ $errors->first('name') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="email" aria-describedby="email" placeholder="Enter your email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <small id="email" class="form-text invalid-feedback">{{ $errors->first('email') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="body" class="form-control {{ $errors->has('message') ? 'is-invalid' : ''}}" id="message" rows="8">{{ old('body') }}</textarea>
                    @if ($errors->has('message'))
                        <small id="email" class="form-text invalid-feedback">{{ $errors->first('message') }}</small>
                    @endif
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-block btn-primary">Submit</button>
            </form>
        </div>
    </div>
@stop