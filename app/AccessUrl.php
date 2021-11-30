<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessUrl extends Model
{
    protected $table = 'access_urls';
    
    protected $fillable = ['id', 'application_id'];
    
    public function application(){
        return $this->belongsTo('App\Application');
    }
}
