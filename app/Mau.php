<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mau extends Model
{
    //
    protected $table = 'mau';

	public function ct_sp(){
        return $this->hasMany('App\CT_SP', 'IDM', 'IDM');
    }
}
