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


    private $resource;
    public function __construct(LessonCommentResource $resource)
    {
        $this->resource = $resource;
    }


    public function index()
    {
        //Get all task
        $comments = LessonComment::orderBy('id', 'DESC')->simplePaginate(15);
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
    public function store()
    {
        $request = \request();
        if(auth()->check()) {
            $comment = new LessonComment;
            $comment->content = $request->input('content');
            $comment->created_by = auth()->id();
            $comment->lesson_id =  1;
            $comment->is_active =  1;
            if($comment->save()) {
                return response(new LessonCommentResource($comment), 200);
            }
        }
        return response(false, 200);
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
