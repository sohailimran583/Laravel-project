@extends('layouts.app')
@section('title',$post['title'])

@section('content')
{{-- @if($post['is_new'])
<h1>Post is true it is new</h1>
@elseif(!$post['is_new'])
<h1>Post is false it is old</h1>
@endif

@unless($post['is_new'])
<h4>Fasle</h4>
@endunless --}}
<h1>Title</h1>
<h3>{{$post['title']}}</h3>
<h1>Content</h1>
<h3>{{$post['content']}}</h3>
<h1>Comments</h1>
@foreach($post->comments as $comment)
   <p>{{$comment->content}}
    <p>{{$comment->created_at->diffForHumans()}}
</p>
@endforeach

{{--

@isset($post['has_comments'])
<h2>Comments done</h2>
@endisset --}}
@endsection
