<?php

namespace App\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use ModelsTrait;
    public $table = NEWS_TB;

    public $fillable = [
        TITLE_COL, INTRO_COL, CONTENT_COL, VIEWS_COL, SOURCE_COL,
        LAST_VIEW_COL, ACTIVE_COL, HOT_COL, CREATED_BY_COL, UPDATED_BY_COL
    ];

    public function scopeFilter($query, $input)
    {
        return $query;
    }

    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/news'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

