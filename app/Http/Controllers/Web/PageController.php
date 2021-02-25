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
            $queries = DB::getQueryLog();
          //  var_dump($queries);
            return view('home',compact('categorias','estados','subcategorias','contacts')); //carpeta.archiv
        }else {
            return view('home',compact('categorias','estados'))->with("notification","No se encontraron contactos con esa busqueda, prueba otra"); //carpeta.archiv
            
            ;
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
	  //  var_dump($comentarios); die();
// 		echo $contact->categorias;
		return view('web.contact',compact('contact',"comentarios"));
	}
	
	public function category($slug){
	
		$categoria=Category::where('slug',$slug)->pluck('id')->first();//solo quiero el id
		$contacts=Contact::whereHas('subcategorias',function($q) use ($subcategoria){
		    $q->category($categoria);
		})->orderBy('id')->where('status','1')->paginate(10);
		return view('web.contacts',compact('contacts'));
		
	}
	public function subcategory($slug){
	    $subcategoria=Subcategory::where('slug',$slug)->pluck('id')->first();//solo quiero el id
	   
	    if($subcategoria!=null)
	    $contacts=Contact::subcategory($subcategoria,null)
		->orderBy('id')->where('status','1')->paginate(10);
		
		return view("web.contacts",compact("contacts"));
		
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
	        $msj->from("contacto@innovacionenti.com", "Contacto tecnológico");
	        //   $msj->send();
	    });
	}
}
