@extends('layout')

@section('title'){{$task->title}}@endsection

@section('content')
    <h1>{{$task->title}}</h1>

    <p>{{$task->description}}</p>
@endsection