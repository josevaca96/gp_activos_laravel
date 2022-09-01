        <!-- <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif  -->
        <!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Grupo Paz</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <!-- <meta content="" name="keywords">
  <meta content="" name="description"> -->

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <!-- <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content=""> -->

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <!-- <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content=""> -->

  <!-- Place your favicon.ico and apple-touch-icon.png in the template root directory -->
  <link href="{{ asset('plantilla/img/logo2.png') }}" rel="shortcut icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{asset('plantilla/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{asset('plantilla/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('plantilla/lib/animate-css/animate.min.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{asset('plantilla/css/style.css')}}" rel="stylesheet">

</head>

<body>
  <div id="preloader"></div>

  <!--==========================
  Hero Section
  ============================-->
  <section id="hero">
    <div class="hero-container">
      <div class="wow fadeIn">
        <div class="hero-logo">
          <img class="" src="{{asset('plantilla/img/logo_g.png')}}" alt="ProOnliPc">
        </div>
        <h1>En constante crecimiento</h1>
        <h2>Rubro&nbsp;<span class="rotating">Agrícola, Contrucción, Industrial</span></h2>
            @if (Route::has('login'))
                <div class="actions">
                    @auth
                        <a href="{{ url('/home') }}" class="btn-get-started">Home</a>
                    @else
                        <a href="{{ url('/login') }}" class="btn-get-started">Ingresar</a>
                        <!-- @if (Route::has('register'))
                            <a href="{{ url('/register') }}" class="btn-get-started">Registrarse</a>
                        @endif -->
                    @endauth
                </div>
            @endif
      </div>
    </div>
  </section>

  <!--==========================
  Footer
============================-->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="copyright">
            &copy; Copyright <strong>JOSÉ ANDRÉS</strong>. Todos los Derechos reservados
          </div>
          <div class="credits">

            2022<a href="https://www.linkedin.com/in/andres-vaca-a8ab4a174" target="_blank">Portafolio</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- #footer -->
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Required JavaScript Libraries -->
  <script src="{{asset('plantilla/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('plantilla/lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('plantilla/lib/superfish/hoverIntent.js')}}"></script>
  <script src="{{asset('plantilla/lib/superfish/superfish.min.js')}}"></script>
  <script src="{{asset('plantilla/lib/morphext/morphext.min.js')}}"></script>
  <script src="{{asset('plantilla/lib/wow/wow.min.js')}}"></script>
  <script src="{{asset('plantilla/lib/stickyjs/sticky.js')}}"></script>
  <script src="{{asset('plantilla/lib/easing/easing.js')}}"></script>
  <!-- Template Specisifc Custom Javascript File -->
  <script src="{{asset('plantilla/js/custom.js')}}"></script>
  <script src="{{asset('plantilla/contactform/contactform.js')}}"></script>
</body>
</html>
