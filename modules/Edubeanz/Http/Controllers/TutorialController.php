<?php

namespace Edubeanz\Http\Controllers;

use App\Http\Controllers\Controller;
use Docs\Models\DocLesson;
use Illuminate\Http\Request;
use Organization\Models\Categories;
use Organization\Models\SubCategories;

class TutorialController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        $categories = app(Categories::class)
            ->select(['id', 'name'])
            ->get();
        return view('edu::tutorials.index', compact('categories'));
    }
    public function show($id)
    {
        $subCategories = app(SubCategories::class)
            ->where(CATEGORY_ID_COL, $id)
            ->with('lessons')
            ->get();
//        dump($subCategories);
        return view('edu::tutorials.show', compact('subCategories'));
    }
    public function section($id)
    {
        $subCategories = app(SubCategories::class)
            ->where(CATEGORY_ID_COL, $id)
            ->withCount('lessons')
            ->get(['id', 'name']);
        return view('edu::tutorials.section', compact('subCategories'));
    }
    public function lesson($id)
    {
        $lesson = app(DocLesson::class)->find($id);
        $section = $lesson->subCategory;
//        dd($section);
        $lessonList = $section->lessons()->pluck('title', 'id');
        $data = compact('lesson', 'section', 'lessonList');
        return view('edu::tutorials.lesson', $data);
    }
}
