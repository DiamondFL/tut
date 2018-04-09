<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class LessonComment extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'lesson_id' => $this->lesson_id,
            CONTENT_COL => $this->content,
            'create_by' => $this->create_by,
        ];

//        return parent::toArray($request);
    }
}
