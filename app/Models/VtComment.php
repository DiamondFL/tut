<?php

namespace App\Models;

class VtComment
{

    protected $connection = 'mongodb';
    public $collection = 'comment';
    public $table = 'comment';

    public $fillable = [
        'id', 'channel', 'status_id', 'user_id', 'time', 'created_at', 'comment', 'is_active'
    ];

    public function scopeFilter($query, $input)
    {
        if (isset($input['start_time']) && $input['start_time'] != '') {
            $query->where('created_at', '>=', $input['start_time'] . ' 00:00:00');
        }
        if (isset($input['end_time']) && $input['end_time'] != '') {
            $query->where('end_time', '<=', $input['end_time'] . ' 23:59:59');
        }
        if (isset($input['status']) && $input['status'] != '') {
            $query->where('status', 'LIKE', '%' . trim($input['status']) . '%');
        }
        if (isset($input['item_type']) && $input['item_type'] != '') {
            $query->where('item_type', $input['item_type']);
        }
        if (isset($input['is_active']) && $input['is_active'] != '') {
            $query->where('is_active', '=', $input['is_active']);
        }
        return $query;
    }

    public function refine($input)
    {
        if (isset($input['start_time']) && $input['start_time'] != '') {
            $created_at[] = '$gte: \'' . $input['start_time'] . ' 00:00:00\'';
        }
        if (isset($input['end_time']) && $input['end_time'] != '') {
            $created_at[] = '$lte: \'' . $input['start_time'] . ' 23:59:59\'';
        }
        if (isset($created_at)) {
            $filter[] = 'created_at: {' . implode(', ', $created_at) . '}';
        }
        if (isset($input['user_id']) && $input['user_id'] != '') {
            $filter[] = 'user_id: ' . $input['user_id'];
        }
        if (isset($input['status_id']) && $input['status_id'] != '') {
            $filter[] = 'status_id: \'' . $input['status_id'] . '\'';
        }
        if (isset($input['comment']) && $input['comment'] != '') {
            $filter[] = 'comment: /' . $input['comment'] . '/';
        }
        if (isset($input['item_type']) && $input['item_type'] != '') {
            $filter[] = 'item_type: ' . $input['item_type'];
        }
        if (isset($input['is_active']) && $input['is_active'] != '') {
            $filter[] = 'is_active: ' . $input['is_active'];
        }
//        $filter[] = 'is_active: 1';

        if (isset($filter)) {
            return implode(', ', $filter);
        }
    }

    public function findIn($ids)
    {
        $arrayId = [];
        foreach ($ids as $id) {
            $arrayId[] = $this->buildObject($id);
        }
        $ids = implode(', ', $arrayId);
        return '_id : { $in : [' . $ids . '] }';
    }
}
