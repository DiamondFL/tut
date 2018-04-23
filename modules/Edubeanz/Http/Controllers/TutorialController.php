<?php

namespace Edubeanz\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tutorial\Models\Lesson;
use Tutorial\Models\Section;
use Tutorial\Models\Tutorial;

class TutorialController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        $tutorials = app(Tutorial::class)
            ->select(['id', 'name'])
            ->get();
        return view('edu::tutorials.index', compact('tutorials'));
    }
    public function show($id)
    {
        $tutorial = app(Tutorial::class)->find($id);
        if(empty($tutorial))
        {
            session()->flash('error', 'Category not found');
        }
        $sections = app(Section::class)
            ->where(TUTORIAL_ID_COL, $id)
            ->with('lessons')
            ->get();
        return view('edu::tutorials.show', compact('sections', 'tutorial'));
    }
    public function section($id)
    {
        $sections = app(Section::class)
            ->where(TUTORIAL_ID_COL, $id)
            ->withCount('lessons')
            ->get(['id', 'name']);
        return view('edu::tutorials.section', compact('sections'));
    }
    public function lesson($id)
    {
        $lesson = app(Lesson::class)->find($id);
        $lesson->views +=1;
        $lesson->last_view = date('Y-m-d H:i:s');
        $lesson->save();
        $section = $lesson->section;
        $lessonList = $section->lessons()->pluck('title', 'id');
        $data = compact('lesson', 'section', 'lessonList');
        return view('edu::tutorials.lesson', $data);
    }
}
