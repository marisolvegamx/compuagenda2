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


$("#category").change(function(){
 cargaContenidoCombo($(this).val(),"subcategory","comboboxcat-subcat","edit",{{ $contacto_id }});
});
	});

</script>

@endsection
 @section('content')
 

			<div class="panel panel-default">
				<div class="panel-heading">
	<h3>Agregar categoría</h3>
	</div>
		<form method="post" action="{{CRUDBooster::mainpath('editsubcategory')}}">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		
				<input type="hidden" name="contacto"  value="{{$contacto_id}}">
	<div class="panel-body">
<div class="form-group">
			<label>Categoria*</label>
			<select name="category" id="category" class='form-control' placeholder="Selecciona la categoría" required>
				<option value=""  >Seleccione una subcategoría</option>
			@foreach($categorias as $edo)
			
			<option value="{{$edo->id}}"  >{{$edo->name}}</option>
			@endforeach
			</select>
	
		</div>
		

		<div class="form-group">
				<label>Etiquetas*</label>
				
		
		
		
		<div id="subcategory">
	</div>
	
		</div>
</div>
		<div class="panel-footer">
<button type="submit" class=" btn btn-primary">Guardar</button>
</div>

</form>
</div>
@endsection