<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //
    protected $table = 'notes';
    
    protected $fillable = ['id', 'task_id', 'note'];
    
    public function tasks(){
        return $this->belongsTo('App\Task');
    }
}
