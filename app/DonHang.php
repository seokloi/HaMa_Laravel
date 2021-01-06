<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    //
    protected $table = 'donhang';

    public function nguoidung(){
        return $this->belongsTo('App\User', 'IDND', 'IDND');
    }
	public function ct_sp(){
        return $this->belongsTo('App\CT_SP', 'IDCTSP', 'IDCTSP');
    }
}
