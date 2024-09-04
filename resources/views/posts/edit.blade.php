@extends('layouts.app')
@section('title')Update @endSection
@section('content')


<form method="POST" action="{{route('posts.update',$post->id)}}">
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label   class="form-label">Title</label>
    <input name="title" type="text"  value="{{$post->title}}" class="form-control" >
  </div>
  <div class="mb-3">
    <label  class="form-label">Description</label>

    <textarea  name="description" class="form-control" rows="3">{{$post->description}}</textarea>
  </div>
  <div class="mb-3">
    <label  class="form-label">Post Creator</label>
    <select  name="post_creator" class="form-control">
      @foreach($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach

    </select>
  </div>
  
  <button type="submit" class="btn btn-primary">update</button>
</form>
@endSection




