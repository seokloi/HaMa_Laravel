<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    //
    protected $table = 'hoadon';

    public function nguoidung(){
        return $this->belongsTo('App\User', 'IDND', 'IDND');
    }
	public function baocao_ngay(){
        return $this->hasMany('App\BaoCao_Ngay', 'IDHD', 'IDHD');
    }
	public function baocao_thang(){
        return $this->hasMany('App\BaoCao_Thang', 'IDHD', 'IDHD');
    }
	public function ct_hd(){
        return $this->hasMany('App\CT_HD', 'IDHD', 'IDHD');
    }
}
