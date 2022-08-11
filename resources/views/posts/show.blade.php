@extends('layouts.app')
@section('title',$post['title'])

@section('content')
@if($post['is_new'])
<h1>Post is true it is new</h1>
@elseif(!$post['is_new'])
<h1>Post is false it is old</h1>
@endif

@unless($post['is_new'])
<h4>Fasle</h4>
@endunless

<h1>{{$post['title']}}</h1>
<h1>{{$post['content']}}</h1>
@isset($post['has_comments'])
<h2>Comments done</h2>
@endisset
@endsection