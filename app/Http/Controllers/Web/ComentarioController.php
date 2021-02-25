<?php

namespace App\Http\Controllers\Web;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


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
            'email'=>'email',
            'message' => 'required|max:500'
        ]);
      //  var_dump($request->ca_contactos_id); die();
        if($request->user=="")//pongo Anónimo cono default
            $request->user="Anonimo";
         Comment::create($request->all());
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
}
