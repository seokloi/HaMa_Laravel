<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    //
    protected $table = 'size';

	public function ct_sp(){
        return $this->hasMany('App\CT_SP', 'IDS', 'IDS');
    }
}
