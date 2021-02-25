<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    //
    protected $table = 'ca_subcategorias';
    
    public function contacts(){
        return $this->belongsToMany(Contact::class,"ca_contactos_subcategorias","ca_subcategorias_id","ca_contactos_id");
    }
   
    public function categories(){
        return $this->belongsTo(Category::class);
    }
    
    public function scopeSubcategory($query, $flag) {
        if($flag!="")
           return $query->where('id', $flag);
    }
    public function scopeCategory($query, $flag) {
        if($flag!="")
         return $query->where('ca_categorias_id', $flag);
     }
}
