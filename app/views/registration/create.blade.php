@extends('layouts.default')

@section('meta-title', 'Register')

@section('content')
  <h1>Registration</h1>

    {{ Form::open(['route' => 'registration.store']) }}

    <div class="form-group">
      {{ Form::label('name', 'Name: ')}}
      {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}
      {{ $errors->first('name', '<span class="text-danger">:message</span>') }}
    </div>

    <div class="form-group">
      {{ Form::label('email', 'Email: ')}}
      {{ Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) }}
      {{ $errors->first('email', '<span class="text-danger">:message</span>') }}
    </div>

    <div class="form-group">
      {{ Form::label('password', 'Password: ')}}
      {{ Form::password('password', ['class' => 'form-control', 'required' => 'required']) }}
      {{ $errors->first('password', '<span class="text-danger">:message</span>') }}
    </div>

    <div class="form-group">
      {{ Form::label('password_confirmation', 'Password: ')}}
      {{ Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required']) }}
    </div>

    <div class="form-group">
      {{ Form::submit('Create Account', ['class' => 'btn btn-primary']) }}
    </div>

  {{ Form::close() }}
@stop