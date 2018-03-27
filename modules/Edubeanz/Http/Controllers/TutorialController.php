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
        $category = app(Categories::class)->find($id);
        if(empty($category))
        {
            session()->flash('error', 'Category not found');
        }
        $subCategories = app(SubCategories::class)
            ->where(CATEGORY_ID_COL, $id)
            ->with('lessons')
            ->get();
//        dump($subCategories);
        return view('edu::tutorials.show', compact('subCategories', 'category'));
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
        $lesson->views +=1;
        $lesson->last_view = date('Y-m-d H:i:s');
        $lesson->save();
        $section = $lesson->subCategory;
//        dd($section);
        $lessonList = $section->lessons()->pluck('title', 'id');
        $data = compact('lesson', 'section', 'lessonList');
        return view('edu::tutorials.lesson', $data);
    }
}
