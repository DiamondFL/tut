<?php
/**
 * Created by PhpStorm.
 * User: 340
 * Date: 5/26/2015
 * Time: 4:56 PM
 */

class Contacts extends Eloquent{
    public $table = 'contact';
    public function user()
    {
        return $this->belongsTo('User',"userId");
    }
} 