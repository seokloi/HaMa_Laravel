<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    //
    protected $table = 'sanpham';
    public function theloai(){
        return $this->belongsTo('App\TheLoai', 'IDTL', 'IDTL');
    }
	public function hinhsp(){
        return $this->hasMany('App\HinhSP', 'IDSP', 'IDSP');
    }
	public function ct_sp(){
        return $this->hasMany('App\CT_SP', 'IDSP', 'IDSP');
    }
	public function binhluan(){
        return $this->hasMany('App\BinhLuan', 'IDSP', 'IDSP');
    }
	public function danhgia(){
        return $this->hasMany('App\DanhGia', 'IDSP', 'IDSP');
    }
}
