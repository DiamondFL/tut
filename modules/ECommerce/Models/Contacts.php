<?php
/**
 * Created by PhpStorm.
 * User: 340
 * Date: 5/26/2015
 * Time: 4:56 PM
 */

namespace ECommerce\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    public $table = 'contact';

    public function user()
    {
        return $this->belongsTo(User::class, "userId");
    }
} 