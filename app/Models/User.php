<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable; use Illuminate\Notifications\Notifiable;
class User extends Authenticatable {
 use Notifiable;
 protected $fillable=['name','email','phone','address','password','is_admin'];
 protected $hidden=['password','remember_token'];
 protected function casts():array{return ['password'=>'hashed','is_admin'=>'boolean','email_verified_at'=>'datetime'];}
 public function orders(){return $this->hasMany(Order::class);}
}