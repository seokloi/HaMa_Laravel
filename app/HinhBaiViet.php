<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhBaiViet extends Model
{
    //
    protected $table = 'hinhbaiviet';

    public function baiviet(){
        return $this->belongsTo('App\BaiViet', 'IDBV', 'IDBV');
    }
}
