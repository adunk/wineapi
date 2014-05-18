@extends('layouts.default')


@section('content')

  <h1>Need to Reset Your Password?</h1>
  
  {{ Form::open() }}
  
    <!-- Email Field -->
    <div class="form-group">
      {{ Form::label('email', 'Email Address:') }}
      {{ Form::email('email', null, ['class' => 'form-control']) }}
    </div>
    
    <!-- Form Submit -->
    <div class="form-group">
      {{ Form::submit('Reset', ['class' => 'btn btn-primary']) }}
    </div>
    
    @if (Session::has('error'))
      <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @elseif (Session::has('status'))
      <div class="alert alert-success">{{ Session::get('status') }}</div>
    @endif
  
  {{ Form::close() }}

@stop