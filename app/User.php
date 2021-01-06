<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

	public function danhgia(){
        return $this->hasMany('App\DanhGia', 'IDND', 'IDND');
    }
	public function binhluan(){
        return $this->hasMany('App\BinhLuan', 'IDND', 'IDND');
    }
	public function hoadon(){
        return $this->hasMany('App\HoaDon', 'IDND', 'IDND');
    }
	public function donhang(){
        return $this->hasMany('App\DonHang', 'IDND', 'IDND');
    }
	public function giohang(){
        return $this->hasMany('App\GioHang', 'IDND', 'IDND');
    }
}
