<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\City;

class City extends Model
{
    //
    protected $table = 'ca_cities';
    
    public function states(){
        return $this->hasMany(State::class);
        
    }
  
    public function scopeState($query, $flag) {
        if($flag!="")
        return $query->where('ca_states_id', $flag);
    }
    
}
