@extends("layouts.app")

@section("title", "Supprimer un système (confirmation)")

@section("content")
    <div class="page-title">
        <h3>Suppression du système "{{ strtolower($system) }}"</h3>
        <ol class="breadcrumb">
            <li><small><i class="fa fa-home fa-fw m-xs-r"></i>Tableau de bord</small></li>
            <li><small><i class="fa fa-database fa-fw m-xs-r"></i>Systèmes</small></li>
            <li><a href="javascript:void(0)" class="text-info"><small>Supprimer "{{ $system }}"</small></a></li>
        </ol>
    </div>

    <div class="row row-xl">
        <div class="col-md-12 text-center">
            <div class="panel-x panel-transparent m-n">
                <div class="panel-body">
                @if(!$error)
                    <h1 class="m-n-t">Suppression du système <strong class="text-uppercase">{{ strtoupper($system) }}</strong>.</h1>
                    <p>
                        Afin de confirmer la suppression du sytème, vous devez entrer cette commande en jeu, à l'aide de votre compte (<b>{{ Auth()->user()->name }}</b>), confirmé et autorisé.<br />
                        <code>/alphamanager confirm <b>{{ $hash }}</b></code>
                    </p>
                    <p><strong>Pour des raisons de sécurité, la commande ne sera plus valide dans 5 minutes.</strong></p>
                @else
                        <h1 class="m-n-t">Vous avez déjà une confirmation d'action en attente !</h1>
                        <p>
                            Votre compte possède déjà une demande en attente. L'action en attente est la suivante: <code>{{ $data['action'] }}</code>.<br />
                            Afin de confirmer cette action, vous devez entrer cette commande en jeu, à l'aide de votre compte (<b>{{ Auth()->user()->name }}</b>), confirmé et autorisé.<br />
                            <code>/alphamanager confirm <b>{{ $data['hash'] }}</b></code>
                        </p>
                        <p><strong>Pour des raisons de sécurité, la commande ne sera plus valide dans {{ $timeout }} secondes.</strong></p>
                @endif
                    <br /><br /><br /><br /><br />

                    <img src="https://exemetrics.com/img/rocket.png" alt="" />
                </div>
            </div>
        </div>
    </div>
@endsection