<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Contact extends Model
{
    //
    protected $table = 'ca_contactos';
    
    protected $fillable = [
        'name', 'description', 'adress','ca_states_id','telephones','internet_adress','email','cms_users_id','status'
    ];
    public function subcategorias(){
        return $this->belongsToMany(Subcategory::class,"ca_contactos_subcategorias","ca_contactos_id","ca_subcategorias_id");
        
    }
    public function comments(){
        return $this->hasMany(Comment::class, "ca_contactos_id");
        
    }
    public function states(){
        return $this->belongsTo(State::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class,"cms_users_id","id");
    }
    public function rating(){
        return $this->hasOne(Comment::class, "ca_contactos_id");
        
    }
    
    public function scopeName($query, $flag) {
        if($flag!="")
        return $query->where('name','like', '%'.$flag.'%');
    }
     public function scopeSubcategory($query, $flag,$categoria) {
         if($flag!="")
         return $query->whereHas('subcategorias',function($q) use ($flag){
             $q->where("ca_subcategorias_id",$flag);
         });
         else if($categoria)
             return $query->whereHas('subcategorias',function($q) use ($categoria){
                 $q->category($categoria);
             });
     }
    public function scopeState($query, $flag) {
        if($flag!="")
        return $query->where('ca_states_id', $flag);
    }
   
    
}
