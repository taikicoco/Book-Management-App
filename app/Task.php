<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $table = 'tasks';
    protected $fillable = ['id', 'task_name', 'task_details', 'state', 'deadline', 'completion_date', 'find',
                            'note_number','active'];
    
     public function notes(){
        return $this->hasMany('App\Note');
    }
}
