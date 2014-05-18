@extends('layouts.default')

@section('meta-title', 'Login')

@section('content')
  <h1>Log In</h1>
  
  {{ Form::open(['route' => 'sessions.store']) }}
  
    <!-- Email Field -->
    <div class="form-group">
      {{ Form::label('email', 'Email:') }}
      {{ Form::email('email', null, ['class' => 'form-control']) }}
      {{ errors_for('email', $errors) }}
    </div>
  
    <!-- Password Field -->
    <div class="form-group">
      {{ Form::label('password', 'Password:') }}
      {{ Form::password('password', ['class' => 'form-control']) }}
      {{ errors_for('password', $errors) }}
    </div>
    
    <!-- Form Submit -->
    <div class="form-group">
      {{ Form::submit('Log In!', ['class' => 'btn btn-primary']) }}
    </div>
    
  {{ Form::close() }}
@stop