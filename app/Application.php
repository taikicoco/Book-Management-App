<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Kyslik\ColumnSortable\Sortable;　

class Application extends Model
{
    //use Sortable; // 追加
    protected $fillable = ['id', 'appname', 'environment_name', 'platform', 'aws_ip_adress', 'aws_console_id', 'aws_console_pw',
                            'ssh_user_name', 'ssh_pw', 'ssh_secret_key_name', 'ssh_secret_key_adress', 'git_url', 'git_branch',
                            'git_commitid', 'active'];
    
     public function access_urls(){
        return $this->hasMany('App\AccessUrl');
    }
    
    public function access_ids(){
        return $this->hasMany('App\AccessId');
    }
    
    public function scopeAppLikeSearch($query, $key){
        return $query->where('appname', 'LIKE', "%$key%");
    }
    
    
   
        
}
