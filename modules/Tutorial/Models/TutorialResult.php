<?php

namespace Tutorial\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class TutorialResult extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'tutorial_results';
    public $fillable = [CREATED_BY_COL, TUTORIAL_ID_COL, SCORE_COL];

    public function scopeFilter($query, $input)
    {
        if (isset($input[CREATED_BY_COL])) {
            $query->where(CREATED_BY_COL, $input[CREATED_BY_COL]);
        }
        if (isset($input[TUTORIAL_ID_COL])) {
            $query->where(TUTORIAL_ID_COL, $input[TUTORIAL_ID_COL]);
        }
        if (isset($input[SCORE_COL])) {
            $query->where(SCORE_COL, $input[SCORE_COL]);
        }

        return $query;
    }

    public function tutorial()
    {
        return $this->belongsTo(Tutorial::class, TUTORIAL_ID_COL);
    }

    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/tutorial_results'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

