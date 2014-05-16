@extends('layouts.default')


@section('content')

  <h1>Edit Profile</h1>
  
  {{ Form::model($user->profile, ['method' => 'PATCH', 'route' => ['profiles.update', $user->id]]) }}
  
    <!-- Location Field -->
    <div class="form-group">
      {{ Form::label('location', 'Location: ')}}
      {{ Form::text('location', null, ['class' => 'form-control']) }}
      {{ errors_for('location', $errors) }}
    </div>
    
    <!-- Website Field -->
    <div class="form-group">
      {{ Form::label('website', 'Website: ')}}
      {{ Form::text('website', null, ['class' => 'form-control']) }}
      {{ errors_for('website', $errors) }}
    </div>
    
    <!-- Bio Field -->
    <div class="form-group">
      {{ Form::label('bio', 'Bio: ')}}
      {{ Form::textarea('bio', null, ['class' => 'form-control', 'required' => 'required']) }}
      {{ errors_for('bio', $errors) }}
    </div>
    
    <div class="form-group">
      {{ Form::submit('Update Profile', ['class' => 'btn btn-primary']) }}
    </div>
    
  {{ Form::close() }}
  
@stop