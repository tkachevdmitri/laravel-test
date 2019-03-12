@extends('layout')


@section('title', 'Tasks')

@section('content')
    <h1>Tasks</h1>

    <div class="items tasks_list">
        @foreach($tasks as $task)
            <div class="item">
                <h4>

                    <!--
                    <a href="/tasks/{{$task->id}}">{{$task->title}}</a>
                    <a href="{{ action('TasksController@show', [$task->id]) }}">{{$task->title}}</a>
                    <a href="{{url('/tasks', $task->id)}}">{{$task->title}}</a>
                    -->

                        <a href="{{url('/tasks', $task->id)}}">{{$task->title}}</a>
                </h4>
                <p>{{$task->description}}</p>
                <hr>
            </div>
        @endforeach
    </div>
    <div class="tasks_add">
        <br>
        <br>
        <a href="{{ url('/tasks/create') }}">Add new task</a>
    </div>
@endsection