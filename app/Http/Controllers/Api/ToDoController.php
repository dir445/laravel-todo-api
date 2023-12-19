<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ToDo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreToDoRequest;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $toDos = ToDo::all();
        return response()->json([
            'status' => true,
            'toDos' => $toDos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request)
    {
        $toDos = Todo::create($request->all());
        return response()->json([
            'status' => true,
            'message' => "ToDo Created successfully!",
            'toDos' => $toDos
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $toDo = Todo::find($id);
        if(!$toDo){
            return response([
                'message' => 'ToDo is not found.'
            ], 404);
        }
        return response()->json([
            'status' => true,
            'toDo' => $toDo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTodoRequest $request, $id)
    {
        $toDo = ToDo::findOrFail($id);
        $toDo->update($request->all());
        return response()->json([
            'status' => true,
            'message' => "ToDo updated successfully!",
            'toDo' => $toDo,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $toDo = ToDo::findOrFail($id);
        $toDo->delete();
        return response()->json([
            'status' => true,
            'message' => "ToDo deleted successfully!",
            'toDo' => $toDo,
        ], 200);
    }
}
