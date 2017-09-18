@extends("layouts.app")

@section("title", "Ajouter un système")

@section("content")
    <div class="page-title">
        <h3>Ajouter un système</h3>
        <ol class="breadcrumb">
            <li><small><i class="fa fa-home fa-fw m-xs-r"></i>Tableau de bord</small></li>
            <li><small><i class="fa fa-database fa-fw m-xs-r"></i>Systèmes</small></li>
            <li><a href="javascript:void(0)" class="text-info"><small>Ajouter</small></a></li>
        </ol>
    </div>

    <div class="row row-xl">
        <div class="col-md-5">
            <div class="panel-body">
                <p class="header text-uppercase">Liste des systèmes enregistrés</p>
                <h3>Un total de {{ count($data) }} systèmes sont enregistrés et configurés</h3>
                <p>Voici la liste de tous les systèmes enregistrés sur la plateforme. Pour plus d'informations, rendez-vous <a href="{{ route("management.systems.list") }}">ICI</a>.</p>
            </div>

            <div class="panel-x panel-transparent">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nom du système</th>
                                <th>Lancement sur client</th>
                                <th>Port de début</th>
                                <th>Maps</th>
                                <th>Plugins</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $value)
                                <tr>
                                    <td><strong>{{ $key }}</strong></td>
                                    <td align="center">{!! !boolval($value['local']) ? '<span class="badge badge-success"><i class="fa fa-check"></i> Oui</span>' : '<span class="badge badge-danger"><i class="fa fa-times"></i> Non</span>' !!}</td>
                                    <td>{{ $value['starter-port'] }} <b>(tcp)</b></td>
                                    <td>{!! $value['maps'] !!}</td>
                                    <td>{!! $value['plugins'] !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="panel-body">
                <p class="header text-uppercase">Ajouter un système à la configuration</p>
                <p>Après l'ajout, il faudra patienter un redémarrage de l'infrastructure, ou le programmer (superuser only).</p>
            </div>

            <div class="panel-x panel-transparent">
                <div class="panel-body">
                    @if(Session::has("error"))
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <strong>Ouuuuups !</strong> {!! Session::get("error") !!}
                        </div>
                    @endif

                    @if(Session::has("success"))
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <strong>Wheeee !</strong> {!! Session::get("success") !!}
                            </div>
                    @endif

                    <form method="POST" action="{{ route(Route::currentRouteName()) }}">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Begin Form Group -->
                                <div class="form-group form-group-default">
                                    <label for="name"><i class="fa fa-database m-xs-r"></i>Nom du système</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old("name") }}">
                                    <p class="m-n-b m-xs-t fs-sm text-grey">Le nom du système doit être composé d'uniquement des lettres.</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <br />
                                <div class="checkbox m-lg-t" align="center">
                                    <label for="local" class="checkbox-default success">
                                        <input type="checkbox" name="local" id="local" checked>
                                        <span>Lancer les instances sur un client</span>
                                    </label>
                                    <p class="m-n-b m-xs-t fs-sm text-grey">Permet de savoir si le serveur lance les instances sur sa machine respective.</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-group-default">
                            <label for="plugins"><i class="fa fa-puzzle-piece m-xs-r"></i>Plugins à ajouter au système</label>
                            <input type="text" class="form-control" id="plugins" name="plugins" value="{{ old("plugins") }}">
                            <p class="m-n-b m-xs-t fs-sm text-grey">Liste des plugins du système. Séparer à l'aide de virgules. <b><a href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" title="{{ $plugList }}">Liste des plugins disponibles...</a></b></p>
                        </div>

                        <div class="form-group form-group-default input--filled">
                            <label for="decorating-ion"><i class="fa fa-sitemap m-xs-r"></i>Plage de port</label>
                            <input name="starter-port" id="decorating-ion" value="{{ old("starter-port") }}">
                            <p class="m-n-b m-xs-t fs-sm text-grey">Plage de port sur laquelle les instances seront allouées.</p>
                        </div>

                        <div class="form-group form-group-default">
                            <label for="maps"><i class="fa fa-map-signs m-xs-r"></i>Cartes disponibles</label>
                            <input type="text" class="form-control" id="maps" name="maps" value="{{ old("maps") }}">
                            <p class="m-n-b m-xs-t fs-sm text-grey">Liste des maps du système. Séparer à l'aide de virgules. <b>Le nom des maps de doivent pas contenir d'espaces.</b></p>
                        </div>

                        <p>
                            <button type="submit" class="btn btn-success w-150 m-sm-t"><i class="fa fa-plus-square fa-fw"></i>&nbsp;Ajouter !</button>
                            <button type="reset" class="btn btn-danger w-200 m-sm-t"><i class="fa fa-times fa-fw"></i>&nbsp;Réinitialiser champs</button>
                        </p>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
        <!-- End Default Style -->
    </div>
@endsection

@section("css")
    <link rel="stylesheet" href="{{ asset("scripts/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css") }}">
    <link rel="stylesheet" href="{{ asset("scripts/plugins/bootstrap-daterangepicker/daterangepicker.css") }}">
    <link rel="stylesheet" href="{{ asset("scripts/plugins/bootstrap-daterangepicker/daterangepicker.css") }}">
    <link rel="stylesheet" href="{{ asset("scripts/plugins/select2/dist/css/select2.min.css") }}">
    <link rel="stylesheet" href="{{ asset("scripts/plugins/nouislider/distribute/nouislider.min.css") }}">
    <link rel="stylesheet" href="{{ asset("scripts/plugins/ion.rangeSlider/css/ion.rangeSlider.css") }}">
    <link rel="stylesheet" href="{{ asset("scripts/plugins/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css") }}">
@endsection

@section("scripts")
    <script src="{{ asset("scripts/plugins/moment/moment.js") }}"></script>
    <script src="{{ asset("scripts/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js") }}"></script>
    <script src="{{ asset("scripts/plugins/bootstrap-daterangepicker/daterangepicker.js") }}"></script>
    <script src="{{ asset("scripts/plugins/dropzone/dist/min/dropzone.min.js") }}"></script>
    <script src="{{ asset("scripts/plugins/typeahead.js/dist/typeahead.jquery.min.js") }}"></script>
    <script src="{{ asset("scripts/plugins/typeahead.js/dist/bloodhound.min.js") }}"></script>
    <script src="{{ asset("scripts/plugins/select2/dist/js/select2.min.js") }}"></script>
    <script src="{{ asset("scripts/plugins/jquery-validation/dist/jquery.validate.js") }}"></script>
    <script src="{{ asset("scripts/plugins/nouislider/distribute/nouislider.js") }}"></script>
    <script src="{{ asset("scripts/plugins/nouislider/documentation/assets/wNumb.js") }}"></script>
    <script src="{{ asset("scripts/plugins/ion.rangeSlider/js/ion.rangeSlider.js") }}"></script>
@endsection

@section("page-script")
    <script src="{{ asset("scripts/pages/forms.general.js") }}"></script>
    <script src="{{ asset("scripts/pages/forms.sliders.js") }}"></script>
    <script src="{{ asset("scripts/pages/validation.js") }}"></script>
@endsection