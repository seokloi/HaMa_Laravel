<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaoCao_Thang extends Model
{
    //
    protected $table = 'baocao_thang';

    public function hoadon(){
        return $this->belongsTo('App\HoaDon', 'IDHD', 'IDHD');
    }
}
