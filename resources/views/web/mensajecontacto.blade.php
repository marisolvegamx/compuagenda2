@extends('layouts.blogmode')
@section('scripts')

  
<script type="text/javascript">
$(document).ready(function(){
	
$("#formcoment").submit(function(){
	
        if(!document.getElementById("email-falso").value) {
            
            return true;
        } //si no existe nada de contenido en el input falso, entonces se envía
        else 
            {
            console.log("detuve un spam");
            return false;
       } //si existe, entonces es que es un bot quien intenta completarlo, por lo que no hacemos nada
   });

	});

</script>

@endsection
@section('content')

	<div class="col md-offset-2">
	<h2>Contáctanos</h2>
	<div class="card ">
    	<div class="card-header">
    	
    	Tienes alguna duda, comentario o sugerencia. Será un gusto saber de ti
    	
    	</div>
	
    	<div class="card-body">
    	
 @if(!empty($notification))
	 <div class="row">
        <div class="col-md-12">
        <div class="alert alert-success">
        <ul>
        <li>{{ $notification }}</li>
      </ul>
        </div></div>
        </div>
        @endif
    		{!! Form::open(["route"=>"sugerencias","method"=>"post","id"=>"formcoment"]) !!}
	
		
		<div class="form-group">
		    {{ Form::text('email_falso',null,['style'=>"display:none","id"=>"email-falso"]) }}
			{{ Form::label('email','Correo Electr&oacute;nico*') }}
			{{ Form::email("email",null,["class"=>"form-control", "maxlenght">=50,"id"=>"email","required"=>"true"])}}
	</div>
	
	
<div class="form-group">
{{ Form::label('mensaje','Mensaje*') }}
			{{ Form::textarea("mensaje",null,["class"=>"form-control", "id"=>"mensaje",'rows' => 3, 'cols' => 40,"required"=>"true"])}}
			
</div>
      </div>
    	
    	<div class="card-footer">
    	{{ Form::submit('Enviar',['class'=>'submit btn btn-danger']) }}
    	</div>
    
    	
    	
    	
    
    	
	</div>
	</div>
	
@endsection
