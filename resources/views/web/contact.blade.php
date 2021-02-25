@extends('layouts.app')
@section('content')

	  <article class="entry entry-single">

             

              <h2 class="entry-title">
    	{{$contact->name}}
    	</h2>
    	
	
     <div class="entry-content">
                <p>
    	{{ $contact->description }}
    	</p>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">  <i class="icofont-home"></i>Dirección: {{ $contact->adress }}</li>
        <li class="list-group-item"><i class="icofont-google-map"></i>Estado: {{ $contact->states->name }}</li>
        <li class="list-group-item"><i class="icofont-phone"></i>Teléfonos: {{ $contact->telephones }}</li>
          <li class="list-group-item"><i class="icofont-web"></i>Dirección de internet: {{ $contact->internet_adress }}</li>
       
        <li class="list-group-item">Contacto: {{ $contact->email }}</li>
        </ul>
        </div>
          <div class="entry-footer clearfix">
           <div class="float-left">
          Especialidades:
          @foreach($contact->subcategorias as $tag)
   
        <a href="{{route('tag',$tag->slug)}}" class="card-link">   <i class="icofont-tags"></i>
<!--         <span class="badge badge-danger"> -->
        {{$tag->name}}</a>
         <a href="{{route('category',$tag->ca_categorias_id)}}" class="card-link">{{$tag->pivot->categories}}x</a>
      		@endforeach
      </div>
      	
	</div>
	</article>
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
