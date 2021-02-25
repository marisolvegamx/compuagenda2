<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //
    protected $table = 'ca_states';
    public function contacts(){
        return $this->hasMany(Contact::class);
    }
    public function cities(){
        return $this->belongsTo(City::class);
    }
}
