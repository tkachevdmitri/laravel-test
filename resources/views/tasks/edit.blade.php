@extends('layout')

@section('title', 'Edit Task')

@section('content')

    <h1>Edit: {{ $task->title }}</h1>

    {{Form::open([
        'route' => ['tasks.update', $task->id ],
        'method' => 'put'
    ])}}

    <div class="form-group">
        <label for="title">Заголовок</label>
        <input id="title" type="text" name="title" value="{{ $task->title }}">
    </div>
    <br>
    <div class="form-group">
        <label for="description">Описание</label>
        <textarea name="description" id="description" cols="30" rows="10">{{ $task->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="published_at">Дата публикации</label>
        <input id="published_at" type="date" name="published_at" value="{{ $task->published_at->format('Y-m-d') }}">
    </div>

    <button type="submit">Update Task</button>

    {{Form::close()}}

    @include('errors.list')

@endsection
