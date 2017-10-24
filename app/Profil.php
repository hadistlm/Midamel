<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $fillable = [
    	'email','first_name','last_name','phone_number','photo','lamaran','about','user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Profil', 'user_id');
    }

    public function application()
    {
    	return $this->hasMany('App\Application', 'user_id');
    }
}
