<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    //
    protected $table = 'danhgia';

    public function sanpham(){
        return $this->belongsTo('App\SanPham', 'IDSP', 'IDSP');
    }
	public function nguoidung(){
        return $this->belongsTo('App\User', 'IDND', 'IDND');
    }
}
