<?php
/**
 * Created by PhpStorm.
 * User: 340
 * Date: 5/26/2015
 * Time: 4:59 PM
 */
namespace ECommerce\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Chats extends Models {
    public $table = 'chat';
    public function user()
    {
        return $this->belongsTo('User',"userId");
    }
    public function userR()
    {
        return $this->belongsTo('User',"receiveId");
    }
} 