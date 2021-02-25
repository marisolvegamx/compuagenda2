<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailRegister extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    private $opcion;
    private $paginahtml;
    private $ligacomentario;
    private $comentario;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $opcion,$correo=null, $comentario=null,$ligacomentario=null)
    {
       $this->name=$name;
       $this->opcion=$opcion;
       $this->paginahtml=$correo;
       $this->ligacomentario=$ligacomentario;
       $this->comentario=$comentario;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->opcion=="regusu")
        return $this->subject("Hemos recibido tu registro a contactotecnologico.com")->from("servicioaclientes@contactotecnologico.com ","Contacto Tecnologico")
        ->view('correos.correoregistro')->with(["nombre"=>$this->name]);
          if($this->opcion=="noticomen")
        return $this->subject("Comentarios en tu perfil")->from("servicioaclientes@contactotecnologico.com ","Contacto Tecnologico")
        ->view('correos.avisocomentario')->with(["nombre"=>$this->name,"comentario_inicio"=>$this->comentario,"ligacoment"=>$this->ligacomentario]);
        
                   
    }
}
