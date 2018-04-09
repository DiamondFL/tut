<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\LessonCommentResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tutorial\Models\LessonComment;

class LessonCommentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all task
        $tasks = LessonComment::simplePaginate(15);

        // Return a collection of $task with pagination
        return LessonCommentResource::collection($tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = $request->isMethod('put') ? LessonComment::findOrFail($request->task_id) : new LessonComment;

        $task->id = $request->input('task_id');
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->user_id =  1; //$request->user()->id;

        if($task->save()) {
            return new LessonCommentResource($task);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = LessonComment::findOrfail($id);

        // Return a single task
        return new LessonCommentResource($task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = LessonComment::findOrfail($id);

        if($task->delete()) {
            return new LessonCommentResource($task);
        }
    }
}
