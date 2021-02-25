@extends('layouts.blogmode')
@section('scripts')

<style type="text/css">
  .container fieldset:not(:first-of-type) {
    display: none;
  }
</style>
 <script src="{{asset('js/miscellanius.js')}}"></script>
  
<script type="text/javascript">
var bPreguntar = true;

	
	
$(document).ready(function(){
	
	$("form").submit(function(){
		
        if(!document.getElementById("email-falso").value) {
            
            return true;
        } //si no existe nada de contenido en el input falso, entonces se envía
        else 
            {
            console.log("detuve un spam");
            return false;
       } //si existe, entonces es que es un bot quien intenta completarlo, por lo que no hacemos nada
  

	});
	var current = 1,current_step,next_step,steps;
	steps = $("fieldset").length;
	$(".next").click(function(){
	current_step = $(this).parent();
//alert(current_step.attr('id') );
 
    if(validar($("form"),current_step.attr('id'))){


	next_step = $(this).parent().next();
	next_step.show();
	current_step.hide();
	setProgressBar(++current);
    }
    else
        return;
	});
	$(".previous").click(function(){
	current_step = $(this).parent();
	next_step = $(this).parent().prev();
	next_step.show();
	current_step.hide();
	setProgressBar(--current);
	});
	setProgressBar(current);
	// Change progress bar action
	function setProgressBar(curStep){
	var percent = parseFloat(100 / steps) * curStep;
	percent = percent.toFixed();
	$(".progress-bar")
	.css("width",percent+"%")
	.html(percent+"%");
	}
	if($("#category").val()>0)
	{//ya se habia seleccionado
		 cargaContenidoCombo($("#category").val(),"subcategory","comboboxcat-subcat","check");
	}
$("#category").change(function(){
 cargaContenidoCombo($(this).val(),"subcategory","comboboxcat-subcat","check");
});


window.onbeforeunload = preguntarAntesDeSalir;
 
function preguntarAntesDeSalir()
{
  if (bPreguntar)
    return "Estas dejando la página sin guardar tu información, ¿Estás seguro?";
}
	});

</script>

@endsection
 @section('content')
 
			<div class="panel panel-default">
				<div class="panel-heading">
	<h3>Aparecer en nuestro directorio es completamente gratis!! Sólo tienes que proporcionar la siguiente información</h3>
	</div>
	<div class="panel-body">
	<div class="progress">
		<div class="progress-bar progress-bar-striped active"
			role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
	</div>
	{!! Form::open(["route"=>"myregister","method"=>"post"]) !!}
	<fieldset id="fil1" style="margin-top:2em">
		<h2>Paso 1: Crear tu cuenta</h2>
			<div style="margin-bottom:2em">
		<span style="color: #6b7b8d">Los campos marcados con * son obligatorios</span></div>
		<div class="form-group">
			{{ Form::label('nameusu','Nombre*') }}
			{{ Form::text("nameusu",null,["class"=>"form-control", "id"=>"nameusu","placeholder"=>"Nombre", "required"=>"true"])}}
			 {{ Form::text('email_falso',null,['style'=>"display:none","id"=>"email-falso"]) }}	
		</div>
		<div class="form-group">
			{{ Form::label('emailusu','Correo Electr&oacute;nico*') }}
			{{ Form::text("emailusu",null,["class"=>"form-control", "id"=>"emailusu","placeholder"=>"Email"])}}
	</div>
	
	
				{{ Form::button('Siguiente',['class'=>'next btn btn-info']) }}

	</fieldset>
<fieldset  id="fil2" style="margin-top:2em">
<h2> Paso 2: Agregar detalle de la empresa o profesional</h2>	<div style="margin-bottom:2em">	<span style="color: #6b7b8d">Los campos marcados con * son obligatorios</span>
		</div>
<div class="form-group">
{{ Form::label('name','Nombre de empresa o persona*') }}
			{{ Form::text("name",null,["class"=>"form-control", "id"=>"name","placeholder"=>"Nombre de empresa o persona","required"=>"true"])}}
			
</div>
<div class="form-group">
{{ Form::label('description','Descripción* (Detalla lo más posible tus labores, especialidades y experiencia)') }}
			{{ Form::textarea("description",null,["class"=>"form-control", "id"=>"description"])}}
			
</div>
<div class="form-group">
{{ Form::label('address','Dirección*') }}
			{{ Form::text("adress",null,["class"=>"form-control", "id"=>"address","placeholder"=>"Dirección", "required"=>"true"])}}
			
</div>
<div class="form-group">
			{{ Form::label('state','Estado*') }}
			{{ Form::select('state',$estados,null,['class'=>'form-control',"placeholder"=>"Selecciona el estado","required"=>"true"]) }}
	
		</div>
		
<div class="form-group">
{{ Form::label('telephone','Teléfonos') }}
			{{ Form::text("telephone",null,["class"=>"form-control", "id"=>"telephone","placeholder"=>"Teléfono"])}}
			
</div>
<div class="form-group">
{{ Form::label('email','Correo electrónico') }}
			{{ Form::text("email",null,["class"=>"form-control", "id"=>"email","placeholder"=>"Email"])}}
			
</div>
<div class="form-group">
{{ Form::label('internet_address','Dirección de internet') }}
			{{ Form::text("internet_address",null,["class"=>"form-control", "id"=>"internet_adress","placeholder"=>"Dirección de internet"])}}
			
</div>

	<div style="margin-top:2em"></div>	

<h2>Paso 3: Especialidades y etiquetas (Estas ayudarán a los usuarios a encontrarte más fácil)</h2>

<div class="form-group">
				{{ Form::label('category','Categoria*') }}
		
			{{ Form::select('category',$categorias,null,['class'=>'form-control', "id"=>"category","placeholder"=>"Selecciona la categoría","required"=>"true"]) }}
	
		</div>
		<div class="form-group">
				<label>Etiquetas*</label> Puedes seleccionar más de una
				
		
		
		
		<div id="subcategory">
	</div></div>
	<div class="form-group">
	<p> <i class="bi bi-exclamation-circle-fill"></i>¿No está la categoría que buscas? envianos un correo y la agregamos 
	  <a  href="{{asset('sugerencias')}}" target="_blank"><i class="bi bi-envelope-fill"> </i>Contacto</a></p>
	 
		</div>
{{ Form::button('Previo',['class'=>'previous btn btn-light']) }}
{{ Form::submit('Enviar',['class'=>'submit btn btn-danger',"onclick"=>"bPreguntar = false;"]) }}

</fieldset>
{!! Form::close() !!}
</div>
</div>
@endsection