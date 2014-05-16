@extends('layouts.default')


@section('content')
  <h1>{{ $user->name }} <small>{{ $user->profile->location }}</small></h1>

  <div class="bio">
    <p>{{ $user->profile->bio }}</p>
  </div>
  
  <div class="website">
    <p>{{ link_to($user->profile->website, 'Awesome Website') }}</p>
  </div>
  
  <div class="timestamps">
    <p>Member since: {{ $user->profile->created_at }}</p>
    <p>Last updated: {{ $user->profile->updated_at }}</p>
  </div>
  
  @if ($user->isCurrent())
    {{ link_to_route('profiles.edit', 'Edit Your Profile', $user->id) }}
  @endif
   
@stop