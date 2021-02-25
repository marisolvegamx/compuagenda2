<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="directorio de empresas y personas que ofrecen servicios y productors de sistemas computacionales y tecnologias de información">
<!--  este es el template -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
<script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.js"></script>
  
     @yield('scripts')

     <!-- Styles -->
      <link href="{{ asset('/css/blog-home.css')}}" rel="stylesheet">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div id="app">
    <div class="section" id="b-section-header" name="Header"><div class="widget Header" data-version="2" id="Header1">
<div class="header image-placement-behind no-image">
<div class="container">
<h1><a href="">Contacto tecnológico</a></h1>
<p>Directorio de empresas y personas que brindan servicios de computación, sistemas y tecnologías de información</p>
</div>
</div>
</div></div>
 <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #f53f1a;">
      <div class="container">
        <span class="navbar-brand" >   {{ config('app.name', 'Compuagenda') }}</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/') }}">Inicio
                <span class="sr-only">(current)</span>
              </a>
            </li>
               <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ asset('admin/login') }}">{{ __('Iniciar sesión') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('registerform') }}">{{ __('Registro') }}</a>
                                </li>
                            @endif
                        @else
             <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
<!--              <li class="nav-item"> -->
<!--               <a class="nav-link" href="#">Preguntas frecuentes</a> -->
<!--             </li> -->
            <li class="nav-item">
              <a class="nav-link" href="{{asset('sugerencias')}}">Contacto</a>
            </li>
			
          </ul>

        </div>
      </div>
    </nav>
	
	
	

    
    

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

         
        <main class="py-4">
        @if(session("info"))
        <div class="container">
        <div class="row">
        <div class="col-md-12">
        <div class="alert alert-success">{{ session("info") }}</div></div>
        </div>
        </div>
        @endif
        @if(count($errors))
         <div class="container">
        <div class="row">
        <div class="col-md-12">
        <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </div></div>
        </div>
        </div>
        @endif
            @yield('content')
        </main>
    </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Publicidad</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-3">
            <h5 class="card-header">Categorias más buscadas</h5>
            <div class="card-body">
              <div class="row" style="font-size:14px">
           
              @if(!empty($arreglocat))
               
              @foreach ($arreglocat as $itemcat)
              @if (!empty($itemcat[0]))
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                  @foreach($itemcat as $cat)
                    <li>
                      <a href="{{asset('etiqueta/'.$cat->slug)}}">{{$cat->name}}</a>
                    </li>
                   @endforeach
                  </ul>
                </div>
                @endif
                @endforeach
              @endif
              </div>
            </div>
          </div>

         
       
        
        </div>
          
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!--footer-->
<footer class="kilimanjaro_area">
        <!-- Top Footer Area Start -->
        <div class="foo_top_header_one section_padding_100_70">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="kilimanjaro_part">
                            <h5>¿Quiénes somos?</h5>
                            <p>{{ $compuagenda }} es un directorio que agrupa las empresas y particulares mexicanos que ofrecen servicios y productos relacionados con sistemas computacionales y tecnologías de información</p>
                            <p>para poner al alcance de los usuarios una referencia y rápida forma de encontrar algun prestador de servicio o vendedor de productos cuando lo requiera.</p>
                        </div>
                     
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="kilimanjaro_part">
                            <h5>Categorias</h5>
                            <ul class=" kilimanjaro_widget">
                                <li><a href="{{asset('etiqueta/seguridad-informacion-redes')}}">Seguridad de información y redes</a></li>
                                <li><a href="{{asset('etiqueta/e-commerce')}}">e-commerce</a></li>
                                <li><a href="{{asset('etiqueta/accesorioseinsumos')}}">Accesorios e insumos</a></li>
                                <li><a href="{{asset('etiqueta/desarrollo-software')}}">Desarrollo de software</a></li>
                                <li><a href="{{asset('etiqueta/capacitacion')}}">Capacitación y entrenamiento</a></li>
                                <li><a href="{{asset('etiqueta/disenioweb')}}">Diseño web</a></li>
                              
                            </ul>
                        </div>

                        <div class="kilimanjaro_part m-top-15">
                            <h5>Ligas de interés</h5>
                            <ul class="kilimanjaro_links">
                                                            
                                <li><a href="{{asset('sugerencias')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>Ayuda y soporte</a></li>
                               
                                <li><a href="{{asset('privacidad')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>Política de privacidad</a></li>
                               
                            </ul>
                        </div>
                    </div>
                   
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="kilimanjaro_part">
                            <h5>Contacto</h5>
                            <div class="kilimanjaro_single_contact_info">
                                <h5>Telefono:</h5>
                                <p>55-7349-35-29 <br> </p>
                            </div>
                            <div class="kilimanjaro_single_contact_info">
                                <h5>Email:</h5>
                                <p><a href="mailto:soporte@compuagenda.com">soporte@compuagenda.com</a> <br> </p>
                            </div>
                        </div>
                  
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom Area Start -->
        <div class=" kilimanjaro_bottom_header_one section_padding_50 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p>© Derechos reservados<i class="fa fa-love"></i></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>	

 
</body>
</html>
