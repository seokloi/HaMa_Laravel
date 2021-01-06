<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    //
    protected $table = 'theloai';

    public function sanpham(){
        return $this->hasMany('App\SanPham', 'IDTL', 'IDTL');
    }
}
