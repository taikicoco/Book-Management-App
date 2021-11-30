<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookHistory extends Model
{
    protected $table = 'book_historys';
    protected $fillable = ['id','book_id','borrow_acount'];
    
    public function books(){
        return $this->belongsTo('App\Book');
    }
}
