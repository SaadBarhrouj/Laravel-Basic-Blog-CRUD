@extends('layouts.app')
@section('title') index @endSection
@section('content')

  
    <div class="text-center">
        <a  type="button" class="btn btn-success" href="{{route('posts.create')}}">Create Post</a>
    </div>

    <table class="table mt-4 text-center">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Posted By</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>

  @foreach($posts as $post)

    <th scope="row">{{$post->id}}</th>
      <td>{{$post-> title}}</td>
      <td>{{$post->posted_by}}</td>
      <td>{{$post->created_at}}</td>
     
      <td>    
      <a type="button" class="btn btn-info" href="{{route('posts.show',$post->id)}}">View</a>
      <a type="button" class="btn btn-primary " href="{{route('posts.edit',$post->id)}}">Edit</a>
      <form  style="display:inline" method="POST" action="{{route('posts.destroy',$post->id)}}">
          @csrf
        @method('DELETE')
      <button type="submit" class="btn btn-danger">Delete</button>

      </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endSection