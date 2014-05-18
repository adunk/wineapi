@extends('layouts.default')


@section('content')

  <h1>Set Your New Password</h1>
  
  {{ Form::open() }}
    <input type="hidden" name="token" value="{{ $token }}">
    
    <!-- Email Field -->
    <div class="form-group">
      {{ Form::label('email', 'Email: ')}}
      {{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) }}
      {{ $errors->first('email', '<span class="text-danger">:message</span>') }}
    </div>
  
    <!-- Password Field -->
    <div class="form-group">
      {{ Form::label('password', 'Password: ')}}
      {{ Form::password('password', ['class' => 'form-control', 'required' => 'required']) }}
      {{ $errors->first('password', '<span class="text-danger">:message</span>') }}
    </div>
    
    <!-- Password Confirmation -->
    <div class="form-group">
      {{ Form::label('password_confirmation', 'Password: ')}}
      {{ Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    
    <!-- Form Submit -->
    <div class="form-group">
      {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
    
    @if (Session::has('error'))
      <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
  
  {{ Form::close() }}

@stop