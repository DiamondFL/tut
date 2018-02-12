<?php

namespace App\Http\Controllers\Involve;

use App\Repositories\TagRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    private $repository;

    public function __construct(TagRepository $repository)
    {

    }
}
