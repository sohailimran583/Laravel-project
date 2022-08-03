@extends('layouts.app')

@section('title','Update the  Posts')

@section('content')
<form action="{{route('posts.update',['post'=>$post->id])}}" method="POST">
    @CSRF
  @method('PUT')
  @include('posts.partials.form')
  <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
