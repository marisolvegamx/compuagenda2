<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-180998851-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-180998851-1');
</script>

    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="directorio de empresas y profesionales que ofrecen servicios y productos de sistemas computacionales y tecnologias de información">
     <meta content="sistemas computacionales, tecnologías de información, software administrativo,ti,  comercio electrónico,  contacto tecnologico, directorio empresas mexico, empresas ti mexico, procesamiento de datos, seguridad de informacion,instalacion de redes, accesorios e insumos de computadoras, software a la medida,
     diseño web, capacitación y entrenamiento informatico, publicidad gratis,aumentar clientes,
     desarrollo movil, desarrollo de sistemas, empresas de consultoria mexico" name="keywords">

<!--  este es el template -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Contactotecnologico') }}</title>

    <!-- Scripts -->
    
<script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
    
    <script src="{{asset('/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
  
     @yield('scripts')

     <!-- Styles -->
       <link href="{{ asset('/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
      <link href="{{ asset('/css/style.css')}}" rel="stylesheet">
   <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
   
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

        <div class="logo float-left">
      <a  href="{{ url('/') }}">
       <img alt="Contacto Tecnológico" src="{{ asset('/img/logo1.png') }}" height="56">
       </a>
      </div>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav class="nav-menu float-right d-none d-lg-block" >
        <ul>
         <li>  <a  href="{{ url('/home') }}">Acerca de
              
              </a>
            </li>
            <li>  <a  href="{{ url('/') }}">Buscar
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
              <a  href="{{asset('sugerencias')}}">Contáctanos</a>
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
    @yield('home')

  <!-- ======= Footer ======= -->
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
 <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-newsletter">
                            <h4>¿Quiénes somos?</h4>
                            <p>Contacto tecnológico es un directorio que agrupa las empresas y profesionales mexicanos que ofrecen servicios y productos relacionados con sistemas computacionales y tecnologías de información
                            para ayudarlos a encontrar nuevos clientes y servir alos usuarios como una referencia y rápida forma de encontrar servicios o vendedores de productos cuando lo requiera.</p>
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
                               
                                     <li><i class="bx bx-chevron-right"></i><a href="{{asset('avisoprivacidad.pdf')}}" target="_blank">Política de privacidad</a></li>
                               
                            </ul>
                        </div>
                    
                   
                     <div class="col-lg-3 col-md-6">
            <div class="footer-info">
                            <h3>Contactános</h3>
                          <p>
                              <i class="bi bi-telephone-fill"></i>  <strong>Telefono:</strong><a href="https://api.whatsapp.com/send?1=pt_BR&phone=5546608214&text=informacion" traget="_blank">55-46-60-82-14</a><br> 
                          
                               <i class="bi bi-envelope-fill"> </i> <strong>Email:</strong><a href="mailto:soporte@contactotecnologico.com">soporte@contactotecnologico.com</a> <br></p> 
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

  <a href="#" class="back-to-top"><i class="bi bi-arrow-up-short"></i></a>
<!-- Template Main JS File -->
 <script src="{{asset('vendor/jquery.easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('vendor/waypoints/jquery.waypoints.min.js')}}"></script>
   <script src="{{asset('vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('/js/main.js')}}"></script>
 
</body>
</html>
