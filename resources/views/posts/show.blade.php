@extends('layouts.app')
@section('title') show @endSection
@section('content')
<div class="card text-center">
    <h4 class="bg-light text-center p-2">Post Info</h4>
  <div class="card-body">
    <h5 class="card-title">Title: {{$post->title}}</h5>
    <p class="card-text">Description: {{$post->description}}</p>
  </div>
</div>

<div class="card text-center">
<h4 class="bg-light text-center p-2">Post Creator Info</h4>
  <div class="card-body">
    <h5 class="card-title">Name: {{$post->user? $post->user->name:"not found"}}</h5>
    <h5 class="card-title">Email: {{ $post->user? $post->user->email:"not found"}}</h5>
    <h5 class="card-title">Created At :{{ $post->created_at}} </h5>
   </div>
</div>

@endSection