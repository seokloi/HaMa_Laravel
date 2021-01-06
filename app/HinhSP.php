<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhSP extends Model
{
    //
    protected $table = 'hinhsp';

    public function sanpham(){
        return $this->belongsTo('App\SanPham', 'IDSP', 'IDSP');
    }
}
