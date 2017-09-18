@extends("layouts.app")

@section("title", "Gestion du système " . $infos['real-name'])

@section("content")
    <div class="page-title">
        <h3>Gestion du système "{{ $infos['real-name'] }}"</h3>
        <ol class="breadcrumb">
            <li><small><i class="fa fa-home fa-fw m-xs-r"></i>Tableau de bord</small></li>
            <li><small><i class="fa fa-database fa-fw m-xs-r"></i>Systèmes</small></li>
            <li><a href="javascript:void(0)" class="text-info"><small>Gestion de "{{ $infos['real-name'] }}"</small></a></li>
        </ol>
    </div>

    <div class="row row-xl">
        <div class="col-md-12">
            <div class="panel-body">
                <p class="header text-uppercase">Liste des cartes configurées pour ce système</p>
                <h3>Un total de {{ count($maps) }} cartes sont enregistrés et configurés</h3>
                <p>Voici la liste de tous les cartes enregistrées sur la plateforme.</p>
            </div>

            <div class="panel-x panel-transparent">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nom de la carte</th>
                                <th>Active</th>
                                <th>Dossier depuis le /packages</th>
                                <th>Slots maximal</th>
                                <th>Slots VIP réservés</th>
                                <th>Démarrage d'une nouvel instance</th>
                                <th>RAM allouée</th>
                                <th>Arguments JAVA</th>
                                <th>Mode de démarrage</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($maps as $key => $value)
                                <tr>
                                    <td><strong>{{ $key }}</strong></td>
                                    <td align="center">{!! boolval($value['active']) ? '<span class="badge badge-success"><i class="fa fa-check"></i> Oui</span>' : '<span class="badge badge-danger"><i class="fa fa-times"></i> Non</span>' !!}</td>
                                    <td>/packages/maps/{{ $value['folder'] }}</td>
                                    <td>{{ $value['slots'] }} joueurs</td>
                                    <td><span class="badge badge-primary">{{ ($value['vip-slots'] == "0") ? 'Aucuns slots réservés' : $value['vip-slots'] . " slots réservés" }}</span></td>
                                    <td>À partir de <b>{{ $value['free-slots'] }} joueurs</b></td>
                                    <td><span class="badge badge-warning"><b>{{ $value['ram'] }}MB</b></span></td>
                                    <td>{{ $value['jvargs'] }}</td>
                                    <td>
                                        <span class="badge badge-{{ ($value['startup-mode'] == "VERY_SLOW" || $value['startup-mode'] == "SLOW" || $value['startup-mode'] == "NORMAL") ? 'success' : (($value['startup-mode'] == "BURST") ? 'warning' : 'danger') }}">
                                            <i class="fa {{ ($value['startup-mode'] == "VERY_SLOW" || $value['startup-mode'] == "SLOW" || $value['startup-mode'] == "NORMAL") ? 'fa-heart' : (($value['startup-mode'] == "BURST") ? 'fa-fire' : 'fa-fire-extinguisher') }} fa-fw"></i>&nbsp;{{ $value['startup-mode'] }}
                                        </span>
                                    </td>
                                    <td align="center">
                                        <a href="" data-toggle="tooltip" data-placement="top" title="Éditer"><span class="badge badge-info"><i class="fa fa-pencil fa-fw"></i></span></a>
                                        <a href="" data-toggle="tooltip" data-placement="top" title="Supprimer"><span class="badge badge-danger"><i class="fa fa-trash fa-fw"></i></span></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection