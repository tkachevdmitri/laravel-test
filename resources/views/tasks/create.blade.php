@extends('layout')

@section('title', 'Create new Task')

@section('content')
    <h1>Create new Task</h1>


    {{Form::open([
        'route' => 'tasks.store'
    ])}}
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input id="title" type="text" name="title">
        </div>
        <br>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="published_at">Дата публикации</label>
            <input id="published_at" type="date" name="published_at" value="<?php echo date('Y-m-d') ?>">
        </div>

        <button type="submit">Create Task</button>

    {{Form::close()}}

    @include('errors.list')

@endsection