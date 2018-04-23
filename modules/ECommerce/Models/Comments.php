<?php
/**
 * Created by PhpStorm.
 * User: 340
 * Date: 5/26/2015
 * Time: 5:01 PM
 */
namespace ECommerce\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model{
    public $table = 'comment';
    public function user()
    {
        return $this->belongsTo('User',"userId");
    }
    public function group()
    {
        return $this->belongsTo('Groups',"groupId");
    }
    public function newComments($userId, $comment){

    }
} 