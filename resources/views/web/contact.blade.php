@extends('layouts.blogmode')
@section('scripts')



  <script src="{{ asset('/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
	
$("#formcoment").submit(function(){
	 //valido los radio button
   var radios = document.formcoment.rating, i;
   
   
   console.log(radios.length);
    for (i=0; i<radios.length; i++) {
    console.log(radios[i].value);
    console.log(radios[i].checked);
    
      if (radios[i].checked) {
        return true;
      }
     
  }
   console.log("hola validando");
      $("#consolaerror").focus();
      $("#consolaerror").text("Campo requerido, ayuda a los demás usuarios con tu valoración");
    return false;
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
<script type="text/javascript">

$(document).ready(function(){
    $('input.star').on('click', function(){
        var postID = 1;
        var ratingNum = $(this).val();
		processRating(ratingNum, attrVal);
});
});

function processRating(val, postID){
    $.ajax({
        type: 'POST',
        url: 'rating',
        data: 'contactID='+attrVal+'&ratingPoints='+val,
        dataType: 'json',
        success : function(data) {
            if (data.status == 'ok') {
                alert('Ha dado '+val+'puntos');
                $('#avgrat').text(data.average_rating);
                $('#totalrat').text(data.rating_number);
            }else{
                alert('Some problem occured, please try again.');
            }
        }
    });
}
</script>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="{{ asset('css/rating.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')

	  <article class="entry entry-single">

             

              <h2 class="entry-title">
    	{{$contact->name}}
    	</h2>
    	
	
     <div class="entry-content">
                <div >
    	<?php echo nl2br($contact->description)?>
       
    	</div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">  <i class="bi bi-house-fill"></i>Dirección: {{ $contact->adress }}</li>
        <li class="list-group-item"><i class="bi bi-geo-alt-fill"></i>Estado: {{ $contact->states->name }}</li>
        <li class="list-group-item"><i class="bi bi-telephone-fill"></i>Teléfonos: {{ $contact->telephones }}</li>
          <li class="list-group-item"><i class="bi bi-globe"></i>Dirección de internet: {{ $contact->internet_adress }}</li>
       
        <li class="list-group-item">Contacto: {{ $contact->email }}</li>
        </ul>
        </div>
          <div class="entry-footer clearfix">
           <div class="float-left">
          Especialidades:
          @foreach($contact->subcategorias as $tag)
   <a href="{{route('category',$tag->categories->slug)}}" class="card-link"> <i class="bi bi-folder-fill"></i>{{$tag->categories->name}}</a>
      	
        <a href="{{route('tag',$tag->slug)}}" class="card-link">   <i class="bi bi-tags-fill"></i>
<!--         <span class="badge badge-danger"> -->
        {{$tag->name}}</a>
        	@endforeach
      </div>
      	
	</div>
	
	</article>
	<input name="rating" value="0" id="rating_star" type="hidden" postID="1" />
	<div class="row">
<div class="col-sm-3 overall-rating">
 <p class="evaluacion">
    <input id="radio1" type="radio" name="estrellas" value="5" {{ ($average_rating>= 5.0)?'checked':''}} disabled="true" ><!--
    --><label for="radio1"  {{ ($average_rating>= 5.0)?'style=color:orange;':'' }} >★</label><!--
    --><input id="radio2" type="radio" name="estrellas" value="4" {{ ($average_rating>= 4.0)?'checked':''}} disabled="true"><!--
    --><label for="radio2" {{ ($average_rating>= 4.0)?'style=color:orange;':'' }} >★</label><!--
    --><input id="radio3" type="radio" name="estrellas" value="3" {{ ($average_rating>= 3.0)?'checked':''}} disabled="true"><!--
    --><label for="radio3" {{ ($average_rating>= 3.0)?'style=color:orange;':'' }} >★</label><!--
    --><input id="radio4" type="radio" name="estrellas" value="2" {{ ($average_rating>= 2.0)?'checked':''}} disabled="true"><!--
    --><label for="radio4"  {{ ($average_rating>= 2.0)?'style=color:orange;':'' }}>★</label><!--
    --><input id="radio5" type="radio" name="estrellas" value="1" {{ ($average_rating>= 1.0)?'checked':''}} disabled="true"><!--
    --><label for="radio5" {{ ($average_rating>= 1.0)?'style=color:orange;':'' }} >★</label>
     
  </p>
  </div>
  
  <div class="col-sm-8 blog-comments" style="display:inline-block;">
   <a href="#reply-form" class="btn-primary animate__animated animate__fadeInUp scrollto">Valorar</a>
  </div>
  </div>
  <div>
    (Evaluación promedio <span id="avgrat"> {{ $average_rating}} </span> Basado en  <span id="totalrat">{{ $rating_number }}</span>  evaluaciones)
            
</div>
	@if(!empty($comentarios))
	<div class="blog-comments">

              <h4 class="comments-count">{{sizeof($comentarios)}} comentarios</h4>
	  @foreach($comentarios as $comment)
			@include("web.comment.list")
	@endforeach
	 </div>
	@endif
	@include("web.comment.create")
	
@endsection
