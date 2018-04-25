<?php

namespace App\Models;

use App\Repositories\VtUserRepository;
use Illuminate\Support\Facades\DB;

class VtStatus
{
    protected $connection = 'mongodb';
    public $collection = 'status';
    public $table = 'status';


    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'item_id',
        'item_type',
        'user_id',
        'status',
        'country_code'
    ];

    public function user($users = [], $column = 'msisdn'){
        foreach($users as $user){
            if($this->user_id == $user->id) {
                return $user->$column;
            }
        }
        return '';
    }

    public function scopeFilter($query, $input){
        //dd($input);
        if(isset($input['start_time']) && $input['start_time']!='') $query->where('created_at', '>=', $input['start_time'].' 00:00:00');
        if(isset($input['end_time']) && $input['end_time']!='') $query->where('end_time', '<=', $input['end_time'].' 23:59:59');
        if(isset($input['status']) && $input['status']!='')  $query->where('status', 'LIKE', '%'.trim($input['status']).'%');
        if(isset($input['item_type']) && $input['item_type']!='') $query->where('item_type', $input['item_type']);
        if(isset($input['is_active']) && $input['is_active']!='') $query->where('is_active', '=', $input['is_active']);

        return $query;
    }

    public function refine($input){
//        if(isset($input['msisdn']) && $input['msisdn']!=''){
//            $input['user_id'] = app(VtUserRepository::class)->getIdByNumberPhone($input['msisdn']);
//        }
	
        if(isset($input['start_time']) && $input['start_time']!=''){
            $created_at[] = '$gte: \''.$input['start_time'].' 00:00:00\'';
        }
        if(isset($input['end_time']) && $input['end_time']!=''){
            $created_at[] = '$lte: \''.$input['start_time'].' 23:59:59\'';
        }
        if(isset($created_at)){
            $filter[] = 'created_at: {'.implode(', ',$created_at).'}';
        }
        if(isset($input['user_id']) && $input['user_id']){
            $filter[] = 'user_id: '.$input['user_id'];
        }
        if(isset($input['status']) && $input['status']!=''){
            $filter[] = 'status: /'.$input['status'].'/i';
        }
        if(isset($input['item_type']) && $input['item_type']!=''){
            $filter[] = 'item_type: '.$input['item_type'];
        }
		if(isset($input['identify']) && $input['identify']!=''){
            $song = VtSong::where('identify', $input['identify'])->pluck('id');
			$video = VtVideo::where('identify', $input['identify'])->pluck('id');
			$album = VtAlbum::where('identify', $input['identify'])->pluck('id');
			if (isset($song[0])){
				$filter[] = 'item_id: '.$song[0];
			}
			if (isset($video[0])){
				$filter[] = 'item_id: '.$video[0];
			}			
			if (isset($album[0])){
				$filter[] = 'item_id: '.$album[0];
			}
        }
//        if(isset($input['is_active']) && $input['is_active']!=''){
//            $filter[] = 'is_active: '.$input['is_active'];
//        }
			
        $filter[] = 'is_active: 1';
        if(isset($filter)) return implode(', ', $filter);
    }


    public function find($id){
        return '_id :'. $this->buildObject($id);
    }

    private function buildObject($id){
        return 'ObjectId("'.$id.'")';
    }

    public function findIn($ids){
        $arrayId = [];
        foreach($ids as $id){
            $arrayId[] = $this->buildObject($id);
        }
        $ids = implode(', ', $arrayId);
        return '_id : { $in : ['.$ids.'] }';
    }
}
