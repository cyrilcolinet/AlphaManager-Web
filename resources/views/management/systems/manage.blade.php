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
        <div class="col-md-5" style="border-right: 1px solid #d2d2d2;">
            <div class="chart-widget">
                <div class="income-chart"></div>
                <div class="income-stat bg-white p-md">
                    <div class="row m-n">
                        <div class="col-md-6">
                            <h2 class="text-center fw-thk m-n">0 serveurs</h2>
                            <p class="text-center text-uppercase text-grey p-xs-t m-n"><small>Ce mois-ci</small></p>
                        </div>
                        <div class="col-md-6">
                            <h2 class="text-center fw-thk m-n">0 serveurs</h2>
                            <p class="text-center text-uppercase text-grey p-xs-t m-n"><small>Cette année</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="panel-x panel-transparent">
                <div class="panel-body">
                    <div class="tab-container tab-box-line tab-top tab-danger">
                        <div class="nav-tabs-container">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#infos" aria-controls="infos" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-info fa-fw m-xs-r"></i>Informations</a>
                                </li>
                                <li role="presentation" class="">
                                    <a href="#plugins" aria-controls="about" role="tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-puzzle-piece fa-fw m-xs-r"></i>Plugins</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="infos">
                                <table class="table" id="table1" >
                                    <tr>
                                        <td><b>SERVEURS LANCÉS SUR UNE MACHINE "CLIENT"</b></td>
                                        <td>{!! !boolval($infos['local']) ? '<span class="badge badge-success"><i class="fa fa-check"></i> Oui</span>' : '<span class="badge badge-danger"><i class="fa fa-times"></i> Non</span>' !!}</td>
                                    </tr>
                                    <tr>
                                        <td><b>MULTI CARTES</b></td>
                                        <td>{!! !boolval($infos['multi-map']) ? '<span class="badge badge-success"><i class="fa fa-check"></i> Oui</span>' : '<span class="badge badge-danger"><i class="fa fa-times"></i> Non</span>' !!}</td>
                                    </tr>
                                    <tr>
                                        <td><b>PORT DE DÉMARRAGE</b></td>
                                        <td><span class="badge badge-info"><b>{{ $infos['starter-port'] }}</b></span></td>
                                    </tr>
                                </table>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="plugins">
                                <h3>This template looks very clean &amp; tidy</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam culpa, sapiente eius debitis ipsam rerum. Minus facere sit reprehenderit autem deserunt odit architecto, a perspiciatis eius placeat, ad voluptates illum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-xl">
        <div class="col-md-12">
            <div class="panel-body">
                <p class="header text-uppercase">Liste des cartes configurées pour ce système</p>
            </div>

            @if(count($maps) != count(explode(",", $infos['maps'])))
                <div class="alert alert-warning">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>Eh psssst !</strong> Il manque <b>{{ (count(explode(",", $infos['maps'])) - count($maps)) }} cartes</b> dans la configuration. Il est préférable de les ajouter, et de les désactiver si non utilisée.
                </div>
            @endif

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
                                    <td><i class="fa fa-users fa-fw"></i>&nbsp;&nbsp;{{ $value['slots'] }} joueurs</td>
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
                                        <a href="" data-toggle="tooltip" data-placement="top" title="{{ !boolval($value['active']) ? "Activer" : "Désactiver" }}"><span class="badge badge-{{ !boolval($value['active']) ? "success" : "danger" }}"><i class="fa fa-{{ !boolval($value['active']) ? "check" : "times" }} fa-fw"></i></span></a>
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

@section("scripts")
    <script src="{{ asset("scripts/plugins/highcharts/highcharts.js") }}"></script>
@endsection

@section("page-script")
    <script>
        jQuery('.income-chart').highcharts({
            chart: {                                                        // chart - specifies the chart height,
                height: 240,                                                // background, border, bordercolor, borderradius
                backgroundColor: '#00abe8'                                  // and much more
            },
            title: {                                                        // title - specifies the chart title,
                text: '{{ $infos['real-name'] }} lancés',
                align: 'left',                                              // align, margin, text, x and y position
                style: {
                    color: '#fff'
                }
            },
            colors: ['#fff'],                                               // color for the line color
            subtitle: {                                                     // subtitle - specifies the chart title,
                text: null                                                  // align, margin, text, x and y position
            },
            xAxis: {                                                        // xAxis - Specifies the highcharts xAxis categories
                categories: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',      // and all the styling for the xAxis
                    'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
                lineColor: 'transparent',
                minorTickLength: 0,
                tickLength: 0,
                labels: {
                    enabled: false,
                    style: {
                        'color': '#fff'
                    }
                }
            },
            yAxis: {                                                        // yAxis - Styles the yAxis of the chart
                title: {
                    text: null
                },
                // gridLineColor: '#33BCED',
                gridLineColor: 'transparent',
                labels: {
                    enabled: false,
                    style: {
                        'color': '#fff'
                    }
                }
            },
            legend: {                                                       // legend - Enable or disable the legends
                enabled: false                                              // and style the legends
            },
            plotOptions: {                                                  // plotOptions - extra options for the chart
                series: {                                                   // to style all the markers and much more
                    marker: {
                        fillColor: '#0089BA',
                        lineWidth: 2,
                        lineColor: null, // inherit from series
                        radius: 7
                    }
                }
            },
            exporting: {                                                    // exporting - enable or disable the charts option
                enabled: false                                              // for exporting
            },
            series: [{                                                      // series - number of series for the chart and the
                name: 'Serveurs lancés',                                             // data for the chart
                data: [0,0,0,0,0,0,0,0,0,0,0,0]
            }]
        });
    </script>
@endsection