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
  
 <div class="reply-form">
                <h4>¿Tienes algún comentario sobre {{$contact->name}}?</h4>
                <p>Su correo electrónico no será publicado. Los campos marcados con * son obligatorios </p>
              	{!! Form::open(["route"=>"comments.store","id"=>"formcoment"]) !!}
                  <div class="row">
                    <div class="col-md-6 form-group">
                     {{ Form::text('email_falso',null,['style'=>"display:none","id"=>"email-falso"]) }}
                    {{ Form::hidden('ca_contactos_id',$contact->id,['class'=>'form-control']) }}
                    {{ Form::label('user','Su nombre') }}
					{{ Form::text('user',null,['class'=>'form-control','id'=>'user']) }}
                    
                    </div>
                    <div class="col-md-6 form-group">
                    {{ Form::label('email','Su correo electrónico') }}
					{{ Form::text('email',null,['class'=>'form-control','id'=>'email']) }}
                    
                    </div>
                  </div>
                 
                 
                  <div class="row">
                    <div class="col form-group">
                    {{ Form::label('message','Comentario*') }}
					{{ Form::textarea('message',null,['class'=>'form-control','required'=>'true']) }}
                   
                    </div>
                  </div>
                	{{ Form::submit('Enviar comentario',['class'=>'btn btn-primary']) }}

              	{!! Form::close() !!}

              </div>

         