<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Reminders</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Styles -->
        <style>
           .navbar {
            border-radius: 0px;
            }
            .navbar-default .navbar-nav>li>a {
    color: #337ab7;
}
        </style>
    </head>


    <body style="background-color:#fafafa"> 
    <header>
        
    <nav class="navbar navbar-default navbar-static-top" style="position: fixed;min-width: 100%;box-shadow: 0px 7px 7px rgba(0,0,0,0.5);border-color:#222;background-color: #222">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img class="navbar-brand" class="img-responsive" style="background-color: #333333" src="img/k.png" alt="">
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                 <ul class="nav navbar-nav">
                      <li class=""><a href=""><b style="color:#fafafa">Reminders</b></a></li>
                 </ul>
            @if (Route::has('login'))
                <ul class="nav navbar-nav navbar-right" >
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Iniciar Sesion</a></li>
                    <li><a href="{{ url('/register') }}">Registrate</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    Cerrar sesion
                                </a>


                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            <li><a href="{{ url('/login') }}">Panel de administracion</a></li> 
                        </ul>
                    </li>
                @endif 
                </ul>
            @endif
            </div><!--/.nav-collapse -->
        </div>
        </nav>
    </header> 
        <!--
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                <a class="navbar-brand" href="#">News!</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/login') }}">Iniciar Sesion</a></li>
                    <li><a href="{{ url('/register') }}">Registrate</a></li>
                </ul>
            </div>
        </nav>
        -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>


</html>
