<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['id','book_name', 'book_author', 'book_category', 'book_number', 'book_state', 'book_flag', 'book_order','borrow_acount'];
    
    public function history(){
        return $this->hasMany('App\BookHistory');
    }
}
