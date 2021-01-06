<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    //
    protected $table = 'baiviet';

    public function hinhbaiviet(){
        return $this->hasMany('App\HinhBaiViet', 'IDBV', 'IDBV');
    }
}
