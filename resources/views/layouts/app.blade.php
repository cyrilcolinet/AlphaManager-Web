<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>{{ config("app.name") }} - @yield("title")</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset("scripts/plugins/bootstrap/dist/css/bootstrap.css") }}">
    <link rel="stylesheet" href="{{ asset("scripts/plugins/components-font-awesome/css/font-awesome.css") }}" />
    <link rel="stylesheet" href="{{ asset("scripts/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css") }}" />
    <link rel="stylesheet" href="{{ asset("scripts/plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css") }}" />

    @yield("css")

    <link rel="stylesheet" href="{{ asset("styles/manager.css") }}">
</head>

<body class="navbar-visible">
    <!--[if lt IE 10]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <div class="content-wrapper">
        <nav id="page-sidebar">
            <div class="scrollbar-padder">
                <div class="sidebar-container">
                    <div class="sidebar-header">
                        <a href="{{ route("dashboard") }}" class="text-uppercase fs-lg"><strong class="header-short-name text-success ls-xs fw-thkr">A</strong><span class="ls-xs fw-thk">lpha Manager</span></a>
                    </div>

                    <div class="sidebar-avatar">
                        <div class="media">
                            <div class="media-left">
                                <img src="{{ asset("images/avatar/avatar1.png") }}" alt="Avatar" class="img-circle" height="64" width="64">
                            </div>
                            <div class="media-body">
                                <a href="javascript:void(0)" class="text-white" data-toggle-class="hide-sidebar-avatar-info" data-target=".sidebar-avatar-info">
                                    <h5 class="media-heading m-md-t text-white fw-thk">{{ Auth()->user()->name }}</h5>
                                </a>
                                <p class="text-white fs-sm">Network Developer at Alphasia</p>
                            </div>
                        </div>
                    </div>

                    <ul class="sidebar-navigation ul-clear">
                        <li><a href="{{ route("dashboard") }}"><i class="fa fa-home fa-fw"></i><span>Tableau de bord</span></a></li>

                        <li class="divider"></li>

                        <li class="menu-header text-uppercase"><small>Management</small></li>

                        <li>
                            <a href="javascript:void(0)" data-toggle="nav-submenu"><i class="fa fa-user-secret fa-fw"></i><span>Utilisateurs autorisés</span></a>
                            <ul class="nav-submenu ul-clear">
                                <li><a href="#"><span>Liste des utilisateurs</span></a></li>
                                <li><a href="#"><span>Ajouter un utilisateur</span></a></li>
                            </ul>
                        </li>

                        <li class="divider"></li>

                        <li class="menu-header text-uppercase"><small>Configuration</small></li>

                        <li>
                            <a href="javascript:void(0)" data-toggle="nav-submenu"><i class="fa fa-database fa-fw"></i><span>Systèmes</span></a>
                            <ul class="nav-submenu ul-clear">
                                <li><a href="{{ route("management.systems.list") }}"><span>Liste des systèmes</span></a></li>
                                <li><a href="#"><span>Ajouter un système</span></a></li>
                                <li><a href="#"><span>Gérer un système</span></a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:void(0)" data-toggle="nav-submenu"><i class="fa fa-map-signs fa-fw"></i><span>Cartes</span></a>
                            <ul class="nav-submenu ul-clear">
                                <li><a href="#"><span>Liste des cartes</span></a></li>
                                <li><a href="#"><span>Ajouter une carte</span></a></li>
                            </ul>
                        </li>
                    </ul>

                    <div class="sidebar-stats m-md-t">
                        <div class="media m-md-b">
                            <a href="javascript:void(0)" class="pull-right"><span class="sidebar-stats-sparkline"></span></a>

                            <div class="media-body">
                                <p class="lx-xs text-uppercase ls-xs fw-thk">Visits</p>
                                <p class="fs-xl text-danger">526</p>
                                <p class="fs-xl">97</p>
                            </div>
                        </div>

                        <div class="cloud-storage-info">
                            <div class="user-storage-text">
                                <p class="fs-sm text-uppercase fw-lgt ls-xs"><i class="fa fa-cloud fa-fw m-xs-r"></i> Cloud Storage</p>
                            </div>

                            <div class="user-storage-graph">
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                                        <span class="sr-only">80% Complete (warning)</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="email-storage-info">
                            <div class="user-storage-text">
                                <p class="fs-sm text-uppercase fw-lgt ls-xs"><i class="fa fa-inbox fa-fw m-xs-r"></i> Email Storage</p>
                            </div>

                            <div class="user-storage-graph">
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                                        <span class="sr-only">50% Complete (warning)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-footer">

                    </div>
                </div>
            </div>
        </nav>

        <header id="page-header">
            <div class="header-container hidden-md hidden-lg">
                <a href="{{ route("dashboard") }}" class="text-uppercase text-black fs-lg"><strong class="header-short-name text-success ls-xs fw-thkr">A</strong><span class="ls-xs fw-thk">lpha Manager</span></a>
            </div>

            <div class="navbar-content">
                <ul class="nav navbar-nav">
                    <li class="hidden-md hidden-lg p-md-l"><a href="javascript:void(0)" class="text-default" data-toggle-class="navbar-visible" data-target="body"><i class="fa fa-bars fa-fw"></i></a></li>
                    <li class="hidden-sm hidden-xs"><a href="javascript:void(0)" class="text-default" data-toggle-class="navbar-collapsed" data-target="body"><i class="fa fa-bars fa-fw"></i></a></li>

                    <li class="hidden-xs hidden-sm dropdown" id="header-notifications-list">
                        <a href="javascript:void(0)" class="text-default dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bullhorn fa-fw"></i></a>
                        <ul class="dropdown-menu p-md">
                            <!-- Begin LI -->
                            <li>
                                <p class="fw-thk text-center text-uppercase ls-xs text-black">Notifications</p>
                            </li>
                            <!-- End LI -->

                            <li class="divider"></li>

                            <!-- Begin LI -->
                            <li>
                                <a href="javascript:void(0)">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="images/avatar/avatar2.png" alt="Avatar" height="50" width="50" class="img-circle">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading m-sm-t">Beverly Butler</h5>
                                            <p class="fs-xs">You've recived a new message.</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- End LI -->

                            <!-- Begin LI -->
                            <li>
                                <a href="javascript:void(0)">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="images/avatar/avatar4.png" alt="Avatar" height="50" width="50" class="img-circle">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading m-sm-t">Ashley Guerrero</h5>
                                            <p class="fs-xs"><i class="fa fa-phone text-danger m-xs-r fa-fw"></i>Missed call.</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- End LI -->

                            <!-- Begin LI -->
                            <li>
                                <a href="javascript:void(0)">
                                    <div class="media">
                                        <div class="media-left">
                                            <div class="h-50 w-50 lh-50 text-center bg-success br-50">
                                                <i class="fa fa-download text-white fa-2x lh-50"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="m-xs-b">Download complete successfully</h5>
                                            <p class="fs-xs text-grey">5 mins ago</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- End LI -->

                            <!-- Begin LI -->
                            <li>
                                <a href="javascript:void(0)">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="images/avatar/avatar6.png" alt="Avatar" height="50" width="50" class="img-circle">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading m-sm-t">Jerry Morrison</h5>
                                            <p class="fs-xs">Invited you to join the community</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- End LI -->

                            <!-- Begin LI -->
                            <li>
                                <a href="javascript:void(0)">
                                    <div class="media">
                                        <div class="media-left">
                                            <div class="h-50 w-50 lh-50 text-center bg-primary br-50">
                                                <i class="fa fa-shopping-cart text-white fa-2x lh-50"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="m-xs-b">A new order has been placed</h5>
                                            <p class="fs-xs text-grey">2 mins ago</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- End LI -->
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav pull-right hidden-sm hidden-xs">
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="text-default" data-toggle="dropdown">
                            <span class="m-sm-r">{{ Auth()->user()->name }}</span><i class="fa fa-angle-down"></i>
                        </a>

                        <ul class="profile-dropdown dropdown-menu dropdown-menu-right" role="menu">
                            <li role="presentation">
                                <div class="profile-menu-container">
                                    <div class="media">
                                        <div class="profile-image pull-left">
                                            <img src="{{ asset("images/avatar/avatar1.png") }}" alt="Avatar" height="64" width="64" class="img-circle">
                                        </div>

                                        <div class="media-body">
                                            <h4 class="fw-thk m-n">{{ Auth()->user()->name }}</h4>
                                            <p class="fs-sm m-xs-t">Network Developer at <strong><a href="javascript:void(0)" class="text-info">Alphasia</a></strong></p>
                                            <span class="badge badge-danger">&nbsp;SUPER-USER ACCESS&nbsp;</span>
                                        </div>
                                    </div>

                                    <div class="profile-options">
                                        <div class="text-center">
                                            <a href="javascript:void(0)"><i class="fa fa-user fa-fw"></i></a>
                                        </div>
                                        <div class="text-center">
                                            <a href="javascript:void(0)"><i class="fa fa-cog fa-fw"></i></a>
                                        </div>
                                        <div class="text-center">
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i></a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </header>

        <main id="page-content">
            <!--
            <div class="page-title">
                <h3>Blank</h3>
                <ol class="breadcrumb">
                    <li><small><i class="fa fa-home fa-fw m-xs-r"></i>Home</small></li>
                    <li><small><i class="fa fa-file fa-fw m-xs-r"></i>Pages</small></li>
                    <li><a href="javascript:void(0)" class="text-info"><small>Blank</small></a></li>
                </ol>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel-x">
                        <div class="panel-body">
                            <p class="header text-uppercase">Your header</p>
                            <p>Your content goes here..</p>
                        </div>
                    </div>
                </div>
            </div>
            -->
            @yield("content")
        </main>

        <footer id="page-footer">
            <p class="m-n text-left">
                <strong class="text-success ls-xs">A</strong><span class="ls-xs">lpha WebManager</span> <span class="app-version">1.2.1</span> &copy; - 2017
                <span class="footer-author pull-right">Made with love by <strong class="text-success">MrLizzard</strong></span>
            </p>
        </footer>
    </div>

    <script src="{{ asset("scripts/plugins/jquery/jquery.js") }}"></script>
    <script src="{{ asset("scripts/plugins/bootstrap/dist/js/bootstrap.js") }}"></script>
    <script src="{{ asset("scripts/plugins/kapusta-jquery.sparkline/dist/jquery.sparkline.min.js") }}"></script>
    <script src="{{ asset("scripts/plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.js") }}"></script>

    @yield("scripts")

    <script src="{{ asset("scripts/manager.js") }}"></script>

    @yield("page-script")
</body>

</html>
