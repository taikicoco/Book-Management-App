<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessId extends Model
{
    protected $table = 'access_ids';
   
    public function application(){
        return $this->belongsTo('App\Application');
    }
}
