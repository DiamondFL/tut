<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class LessonCommentResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
//            'created_by' => $this->created_by,
            'created' => date_format($this->created_at, 'Y-m-d H:i:s'),
            'creator' => 'Fight Light Diamond',
            'upvote_count' => 0,
            'createdByCurrentUser' => $this->created_by,
            'user_has_upvoted' => false
        ];
//        return parent::toArray($request);
    }
}
