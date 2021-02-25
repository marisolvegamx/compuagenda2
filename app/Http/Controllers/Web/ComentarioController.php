<?php

namespace App\Http\Controllers\Web;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailRegister;
use App\ContactRating;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(empty($request->email_falso))
        {  $validatedData = $request->validate([
            'rating'=>'required',
            'message' => 'required|max:500'
        ]);
      //  var_dump($request->ca_contactos_id); die();
        if($request->user=="")//pongo Anónimo cono default
            $request->user="Anonimo";
         Comment::create($request->all());
         //busco el correo del contacto y su nombre
         $contacto= \App\Contact::find($request->ca_contactos_id);
         //guardo valoración
         $this->guardarRating($request->rating,$contacto->id);
         
         if($contacto)
         {    
           //  dd($contacto);
          //   dd($contacto->user->name."--". $contacto->user->email);
         //envio el comentario x correo
            $this->enviarCorreo($contacto->user->name, $contacto->user->email, $request->message, "contact/".$request->ca_contactos_id);
         }
         return redirect()->route('contact',$request->ca_contactos_id)->with('info',"Gracias por tu comentario");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coment=Comment::find($id);
        $coment->delete();
        return redirect()->route('contact',$coment->id_contacto)->with('info',"El comentario se eliminó correctamente");
        
    }
    
      public function enviarCorreo($usuario,$correo,$comentario,$ligacomentario){
     
        Mail::to($correo)->send(new MailRegister($usuario,"noticomen",null, substr($comentario,0,20),$ligacomentario));
    }
    public function guardarRating($ratingPoints,$contactId ){
        
       
        
        
        //Check the rating row with same post ID
        $rating = ContactRating::where('ca_contactos_id',$contactId)->first();
        $ratingNum=1;
        
       // dd($rating);
        if($rating&&$rating->count())
        {
            $ratingPoints = $rating->total_points + $ratingPoints;
            $ratingNum = $rating->rating_number+1;
           
            //Update rating data into the database
            $rating->rating_number=$ratingNum;
            $rating->total_points=$ratingPoints;
               
           $rating->save();
        }
        else{
        //Insert rating data into the database
            ContactRating::create(["ca_contactos_id"=>$contactId,
                "rating_number"=>$ratingNum,
                "total_points"=>$ratingPoints,"status"=>1]
                );
       
        }
       
    }

}
