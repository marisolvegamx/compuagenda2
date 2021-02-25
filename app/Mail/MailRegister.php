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
    private $corre;
    private $empresa;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $opcion,$correo=null, $empresa=null)
    {
       $this->name=$name;
       $this->opcion=$opcion;
       $this->correo=$correo;
       $this->empresa=$empresa;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->opcion=="regusu")
        return $this->subject("Hemos recibido tu registro a contactotecnologico.com")->from("contacto@innovacionenti.com")
        ->view('correos.correoregistro')->with(["nombre"=>$this->name]);
        
                   
    }
}
