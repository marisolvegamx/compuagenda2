<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="directorio de empresas y personas que ofrecen servicios y productos de sistemas computacionales y tecnologias de información">
     <meta content="" name="keywords">
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
     <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      <link href="{{ asset('/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
      <link href="{{ asset('/css/style.css')}}" rel="stylesheet">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
     <link href="{{ asset('/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
</head>
<body>
   
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

        <div class="logo float-left">
      <img alt="Contacto Tecnológico" src="{{ asset('/img/logo1.png') }}" height="56"></h1>
      </div>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav class="nav-menu float-right d-none d-lg-block" >
        <ul>
            <li>  <a  href="{{ url('/') }}">Inicio
                <span class="sr-only">(current)</span>
              </a>
            </li>
               <!-- Authentication Links -->
                        @guest
                            <li >
                                <a  href="{{ asset('admin/login') }}">{{ __('Iniciar sesión') }}</a>
                            </li>
                        
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
<!--              <li > -->
<!--               <a  href="#">Preguntas frecuentes</a> -->
<!--             </li> -->
            <li >
              <a  href="{{asset('sugerencias')}}">Contacto</a>
            </li>
			
          </ul>

        
    </nav>
      @guest
                          
                            @if (Route::has('registerform'))
                                
                                    <a  href="{{ route('registerform') }}"  class="get-started-btn ml-auto">{{ __('Registro gratis') }}</a>
                                
                            @endif
	@endguest
	</div>
	</header>
	 <main id="main">

     <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
        
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
	

    
    

    <!-- Page Content -->
     <!-- ======= Blog Section ======= -->
    <section class="blog" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
       <div class="container">

        <div class="row">

          <div class="col-lg-8 entries">
        @if(session("info"))
       
        <div class="row">
        <div class="col-md-12">
        <div class="alert alert-success">{{ session("info") }}</div></div>
        </div>
       
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
            @yield('content')
      
    </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

         <!-- Search Widget -->
           <div class="sidebar">

              
            <div class="sidebar-item search-form">
            <span style="text-align:center; color: #556270;">
           <h4> LOS 100 PRIMEROS REGISTROS GRATIS!!
            APROVECHA Y REGISTRATE AHORA    </h4>
            
            </span>
            <div style="text-align:center; padding-top:10px">
            <span  >
                   <a  href="{{ route('registerform') }}"  class="get-started-btn ml-auto">{{ __('Registro gratis') }}</a>
                                
                </span>
             </div>
            </div>
          </div>
          
          <!-- Categories Widget -->
           <div class="sidebar">
             <h3 class="sidebar-title"><i class="icofont-ui-search"></i>Categorias más buscadas</h3>
            <div class="sidebar-item categories">
                
           
              @if(!empty($arreglocat))
               
              @foreach ($arreglocat as $itemcat)
              @if (!empty($itemcat[0]))
               
                  <ul >
                  @foreach($itemcat as $cat)
                    <li>
                      <a href="{{asset('etiqueta/'.$cat->slug)}}">{{$cat->name}}</a>
                    </li>
                   @endforeach
                  </ul>
             
                @endif
                @endforeach
              @endif
              </div>
            </div>
          </div>

         
       
        
        </div>
          
      
      <!-- /.row -->

      </section><!-- End Blog Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
 <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-newsletter">
                            <h4>¿Quiénes somos?</h4>
                            <p>Contacto tecnológico es un directorio que agrupa las empresas y particulares mexicanos que ofrecen servicios y productos relacionados con sistemas computacionales y tecnologías de información</p>
                            <p>para poner al alcance de los usuarios una referencia y rápida forma de encontrar servicios o vendedores de productos cuando lo requiera.</p>
                        </div>
                     
                   
                    <div class="col-lg-3 col-md-6">
                
                
                            <h5>Categorias</h5>
                            <div class="sidebar-item tags">
                            <ul >
                                <li><a href="{{asset('etiqueta/seguridad-informacion-redes')}}">Seguridad de información y redes</a></li>
                                <li><a href="{{asset('etiqueta/e-commerce')}}">e-commerce</a></li>
                                <li><a href="{{asset('etiqueta/accesorioseinsumos')}}">Accesorios e insumos</a></li>
                                <li><a href="{{asset('etiqueta/desarrollo-software')}}">Desarrollo de software</a></li>
                                <li><a href="{{asset('etiqueta/capacitacion')}}">Capacitación y entrenamiento</a></li>
                                <li><a href="{{asset('etiqueta/disenioweb')}}">Diseño web</a></li>
                              
                            </ul>
                        </div>
</div>
                       <div class="col-lg-2 col-md-6 footer-links">
        
                            <h4>Ligas de interés</h4>
                            <ul>
                                                            
                                     <li><i class="bx bx-chevron-right"></i><a href="{{asset('sugerencias')}}">Ayuda y soporte</a></li>
                               
                                     <li><i class="bx bx-chevron-right"></i><a href="{{asset('privacidad')}}">Política de privacidad</a></li>
                               
                            </ul>
                        </div>
                    
                   
                     <div class="col-lg-3 col-md-6">
            <div class="footer-info">
                            <h3>Contacto</h3>
                          <p>
                               <i class="icofont-phone"></i>  <strong>Telefono:</strong>55-7349-35-29 <br> 
                          
                               <i class="icofont-envelope"> </i> <strong>Email:</strong><a href="mailto:soporte@contactotecnologico.com">soporte@contactotecnologico.com</a> <br></p> 
                            </div>
                        
                  
                 
            </div>
        </div>
        </div>
        </div>
         <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Contacto tecnológico</span></strong>. All Rights Reserved
      </div>
      <div class="credits" style="font-size:10px">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
<!-- Template Main JS File -->
  <script src="{{ asset('/js/main.js')}}"></script>
 
</body>
</html>
