@extends('layouts.app')
@section('title') show @endSection
@section('content')
<div class="card">
    <h4 class="bg-light text-center p-2">Post Info</h4>
  <div class="card-body">
    <h5 class="card-title">Title: {{$post->title}}</h5>
    <p class="card-text">Description: {{$post->description}}</p>
  </div>
</div>

<div class="card w-50">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
  </div>
</div>
@endSection