<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ContactRating extends Model
{
    //
    protected $table = 'ca_contactos_rating';
    
    protected $fillable = [
        'ca_contactos_id', 'rating_number', 'total_points','status'
        
    ];
   
   
    
}
