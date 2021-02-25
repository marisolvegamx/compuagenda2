@extends('layouts.blogmode')
@section('content')

	<div class="col md-offset-2">
            <p>Se muestran los resultados para <i>{{$slugvisible}}</i> </p>
@include("web.contactslist")
	</div>
	
@endsection

