<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Http\Requests\MyregisterRequest;
use App\Contact;
use App\User;
use App\Mail\MailRegister;

class RegisterController extends Controller
{
    //
    public function __construct(){
    
    }
    
    public function register(MyregisterRequest $request){
        //creo primero el usuario
        
      $usuario= User::create(["name"=>$request->nameusu,"email"=>$request->emailusu,"status"=>0]);
        
//        $usuario= DB::insert("INSERT INTO `cms_users`
//              (
//               `name`,
            
//              `email`,
//                          `created_at`,
            
//               `status`)
//  VALUES (:name,
       
//          :email,
      
//         NOW(),
     
//          0)",["name"=>$request->nameusu,"email"=>$request->emailusu]);

       //creo el contacto
      $contacto=Contact::create(
         [ 'name'=>$request->name,
          'description'=>$request->description,
          'adress'=>$request->adress,
          
          'telephones'=>$request->telephone,
           'internet_adress'=>$request->internet_address,
          'ca_states_id'=>$request->state,
          'email'=>$request->email,
        
          'cms_users_id'=>$usuario->id,
          'status'=>0,
          'created_at'=>date("y-m-d h:m:s")]);
         //para las etiquetas
         $contacto->subcategorias()->sync($request->get('subcategorias'));
         //envio correos
         $this->enviarCorreo($request->emailusu,$request->name);
         $this->enviarCorreoAdmin($request->nameusu, $request->emailusu, $contacto->id);
         return view("web.resregister");
         
    }
    
    public function enviarCorreoAdmin($usuario, $correo,$empresa){
        $subject="Registro pendiente de contactotecnologico";
        $to="marisolvegamx@hotmail.com";
         $data = array("usuario"=>$usuario,"correo"=>$correo,"empresa"=>$empresa);
        Mail::send("correos.avisoadmin",$data,function($msj) use ($subject,$to){
            $msj->subject($subject);
            $msj->to($to);
            $msj->from("servicioaclientes@contactotecnologico.com", "Contacto tecnologico");
         //   $msj->send();
        });
    }
//     public function enviarCorreo($usuario){
        
//         Mail::to($usuario)->send(new MailRegister($usuario));
//     }
    
    public function enviarCorreo($usuario,$correo){
     
        Mail::to($correo)->send(new MailRegister($usuario,"regusu"));
    }
    
    public function result(){
        return view('home');
    }
}
