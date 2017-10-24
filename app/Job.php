<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
    	'name','position', 'division', 'placement'
    ];

    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
