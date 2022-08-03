@extends('layouts.app')
@section('title','Index Posts')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Content</th>
      <th scope="col">Comments</th>
      <th scope="col">Time</th>
      <th scope="col">Added by</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @forelse($posts as   $post)
    <tr>
      <th scope="row">{{ 1}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->content}}</td>
      <td>
         @if($post->comments_count)
          <p>{{$post->comments_count}} comments</p>
          @foreach($post->comments as $comment)
          {{$comment->content}}
          <p>{{$comment->created_at->diffForHumans()}}

        </p>
          @endforeach
         @else
          no comments
         @endif
      </td>
<td>{{dateH($post)}}</td>
<td>{{$post->user->name}}</td>
@can('update',$post)
      <td><form action="{{route('posts.destroy',['post'=>$post->id])}}" method="POST">
        @CSRF
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button></form>
        <form action="{{route('posts.edit',['post'=>$post->id])}}">
        @CSRF
        <button type="submit" class="btn btn-primary">Edit</button></form>

        <form action="{{route('posts.show',['post'=>$post->id])}}">
            @CSRF
            <button type="submit" class="btn btn-primary">View</button></form>
        @endcan
         </td>

<td> @cannot('update',$post)
    <p>Cannot delete or update</p>
        @endcannot</td>

    </tr>
    @empty
Not Found
@endforelse

  </tbody>
</table>

@endsection
