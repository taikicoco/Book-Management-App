<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessMnagement extends Model
{
    protected $table = 'access_management';
    protected $fillable = ['id', 'application_id'];
}
