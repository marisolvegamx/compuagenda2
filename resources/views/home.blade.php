@extends('layouts.app')
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
 cargaContenidoCombo($(this).val(),"subcategory","comboboxcat-subcat","sel");
});
	});

</script>

@endsection
@section('content')<div class="col md-offset-2">
       <p>Directorio de empresas y personas que brindan servicios de computación, sistemas y tecnologías de información</p>
    
       
  <h1 class="my-4">Buscar
       
          </h1>
          <p>Utiliza el siguiente buscador para encontrar un contacto por categoría, estado o directamente por su nombre</p>
	<!-- los filtros -->
		{!! Form::open(["route"=>"search","method"=>"POST"]) !!}
	<div class="form-group">
	{{ Form::label('name','Nombre') }}
	{{ Form::text('name',null,['class'=>'form-control','id'=>'name']) }}
	
</div>
	<div class="form-group">
	{{ Form::label('categoria','Categorias') }}
	{{ Form::select('categoria', $categorias,null,['class'=>'form-control','placeholder' => 'Todas',"id"=>"category"]) }}
	
</div>
<div class="form-group">
	{{ Form::label('subcategoria','Subcategorias') }}
	<select name='subcategoria' class='form-control' placeholder='Seleccione la categoría primero' id="subcategory"></select>
	
</div>
<div class="form-group">
	{{ Form::label('state','Estado') }}
	{{ Form::select('state',$estados,null,['class'=>'form-control','placeholder' => 'Todas']) }}
	
</div>

	<div class="form-group">
	{{ Form::submit('Buscar',['class'=>'btn btn-lg btn-danger']) }}
	
</div>
{!! Form::close()!!}
</div>
@include("web.contactslist")
	
@endsection


