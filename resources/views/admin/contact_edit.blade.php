@extends('crudbooster::admin_template')
@section('scripts')

<style type="text/css">
  .container fieldset:not(:first-of-type) {
    display: none;
  }
</style>
 <script src="{{asset('js/miscellanius.js')}}"></script>
  
<script type="text/javascript">
$(document).ready(function(){
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
$("#category").change(function(){
 cargaContenidoCombo($(this).val(),"subcategory","comboboxcat-subcat","check");
});
	});

</script>

@endsection
 @section('content')
 

			<div class="panel panel-default">
				<div class="panel-heading">
	<h3>Editar contacto</h3>
	</div>
		<form method="post" action="{{CRUDBooster::mainpath('edit-save/'.$contact->id)}}">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="status" value="2">
	<div class="panel-body">

<div class="form-group">
<label>Nombre de empresa o persona*</label>
			<input type="text" name="name" class="form-control" id="name" placeholder="Nombre de empresa o persona" value="{{$contact->name}}" required>
			
</div>
<div class="form-group">
<label>Descripción* (Detalla lo más posible tus labores, especialidades y experiencia)</label>
			<textarea name="description" class="form-control" id="description" required>{{$contact->description}}</textarea>
			
</div>
<div class="form-group">
<label>Dirección*</label>
			<input type="text" name="adress" class="form-control" id="address" placeholder="Dirección" value="{{$contact->adress}}" required>
			
</div>
<div class="form-group">
			<label>Estado*</label>
			<select name="ca_states_id" class='form-control' placeholder="Selecciona el estado" required>
			@foreach($estados as $edo)
			
			<option value="{{$edo->id}}"  @if($contact->state->id==$edo->id) selected @endif >{{$edo->name}}</option>
			@endforeach
			</select>
	
		</div>
		
<div class="form-group">
<label>Teléfonos</label>
				<input type="text" name="telephones" class="form-control" id="telephone" value="{{$contact->telephones}}" placeholder="Teléfono">
			
</div>
<div class="form-group">
<label>Correo electrónico</label>
				<input type="text" name="email" class="form-control" id="email" placeholder="Email" value="{{$contact->email}}">
			
</div>
<div class="form-group">
<label>Dirección de internet</label>
				<input type="text" name="internet_adress" class="form-control" id="internet_adress" value="{{$contact->internet_adress}}" placeholder="Dirección de internet" >			
</div>

		<div class="panel-footer">
                     <a href="{{asset('admin/ca_contactos20')}}" class="btn btn-default">
                        <i class="fa fa-chevron-circle-left"></i> Volver</a>
<button type="submit" class=" btn btn-primary">Editar</button>
</div>
</div>

</form>
</div>
@endsection