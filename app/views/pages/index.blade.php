@extends('layouts.default')

@section('content')
  <h1>
    {{ Auth::check() ? "Welcome, " . Auth::user()->name : "Welcome, Guest!" }}
  </h1>
  
  <h5>Map of Napa Valley</h5>
  <div id="map-canvas"></div>
@stop
