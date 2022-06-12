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
        $taskAll = Task::with('tag')->get();

        return response()->json($taskAll, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        if ($request->status != Task::BACKLOG){
            return response()->json(['erro' => 'As tarefas só podem ser criadas com status BACKLOG (0)'], 406);
        }

        $task = Task::create($request->all());

        return response()->json(['sucess' => $task], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $task = Task::findOrfail($id);
            $task->tag;

            return response()->json(['sucess' => $task], 200);

        } catch (\Throwable $th) {
            return response()->json(['erro' => "Tarefa com o id $id não encontrada"], 404);
        }
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
        Task::destroy($id);

        return response()->json(['sucess' => 'Tarefa deletada com sucesso']);
    }

    public function updateStatus($id)
    {
        try {
            $task = Task::findOrFail($id);

            if ($task->status < Task::APPROVED){
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

    public function getUrl($id)
    {
        try {

            $task = Task::findOrFail($id);

            return response()->json($task->file_url, 200);

        } catch (\Throwable $th) {
            return response()->json(['erro' => "Tarefa com id $id não escontrada no banco de dados"], 404);
        }
    }
}
