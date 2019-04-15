<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\TaskCollection;
use App\Task;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $post = new Task([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'status' => $request->get('status')
        ]);
        $post->save();
        return response()->json('Inserção concluida');
    }

    public function index()
    {
        return new TaskCollection(Task::all());
    }

    public function edit($id)
    {
      $task = Task::find($id);
      return response()->json($task);
    }

    public function update($id, Request $request)
    {
      $task = Task::find($id);

      $task->update($request->all());

      return response()->json('Alteração concluida');
    }

    public function delete($id)
    {
      $task = Task::find($id);

      $task->delete();

      return response()->json('Remoção concluída');
    }
}
