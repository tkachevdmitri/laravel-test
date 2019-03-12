<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
	/*
	 * вывод списка задач
	 */
    public function index()
	{
		$tasks = Task::latest('published_at')->published()->get();
		return view('tasks.index', compact('tasks'));
	}
	
	/*
	 * вывод задачи
	 */
	public function show($id)
	{
		// findOrFail() - если нашел - то вернет то что нашел, если не нашел - вернет ошибку (404 страницу)
		$task = Task::findOrFail($id);
		
		//dd($task->created_at->diffForHumans());
		//dd($task->published_at);
		
		return view('tasks.show', compact('task'));
	}
	
	/*
	 * создание задачи (вывод формы)
	 */
	public function create()
	{
		return view('tasks.create');
	}
	
	/*
	 * создание задачи (сохранение задачи в бд)
	 */
	public function store(TaskRequest $request)
	{
		// указываем user_id вариант 1 (вручную)
//		$request = $request->all();
//		$request['user_id'] = Auth::id();
//		Task::create($request);
		
		// указываем user_id вариант 2 (автоматически, сам ларавель)
		$task = new Task($request->all()); // тут user_id еще не установлен
		Auth::user()->tasks()->save($task); // возмите статьи пользователя и сохраните новую, передав запрос с данными, laravel автоматически укажет user_id
		
		
		
		return redirect('/tasks');
	}
	
	
	public function edit($id)
	{
		$task = Task::findOrFail($id);
		return view('tasks.edit', compact('task'));
	}
	
	
	public function update($id, TaskRequest $request){
		$task = Task::findOrFail($id);
		
		$task->update($request->all());
		
		return redirect()->route('tasks.index');
	}
	
	
}
