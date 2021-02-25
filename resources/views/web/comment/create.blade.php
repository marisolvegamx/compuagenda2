

   @if(session("info"))
       
      <div class="row">

          <div class="col-lg-12">
        <div class="alert alert-success">{{ session("info") }}</div>
        </div></div>
        @endif
        @if(count($errors))
       
        <div class="row">
        <div class="col-md-12">
        <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </div></div>
        </div>
        
        @endif
 
              
 <div class="reply-form" id="reply-form">
                <h4>¿Tiene algún comentario sobre {{$contact->name}}?<br> Sus comentarios ayudan a otros usuarios</h4>
                <p>Su correo electrónico no será publicado. Los campos marcados con * son obligatorios </p>
              	{!! Form::open(["route"=>"comments.store","id"=>"formcoment","name"=>"formcoment"]) !!}
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
                    <div class="col-md-6 form-group">
                 {{ Form::label('','Su valoración*') }}

<p class="clasificacion">
    <input id="iradio1" type="radio" name="rating" value="5" data-msg="Please fill this field"  ><!--
    --><label for="iradio1">★</label><!--
    --><input id="iradio2" type="radio" name="rating" value="4" data-msg="Please fill this field"><!--
    --><label for="iradio2">★</label><!--
    --><input id="iradio3" type="radio" name="rating" value="3" data-msg="Please fill this field"><!--
    --><label for="iradio3">★</label><!--
    --><input id="iradio4" type="radio" name="rating" value="2" data-msg="Please fill this field"><!--
    --><label for="iradio4">★</label><!--
    --><input id="iradio5" type="radio" name="rating" value="1" data-msg="Please fill this field"><!--
    --><label for="iradio5">★</label>
    <div id="consolaerror" class="alert-danger"> </div>
  </p>
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

         