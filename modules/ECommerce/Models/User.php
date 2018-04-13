<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
     * Các thuộc tính loại bỏ từ dạng JSON của mô hình.
     *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
    public function getAuthIdentifier(){
        return $this->getKey();
    }
    public function getAuthPassword(){
        return $this->password;
    }
    public function getReminderEmail(){
        return $this->email;
    }
    protected  $fillable = array('email','fullName','password','password_temp','code');
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
    protected function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
    public function order(){
        return $this->hasMany("Order",'userId');
    }
    public function comment(){
        return $this->hasMany("Comments",'userId');
    }
    public function chat(){
        return $this->hasMany("Chats",'userId');
    }
    public function chatR(){
        return $this->hasMany("Chats",'receiveId');
    }
    public function updateUser($id, $admin, $active){
        $u = User::find($id);
        $u->level   =   $admin;
        $u->active   =  $active;
        $u->save();
    }
}
