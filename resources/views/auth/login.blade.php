<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>{{ config("app.name") }} - Connexion</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset("scripts/plugins/bootstrap/dist/css/bootstrap.css") }}">
    <link rel="stylesheet" href="{{ asset("scripts/plugins/components-font-awesome/css/font-awesome.css") }}" />
    <link rel="stylesheet" href="{{ asset("scripts/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css") }}" />
    <link rel="stylesheet" href="{{ asset("scripts/plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css") }}" />

    <link rel="stylesheet" href="{{ asset("styles/manager.css") }}">
</head>

<body>
    <!--[if lt IE 10]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <div class="content-wrapper">
        <div class="login-container">
            <h2 class="m-n fw-thk"><span class="text-success">A</span>LPHA WEBMANAGER</h2>
            <h3>Bienvenue sur le panel de management du système principal d'Alphasia.</h3>
            <p>Toute tentative de connexion sera enregistrée, et l'utilisateur en question sera informé de sa connexion par SMS. Inutile de tenter quoi que ce soit.</p>

            <form id="form-one" method="POST" action="{{ route("login") }}">
                {{ csrf_field() }}
                <p class="header text-uppercase text-center m-md-b">Connexion à l'aide des identifiants</p>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} form-group-default">
                    <label for="name"><i class="fa fa-user m-xs-r"></i>Identifiant</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old("name") }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} form-group-default">
                    <label for="password"><i class="fa fa-lock m-xs-r"></i>Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <p class="m-xl-t m-md-b"><!--<a type="submit" class="btn btn-primary w-150">Connexion</a>--><button type="submit" class="btn btn-primary w-150">Connexion</button></p>

                <div class="row">
                    <div class="col-xs-6">
                        <p><a href="pages.forgot-password.html" class="text-grey">Mot de passe oublié ?</a></p>
                    </div>
                </div>
            </form>

            <p class="m-xl-t text-center"><strong class="text-success ls-xs">A</strong><span class="ls-xs">lpha WebManager</span> <span class="app-version">1.2.1</span> &copy; - 2017</p>
        </div>
    </div>

    <script src="{{ asset("scripts/plugins/jquery/jquery.js") }}"></script>
    <script src="{{ asset("scripts/plugins/bootstrap/dist/js/bootstrap.js") }}"></script>
    <script src="{{ asset("scripts/plugins/kapusta-jquery.sparkline/dist/jquery.sparkline.min.js") }}"></script>
    <script src="{{ asset("scripts/plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.js") }}"></script>

    <script src="{{ asset("scripts/manager.js") }}"></script>
</body>

</html>
