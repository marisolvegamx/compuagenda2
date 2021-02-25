<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    //
    protected $table = 'comentarios';
    
    protected $fillable = [
        'ca_contactos_id', 'user', 'email','message'
        
    ];
    public function contacts(){
        return $this->belongsTo(Contact::class);
    }
  
   
    
}
