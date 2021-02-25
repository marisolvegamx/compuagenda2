<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Subcategory;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    //
    public function __construct(){
        
    }
    public function catsubcat(Request $request){
     
        if($request->post("parentval")&&$request->post("parentval")!=""){
            //busco las subcategorias
            $subcategorias=Subcategory::where("ca_categorias_id",$request->post("parentval"))->orderBy("name")->get();
          //  $subcategorias=Category::where("id",$request->post("parentval"))->orderBy("name")->get();
          
           // var_dump($subcategorias);
            if($request->post("tipo")=="edit"){
              //  $request->session()->regenerate();
                //busco las subcategorias del contacto
                $id=$request->post("idcontacto");
               $consubcategorias=DB::table('ca_contactos_subcategorias')->where('ca_contactos_id', '=', $id)->pluck("ca_subcategorias_id");
                foreach($subcategorias as $tag){
                    //veo si ya está activada
                    $check="false";
                     foreach($consubcategorias as $subcat){
                      
                        if($tag->id==$subcat)
                            //ya la tiene
                            $check="checked";
                    }
                    //armo el checkbox o el select
                    echo '<div > <label>
        		<input type="checkbox" name="subcategorias[]" value="'.$tag->id.'" id="subcategory_'.$tag->id.'" '.$check.'>'.$tag->name.'
               </label></div>';
                }
            }
            if($request->post("tipo")=="check"){
                
            
            foreach($subcategorias as $tag){
                //armo el checkbox o el select
              echo '<div>  <label>
        		<input type="checkbox" name="subcategorias[]" value="'.$tag->id.'" id="subcategory_'.$tag->id.'">'.$tag->name.'
               </label></div>';
            }
            }
            if($request->post("tipo")=="sel"){
              
                echo '<option value="">- Todas -</option>';
                foreach($subcategorias as $tag){
                    //armo el checkbox o el select
                    echo ' 
        		<option value="'.$tag->id.'" >'.$tag->name.'
               </option>';
                }
            }
            
        }
     }
}
