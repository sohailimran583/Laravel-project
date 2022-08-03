@extends('layouts.app')
@section('title' ,'Contact Page')

@section('content')
<h1>Contacct with layout</h1>
@can('contact.secret')
this is admin
@endcan
@endsection
