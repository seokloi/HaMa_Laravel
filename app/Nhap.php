<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhap extends Model
{
    //
    protected $table = 'nhap';

    public function ct_sp(){
        return $this->belongsTo('App\CT_SP', 'IDCTSP', 'IDCTSP');
    }
}
