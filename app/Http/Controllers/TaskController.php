<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Tag;
use App\Models\Task;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qntTask = Task::count('id');

        for ($i=1; $i <= $qntTask ; $i++) {

            $task[] = Task::with('tag')->findOrFail($i);
        }

        return response()->json($task, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $task = Task::create($request->all());

        return response()->json($task, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, TaskRequest $request)
    {
        try {

            $task = Task::findOrFail($id);

            $task->update($request->all());
            $task->save();

            return response()->json($task, 200);

        } catch (\Throwable $th) {
            return response()->json(['erro' => "Tarefa com id $id não escontrada no banco de dados"], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateStatus($id)
    {
        try {
            $task = Task::findOrFail($id);

            if ($task->status < 3){
                $task->update([
                    'status' => $task->status + 1
                ]);

                return response()->json($task, 200);
            }

            return response()->json(['message' => 'Esta tarefa já está aprovada']);

        } catch (\Throwable $th) {
            return response()->json(['erro' => "Não foi encontrada nenhuma tarefa com o id $id"]);
        }
    }
}
