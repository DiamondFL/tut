<?php

namespace App\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    use ModelsTrait;
    public $table = VOCABULARIES_TB;
    public $fillable = [WORD_COL, TYPE_COL, PRONOUNCE_COL, MEANING_COL, IMAGE_COL, DESCRIPTION_COL, IS_ACTIVE_COL];

    public function scopeFilter($query, $input)
    {
        if(isset($input[TYPE_COL]))
        {
            $query->where(TYPE_COL, 'LIKE', '%' . $input[TYPE_COL] . '%');
        }
        if(isset($input[PRONOUNCE_COL]))
        {
            $query->where(PRONOUNCE_COL, 'LIKE', '%' . $input[PRONOUNCE_COL] . '%');
        }
        if(isset($input[MEANING_COL]))
        {
            $query->where(MEANING_COL, 'LIKE', '%' . $input[MEANING_COL] . '%');
        }
        if(isset($input[WORD_COL]))
        {
            $query->where(WORD_COL, 'LIKE', '%' . $input[WORD_COL] . '%');
        }
        return $query;
    }

    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/users'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

