@extends('layouts.app')

@section('title','Create the  Posts')

@section('content')
<form action="{{route('posts.store')}}" method="POST">
    @CSRF
    <div class="form-group">
    <label>{{Auth::user()->name}}</label>
    <input type="hidden" name="user_id" class="form-control w-25" value="{{Auth::user()->id}}" id="exampleInputEmail1" name="title" aria-describedby="emailHelp" placeholder="Enter title">
  </div>
  @include('posts.partials.form')
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection