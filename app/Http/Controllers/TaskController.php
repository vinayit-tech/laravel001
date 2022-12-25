<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return $tasks;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $req->validate([
            'name' => ['required', "string", 'max:255'],
            'description' => ['nullable', "string"],
        ]);

        $data = [
            "name"        => $req->name,
            "description" => $req->description
        ];

        $task = Task::create($data);

        return $task;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::where("id", $id)->first();
        if (!$task) {
            return [
                "message" => "not found"
            ];
        }
        return $task;
    }

  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $req->validate([
            'is_completed' => ['required', "boolean"],
        ]);

        $task = Task::where("id", $id)->first();
        if (!$task) {
            return [
                "message" => "not found"
            ];
        }

        $data = [
            "is_completed" => $req->is_completed,
        ];

        $task->update($data);

        return $task;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::where("id", $id)->first();
        if (!$task) {
            return [
                "message" => "not found"
            ];
        }

        $task->delete();

        return [
            "message" => "success"
        ];
    }
}
