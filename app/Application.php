<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'applications';
    protected $fillable = [
    	'user_id','job_id','msg_read','accepted'
    ];

    public function profil()
    {
    	return $this->belongsTo('App\Profil', 'user_id');
    }
}
