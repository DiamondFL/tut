<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\LessonCommentResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tutorial\Models\LessonComment;

class LessonCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all task
        $comments = LessonComment::simplePaginate(15);

        // Return a collection of $comment with pagination
        return LessonCommentResource::collection($comments);
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
        $comment = $request->isMethod('put') ? LessonComment::findOrFail($request->task_id) : new LessonComment;
        $comment->id = $request->input('task_id');
        $comment->name = $request->input('name');
        $comment->description = $request->input('description');
        $comment->user_id =  1; //$request->user()->id;

        if($comment->save()) {
            return new LessonCommentResource($comment);
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
        $comment = LessonComment::findOrfail($id);

        // Return a single task
        return new LessonCommentResource($comment);
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
        $comment = LessonComment::findOrfail($id);

        if($comment->delete()) {
            return new LessonCommentResource($comment);
        }
    }
}
