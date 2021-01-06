<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CT_HD extends Model
{
    //
    protected $table = 'ct_hd';

    public function hoadon(){
        return $this->belongsTo('App\HoaDon', 'IDHD', 'IDHD');
    }
	public function ct_sp(){
        return $this->belongsTo('App\CT_SP', 'IDCTSP', 'IDCTSP');
    }
}
