@extends("layouts.app")

@section("title", "Liste des systèmes")

@section("content")
    <div class="page-title">
        <h3>Liste des systèmes</h3>
        <ol class="breadcrumb">
            <li><small><i class="fa fa-home fa-fw m-xs-r"></i>Tableau de bord</small></li>
            <li><small><i class="fa fa-database fa-fw m-xs-r"></i>Systèmes</small></li>
            <li><a href="javascript:void(0)" class="text-info"><small>Liste</small></a></li>
        </ol>
    </div>

    <div class="row row-xl">
        <!-- Begin Striped Responsive Table -->
        <div class="col-md-12">
            <!-- Begin Panel -->
            <div class="panel-x panel-transparent">
                <!-- Begin Panel Body -->
                <div class="panel-body">
                    <a href="{{ route("management.systems.add") }}" class="btn btn-warning w-200 m-sm-r m-sm-b"><i class="fa fa-plus-square fa-fw"></i> Ajouter un système</a>

                    <div class="table-responsive">

                        <!-- Begin Table -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nom du système</th>
                                    <th>Multi Carte</th>
                                    <th style="text-align: center">Lancement sur client</th>
                                    <th>Port de début</th>
                                    <th>Maps</th>
                                    <th>Plugins installés d'office</th>
                                    <th style="text-align: center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $value)
                                <tr>
                                    <td><strong>{{ $key }}</strong></td>
                                    <td align="center">{!! boolval($value['multi-map']) ? '<span class="badge badge-success"><i class="fa fa-check"></i> Oui</span>' : '<span class="badge badge-danger"><i class="fa fa-times"></i> Non</span>' !!}</td>
                                    <td align="center">{!! !boolval($value['local']) ? '<span class="badge badge-success"><i class="fa fa-check"></i> Oui</span>' : '<span class="badge badge-danger"><i class="fa fa-times"></i> Non</span>' !!}</td>
                                    <td>{{ $value['starter-port'] }} <b>(tcp)</b></td>
                                    <td>{!! $value['maps'] !!}</td>
                                    <td>{{ $value['plugins'] }}</td>
                                    <td align="center">
                                        <a href="" data-toggle="tooltip" data-placement="top" title="Éditer"><span class="badge badge-info"><i class="fa fa-pencil fa-fw"></i></span></a>
                                        <a href="{{ route("management.systems.delete", [$value['_name']]) }}" data-toggle="tooltip" data-placement="top" title="Supprimer"><span class="badge badge-danger"><i class="fa fa-trash fa-fw"></i></span></a>
                                        <a href="{{ route("management.systems.manage", [$value['_name']]) }}" data-toggle="tooltip" data-placement="top" title="Gérer"><span class="badge badge-primary"><i class="fa fa-cogs fa-fw"></i></span></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table -->
                    </div>
                    <!-- End Table Responsive -->
                </div>
                <!-- End Panel Body -->
            </div>
            <!-- End Panel -->
        </div>
        <!-- End Striped Responsive Table -->
    </div>
@endsection