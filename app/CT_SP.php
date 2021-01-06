<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CT_SP extends Model
{
    //
    protected $table = 'ct_sp';

    public function mau(){
        return $this->belongsTo('App\Mau', 'IDM', 'IDM');
    }
	public function size(){
        return $this->belongsTo('App\Size', 'IDS', 'IDS');
    }
	public function nhap(){
        return $this->hasMany('App\Nhap', 'IDCTSP', 'IDCTSP');
    }
	public function sanpham(){
        return $this->belongsTo('App\SanPham', 'IDSP', 'IDSP');
    }
	public function giohang(){
        return $this->hasMany('App\GioHang', 'IDCTSP', 'IDCTSP');
    }
	public function donhang(){
        return $this->hasMany('App\DonHang', 'IDCTSP', 'IDCTSP');
    }
	public function ct_hd(){
        return $this->hasMany('App\CT_HD', 'IDCTSP', 'IDCTSP');
    }
}
