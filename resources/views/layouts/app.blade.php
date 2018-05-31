<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Life Stream - @yield('title')</title>

  <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/gif" sizes="16x16">
  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

  <!-- Bootstrap v4.1 pulse CSS -->
  <link href="{{ asset('css/pulse.bootstrap.css') }}" rel="stylesheet">

  <!-- Bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('bootstrap-datepicker/bootstrap-datepicker.css')}}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <!-- Bootstrap Form Helper -->
  <link rel="stylesheet" href="{{asset('bootstrap-formhelpers/bootstrap-formhelpers.css')}}">
</head>
<body>
    <div id="app">

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/"><img src="{{ asset('img/logo.png') }}" alt="Life Stream" width="103px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor03">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('list_of_donors') }}">Donors</a>
            </li>
          </ul>
          <!-- @if (Route::has('login'))
          <ul class="navbar-nav">
              @auth
              <li class="nav-item">
                  <a class="nav-link" href="{{ url('/home') }}">Home</a>
              </li>
              @else
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">dsfds</a>
              </li>
              @endauth
          </ul>
          @endif -->


          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @auth
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->full_name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('profile') }}">
                    {{ __('Profile') }}
                  </a>
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
            @else
              <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
              <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @endauth
          </ul>
        </div>
      </nav>

      <main class="py-4">
          @yield('content')
      </main>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"> -->
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('bootstrap-formhelpers/bootstrap-formhelpers.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/upazila-dropdown.js')}}"></script>
    <script type="text/javascript" src="{{asset('bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap-confirmation.js')}}"></script>
    <!-- <script type="text/javascript" src="{{asset('js/popper.js')}}"></script> -->

    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle=confirmation]').confirmation({
              rootSelector: '[data-toggle=confirmation]',
              // other options
            });

            $('#donatedatepicker .input-group.date').datepicker({
                format: "yyyy-mm-dd",
                autoclose: true,
                todayBtn: 'linked'
            });

            $('#donatedatepicker').change(function() {
              var date = $(this).val();
              $('#donatedatepicker').attr('value', date);
           });

           $('[data-toggle="tooltip"]').tooltip()
      });
    </script>

    <script type="text/javascript">
        //Function to show image before upload
        function preview_image(event)
        {
          var reader = new FileReader();
          reader.onload = function()
        {
         var output = document.getElementById('output_image');
         output.src = reader.result;
        }
          reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>
</html>
