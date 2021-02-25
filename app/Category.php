<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'ca_categorias';
    
    public function subcategorias(){
        return $this->belongsTo(Subcategory::class);
        
    }
}
