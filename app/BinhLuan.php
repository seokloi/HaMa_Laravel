<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    //
    protected $table = 'binhluan';

    public function sanpham(){
        return $this->belongsTo('App\SanPham', 'IDSP', 'IDSP');
    }
	public function nguoidung(){
        return $this->belongsTo('App\User', 'IDND', 'IDND');
    }
}
