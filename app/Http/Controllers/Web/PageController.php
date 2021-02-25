<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Contact;
use App\State;
use App\Category;
use App\Subcategory;

class PageController extends Controller
{
    //
    public function index(Request $request){
      //cargo categorias
        $categorias=Category::orderBy('name')->pluck("name","id");
      //cargo estados
        $estados=State::orderBy('name')->pluck("name","id");
        
        
     
    //    $subcategorias=Subcategory::orderBy('name')->pluck("name","id");
      
             return view('home',compact('categorias','estados'));
        
    }
    
    public function search(Request $request){
        //cargo categorias
        $categorias=Category::orderBy('name')->pluck("name","id");
        //cargo estados
        $estados=State::orderBy('name')->pluck("name","id");
        
        
        
        //    $subcategorias=Subcategory::orderBy('name')->pluck("name","id");
        $nombre = $request->post('name');
        
        // $city = $request->post('city');
        $state = $request->post('state');
        
        $categoria = $request->post('categoria');
        $subcategoria = $request->post('subcategoria');
        DB::connection()->enableQueryLog();
        
        if($nombre||$categoria||$subcategoria||$state){
            
            $contacts=Contact::orderBy('id')->where('status','1')->name($nombre)->state($state)
            ->subcategory($subcategoria,$categoria)
            ->paginate(10);
          //  $queries = DB::getQueryLog();
          //  var_dump($queries);
         if($contacts->count())
            return view('web.contacts',compact('categorias','estados','subcategorias','contacts')); //carpeta.archiv
         else
              return view('home',compact('categorias','estados','subcategorias','contacts'))->with("notification","No se encontraron resultados con esa búsqueda. Prueba buscar por otros filtros"); //carpeta.archiv
            
                
        }
    }
    public function register(Request $request){
        //cargo categorias
        $categorias=Category::orderBy('name')->pluck("name","id");
        //cargo estados
        $estados=State::all()->pluck("name","id");
        $subcategorias=Subcategory::orderBy('name')->pluck("name","id");
   
        return view('web.register',compact('categorias','estados','subcategorias')); //carpeta.archiv
    }
	
	
	public function contact($slug){
		
	    $contact=Contact::where('id',$slug)->where('status','1')->first();
	    $subcategorias=$contact->subcategorias;
// 	    foreach($subcategorias as $cat){
// 	        $catego[]=Subcategory;
// 	        echo "<br>*******".$catego."<br>";
// 	        var_dump($catego->name);
// 	    }
// 	    var_dump($subcategorias); die();
	    $comentarios=$contact->comments;
	    //busco su calificacion
	    $query = "SELECT rating_number, FORMAT((total_points / rating_number),1) as average_rating 
FROM ca_contactos_rating WHERE ca_contactos_id =".$contact->id."  AND status = 1";
	    $rating=DB::table("ca_contactos_rating")->select(DB::raw("rating_number, FORMAT((total_points / rating_number),1) as average_rating "))
	                                           ->where([["ca_contactos_id",$contact->id],["status",1]])->get();
        foreach($rating as $rat){
            $average_rating= $rat->average_rating;
            $rating_number=$rat->rating_number;
        }
	  //  var_dump($comentarios); die();
// 		echo $contact->categorias;
		return view('web.contact',compact('contact',"comentarios","average_rating", "rating_number"));
	}
	
	public function category($slug){
	
		$categoria=Category::where('slug',$slug)->first();//solo quiero el id
                $id=$categoria->id;
		$contacts=Contact::whereHas('subcategorias',function($q) use ($id){
		    $q->category($id);
		})->orderBy('id')->where('status','1')->paginate(10);
                  $slugvisible=$categoria->name;
		return view('web.contacts',compact('contacts','slugvisible'));
		
	}
	public function subcategory($slug){
	    $subcategoria=Subcategory::where('slug',$slug)->first();//solo quiero el id
	   
	    if($subcategoria->id!=null)
	    $contacts=Contact::subcategory($subcategoria->id,null)
		->orderBy('id')->where('status','1')->paginate(10);
	    $slugvisible=$subcategoria->name;
		return view("web.contacts",compact("contacts","slugvisible"));
		
	}
	
	public function sugerencias(Request $request){
	    if(isset($request->email)&&empty($request->email_falso)){
	        $request->validate([
	            'email' => 'required|email|max:100',
	            'mensaje' => 'required|max:500'
	           
	        ]);
	        $this->enviarSugerencia($request->email,filter_var( $request->mensaje,FILTER_SANITIZE_SPECIAL_CHARS));
	   return view("web.mensajecontacto")->with("notification","Gracias! En breve recibirás una respuesta a tu correo");
	    }
	    else
	    return view("web.mensajecontacto");
	}
	
	public function enviarSugerencia( $correo, $mensaje){
	   
	    $subject="Sugerencias dudas y comentarios";
	    $to="marisolvegamx@hotmail.com";
	    $data = array("correo"=>$correo,"mensaje"=>$mensaje);
	    Mail::send("correos.sugerencia",$data,function($msj) use ($subject,$to){
	        $msj->subject($subject);
	        $msj->to($to);
	        $msj->from("servicioaclientes@contactotecnologico.com", "Contacto tecnológico");
	        //   $msj->send();
	    });
	}
}
