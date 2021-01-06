<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaoCao_Ngay extends Model
{
    //
    protected $table = 'baocao_ngay';

    public function hoadon(){
        return $this->belongsTo('App\HoaDon', 'IDHD', 'IDHD');
    }
}
