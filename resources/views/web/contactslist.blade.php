

 @if($contacts&&$contacts->count()>0)
	<h2>Contactos</h2>
	@foreach($contacts as $contact)
 <article class="entry">

            <img src="{{asset('img/avatar.png')}}" class="rounded-circle float-left" alt="">
              

              <h2 class="entry-title">
	{{$contact->name}}</h2>
	  <div class="entry-content">
                <p>
	
	{{substr($contact->description,0,150)}}...</p>
	 <div class="read-more">
	<a href="{{route('contact',$contact->id)}}"  class="btn-sm btn-primary">Leer más</a>
	</div>
	</div>
	</article>
	@endforeach
	{{$contacts->render()}}
	
          @endif
        @if(!empty($notification))
	 <div class="row">
        <div class="col-md-12">
        <div class="alert alert-danger">
        <ul>
        <li>{{ $notification }}</li>
      </ul>
        </div></div>
        </div>
      
	@endif
