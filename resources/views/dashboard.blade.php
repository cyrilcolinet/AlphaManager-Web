@extends("layouts.app")

@section("title", "Tableau de bord")

@section("content")
    <div class="row row-xl">
        <div class="col-md-12 text-center">
            <div class="panel-x panel-transparent m-n">
                <div class="panel-body">
                    <h1 class="m-n-t">Bienvenue sur <strong class="text-uppercase">Alpha WebManager</strong>.</h1>
                    <p>
                        Ce panel est uniquement reservé aux administrateurs et aux utilisateurs confirmés pouvant éditer la configuration<br />
                        des serveurs, des maps, ajouter un nouveau serveur, ainsi que gérer les options administratives des joueurs, etc...
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-xl">
        <div class="col-md-12">
            <div class="panel-x panel-transparent">
                <div class="panel-body">
                    <p class="header text-uppercase">Serveurs lancés par mois</p>
                    <p class="m-md-b">Voici un graphique montrant le nombre de serveurs lancés par mois.</p>

                    <div class="visitor-stats"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Begin Row -->
    <div class="row row-xl">
        <!-- Begin Mini Stats -->
        <div class="col-md-4">
            <div class="mini-stats-container mini-stats-pink">
                <div class="mini-stats-content">
                    <h1 class="m-n fw-thk text-white">$ 56,768</h1>
                    <small class="text-uppercase text-white">Profit ( <strong>12 % <i class="fa fa-arrow-up"></i></strong>)</small>
                </div>
                <div class="mini-stats-icon">
                    <i class="fa fa-dollar fa-5x"></i>
                </div>
            </div>
        </div>
        <!-- End Mini Stats -->

        <!-- Begin Mini Stats -->
        <div class="col-md-4">
            <div class="mini-stats-container mini-stats-violet">
                <div class="mini-stats-content">
                    <h1 class="m-n fw-thk text-white">123,463</h1>
                    <small class="text-uppercase text-white">Orders ( <strong>05 % <i class="fa fa-arrow-down"></i></strong>)</small>
                </div>
                <div class="mini-stats-icon">
                    <i class="fa fa-shopping-cart fa-5x"></i>
                </div>
            </div>
        </div>
        <!-- End Mini Stats -->

        <!-- Begin Mini Stats -->
        <div class="col-md-4">
            <div class="mini-stats-container mini-stats-green">
                <div class="mini-stats-content">
                    <h1 class="m-n fw-thk text-white">773,895</h1>
                    <small class="text-uppercase text-white">Users ( <strong>23 % <i class="fa fa-arrow-up"></i></strong>)</small>
                </div>
                <div class="mini-stats-icon">
                    <i class="fa fa-user fa-5x"></i>
                </div>
            </div>
        </div>
        <!-- End Mini Stats -->
    </div>
    <!-- End Row -->

    <!-- Begin Row -->
    <div class="row row-xl m-lg-t">
        <!-- Begin Map -->
        <div class="col-md-8">
            <!-- Begin Panel -->
            <div class="panel-x panel-transparent">
                <!-- Begin Panel Body -->
                <div class="panel-body">
                    <p class="header text-uppercase">Locations</p>
                    <p class="m-xl-b">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad ducimus cum minus enim ex nemo, dolorem ullam cumque iste porro vitae nihil perspiciatis, veritatis dicta itaque nulla! Alias, asperiores, fugiat.</p>

                    <!-- Begin Dashboard Map -->
                    <div id="dashboard-map">
                        <div class="map">
                            <span>Alternative content for the map</span>
                        </div>
                    </div>
                    <!-- End Dashboard Map -->
                </div>
                <!-- End Panel Body -->
            </div>
            <!-- End Panel -->
        </div>
        <!-- End Map -->


        <!-- Begin Map Stats -->
        <div class="col-md-4">
            <!-- Begin Panel -->
            <div class="panel-x panel-transparent">
                <!-- Begin Panel Body -->
                <div class="panel-body">
                    <p class="header text-uppercase">Stats</p>
                    <p class="m-xl-b">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, est.</p>

                    <p class="fs-lg m-lg-b"><i class="fa fa-map-marker text-warning fa-fw m-sm-r"></i><strong class="text-black">50</strong> states with <strong class="text-black">1,214</strong> sqaure miles - <strong class="text-black">663,268</strong> square miles </p>

                    <!-- Begin Income Progressbar -->
                    <div class="row">
                        <div class="col-md-12">
                            <p class="header text-uppercase m-n">Income</p>
                            <p class="">Lorem ipsum dolor sit amet.</p>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                     aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                    <span class="sr-only">70% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Income Progressbar -->


                    <!-- Begin Population Progressbar -->
                    <div class="row">
                        <div class="col-md-12">
                            <p class="header text-uppercase m-n">Population</p>
                            <p class="">Lorem ipsum dolor sit amet.</p>

                            <div class="progress">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                                     aria-valuemin="0" aria-valuemax="100" style="width:40%">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Begin Population Progressbar -->

                    <!-- Begin GPD Progressbar -->
                    <div class="row">
                        <div class="col-md-12">
                            <p class="header text-uppercase m-n">GDP</p>
                            <p class="">Lorem ipsum dolor sit amet.</p>

                            <div class="progress">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40"
                                     aria-valuemin="0" aria-valuemax="100" style="width:40%">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End GPD Progressbar -->


                    <!-- Begin Sparkline -->
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="text-center">
                                <p class="header text-uppercase m-sm-b m-lg-t">profit trend</p>
                                <h3 class="fw-thk m-n">$ 450K</h3>
                                <small class="text-uppercase m-lg-b d-b">Profit this month</small>
                                <span class="map-profit-sparkline d-b m-md-b"></span>
                                <p>Profit increased by 4% <i class="fa fa-arrow-up text-success"></i></p>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <div class="text-center">
                                <p class="header text-uppercase m-sm-b m-lg-t">Sales trend</p>
                                <h3 class="fw-thk m-n">612K</h3>
                                <small class="text-uppercase m-lg-b d-b">Sales this month</small>
                                <span class="map-sales-sparkline d-b m-md-b"></span>
                                <p>Sales decreased by 2% <i class="fa fa-arrow-down text-danger"></i></p>
                            </div>
                        </div>
                    </div>
                    <!-- End Sparkline -->
                </div>
                <!-- End Panel Body -->
            </div>
            <!-- End Panel -->
        </div>
        <!-- End Map Stats -->
    </div>
    <!-- End Row -->

    <!-- Begin Row -->
    <div class="row row-xl bg-white">
        <!-- Begin Visitor Stats Text -->
        <div class="col-md-12">
            <div class="panel-x panel-transparent m-n">
                <div class="panel-body p-n-b">
                    <p class="header text-uppercase">Visitor Stats</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda vel, quis repellendus earum odio possimus aperiam quibusdam blanditiis sed voluptas nam aliquam atque nisi laborum, cum? Consequuntur in, autem nesciunt.</p>
                </div>
            </div>
        </div>
        <!-- End Visitor Stats Text -->

        <!-- Begin Pie -->
        <div class="col-md-3 col-sm-6">
            <!-- Begin Panel -->
            <div class="panel-x panel-transparent">
                <!-- Begin Panel Body -->
                <div class="panel-body">
                    <!-- Begin Pie Chart 1 -->
                    <p class="header text-uppercase"></p>
                    <div class="pie-chart1-dashboard pie-widget" data-percent="67">
                        <div class="pie-label-container">
                            <div class="pie-label">
                                <small class="text-uppercase">Unique Visitors</small>
                                <h1 class="m-n fw-thk">67%</h1>
                            </div>
                        </div>
                    </div>
                    <!-- End Pie Chart 1 -->


                    <!-- Begin Day Stats -->
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6 text-left">
                            <small class="text-uppercase">Today</small>
                            <h5 class="m-n fw-thk text-danger"><i class="fa fa-thumbs-down m-xs-r fa-fw"></i>-3.43%</h5>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                            <small class="text-uppercase">Yesterday</small>
                            <h5 class="m-n fw-thk text-success"><i class="fa fa-thumbs-up m-xs-r fa-fw"></i>6.42%</h5>
                        </div>
                    </div>
                    <!-- End Day Stats -->
                </div>
                <!-- End Panel Body -->
            </div>
            <!-- End Panel -->
        </div>
        <!-- End Pie -->


        <!-- Begin Pie -->
        <div class="col-md-3 col-sm-6">
            <!-- Begin Panel -->
            <div class="panel-x panel-transparent">
                <!-- Begin Panel Body -->
                <div class="panel-body">
                    <!-- Begin Pie Chart 2 -->
                    <p class="header text-uppercase"></p>
                    <div class="pie-chart2-dashboard pie-widget" data-percent="33">
                        <div class="pie-label-container">
                            <div class="pie-label">
                                <small class="text-uppercase">Repeated Visitors</small>
                                <h1 class="m-n fw-thk">33%</h1>
                            </div>
                        </div>
                    </div>
                    <!-- ENd Pie Chart 2 -->

                    <!-- Begin Day Stats -->
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6 text-left">
                            <small class="text-uppercase">Today</small>
                            <h5 class="m-n fw-thk text-danger"><i class="fa fa-thumbs-down m-xs-r fa-fw"></i>-19.22%</h5>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                            <small class="text-uppercase">Yesterday</small>
                            <h5 class="m-n fw-thk text-success"><i class="fa fa-thumbs-up m-xs-r fa-fw"></i>16.16%</h5>
                        </div>
                    </div>
                    <!-- ENd Day Stats -->
                </div>
                <!-- ENd Panel Body -->
            </div>
            <!-- End Panel -->
        </div>
        <!-- End Pie -->


        <!-- Begin Pie -->
        <div class="col-md-3 col-sm-6">
            <!-- Begin Pie -->
            <div class="panel-x panel-transparent">
                <!-- Begin Panel Body -->
                <div class="panel-body">
                    <!-- Begin Pie Chart 3 -->
                    <p class="header text-uppercase"></p>
                    <div class="pie-chart3-dashboard pie-widget" data-percent="56">
                        <div class="pie-label-container">
                            <div class="pie-label">
                                <small class="text-uppercase">New Visitors</small>
                                <h1 class="m-n fw-thk">56%</h1>
                            </div>
                        </div>
                    </div>
                    <!-- End Pie Chart 3 -->

                    <!-- Begin Day Stats -->
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6 text-left">
                            <small class="text-uppercase">Today</small>
                            <h5 class="m-n fw-thk text-success"><i class="fa fa-thumbs-up m-xs-r fa-fw"></i>13.12%</h5>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                            <small class="text-uppercase">Yesterday</small>
                            <h5 class="m-n fw-thk text-danger"><i class="fa fa-thumbs-down m-xs-r fa-fw"></i>-10.59%</h5>
                        </div>
                    </div>
                    <!-- End Day Stats -->
                </div>
                <!-- End Panel Body -->
            </div>
            <!-- End Panel -->
        </div>
        <!-- End Pie -->


        <!-- Begin Pie -->
        <div class="col-md-3 col-sm-6">
            <!-- Begin Panel -->
            <div class="panel-x panel-transparent">
                <!-- Begin Panel Body -->
                <div class="panel-body">
                    <!-- Begin Pie Chart 4 -->
                    <p class="header text-uppercase"></p>
                    <div class="pie-chart4-dashboard pie-widget" data-percent="38">
                        <div class="pie-label-container">
                            <div class="pie-label">
                                <small class="text-uppercase">One time visitors</small>
                                <h1 class="m-n fw-thk">38%</h1>
                            </div>
                        </div>
                    </div>
                    <!-- End Pie Chart 4 -->

                    <!-- Begin Day Stats -->
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6 text-left">
                            <small class="text-uppercase">Today</small>
                            <h5 class="m-n fw-thk text-success"><i class="fa fa-thumbs-up m-xs-r fa-fw"></i>10.98%</h5>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                            <small class="text-uppercase">Yesterday</small>
                            <h5 class="m-n fw-thk text-danger"><i class="fa fa-thumbs-down m-xs-r fa-fw"></i>-7.42%</h5>
                        </div>
                    </div>
                    <!-- End Day Stats -->
                </div>
                <!-- End Panel Body -->
            </div>
            <!-- End Panel -->
        </div>
        <!-- End Pie -->
    </div>
    <!-- End Row -->



    <!-- Begin Row -->
    <div class="row row-xl bg-white">
        <!-- Begin Realtime -->
        <div class="col-md-6">
            <!-- Begin Panel -->
            <div class="panel-x panel-transparent">
                <!-- Begin Panel Body -->
                <div class="panel-body">
                    <p class="header text-uppercase">Realtime</p>
                    <p class="m-lg-b">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus vitae eos ullam, ducimus, ab excepturi!</p>

                    <!-- Begin Stats -->
                    <div class="row">
                        <div class="col-md-4 col-sm-6 text-center m-lg-b">
                            <h3 class="m-n text-danger fw-thk">$ 543, 534</h3>
                            <small class="text-uppercase"><i class="fa fa-dollar m-xs-r fa-fw"></i>Total Earnings</small>
                        </div>

                        <div class="col-md-4 col-sm-6 text-center m-lg-b">
                            <h3 class="m-n text-danger fw-thk">$ 12, 526</h3>
                            <small class="text-uppercase"><i class="fa fa-money m-xs-r fa-fw"></i>Total Profit</small>
                        </div>

                        <div class="col-md-4 col-sm-6 text-center m-lg-b">
                            <h3 class="m-n text-success fw-thk">37843</h3>
                            <small class="text-uppercase"><i class="fa fa-shopping-cart fa-fw m-xs-r"></i>Total Items Sold</small>
                        </div>
                    </div>
                    <!-- End Stats -->

                    <!-- Begin Rickshaw Realtime -->
                    <div id="rickshaw-realtime"></div>
                    <!-- End Rickshaw Realtime -->
                </div>
                <!-- ENd Panel Body -->
            </div>
            <!-- End Panel -->
        </div>
        <!-- End Realtime -->


        <!-- Begin Items Sold -->
        <div class="col-md-6">
            <!-- Begin Panel -->
            <div class="panel-x panel-transparent">
                <!-- Begin Panel Body -->
                <div class="panel-body">
                    <p class="header text-uppercase">Items Sold</p>
                    <p class="m-lg-b">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates libero, optio in quos quo expedita.</p>

                    <!-- Begin Stats -->
                    <div class="row">
                        <div class="col-md-4 col-sm-6 text-center m-lg-b">
                            <h3 class="m-n text-danger fw-thk">$ 123, 456</h3>
                            <small class="text-uppercase"><i class="fa fa-dollar fa-fw m-xs-r"></i>Today's Earnings</small>
                        </div>

                        <div class="col-md-4 col-sm-6 text-center m-lg-b">
                            <h3 class="m-n text-success fw-thk">$ 44, 526</h3>
                            <small class="text-uppercase"><i class="fa fa-money m-xs-r fa-fw"></i>Today's Profit</small>
                        </div>

                        <div class="col-md-4 col-sm-6 text-center m-lg-b">
                            <h3 class="m-n text-success fw-thk">458</h3>
                            <small class="text-uppercase"><i class="fa fa-shopping-cart fa-fw m-xs-r"></i>Today's Item Sold</small>
                        </div>
                    </div>
                    <!-- End Stats -->

                    <!-- Begin Table Responsive -->
                    <div class="h-250 table-responsive">
                        <!-- Begin Table -->
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th class="col-xs-6 text-black">Item</th>
                                <th class="col-xs-2 text-black">Customer</th>
                                <th class="col-xs-2 text-black">Product</th>
                                <th class="col-xs-2 text-black">Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Admin Template</td>
                                <td>Lilly</td>
                                <td>A124</td>
                                <td>$ 19</td>
                            </tr>

                            <tr>
                                <td>UI Kit</td>
                                <td>Rip</td>
                                <td>U556</td>
                                <td>$ 27</td>
                            </tr>

                            <tr>
                                <td>Font Pack</td>
                                <td>Crystal</td>
                                <td>F918</td>
                                <td>$ 56</td>
                            </tr>

                            <tr>
                                <td>Mega Bundle</td>
                                <td>Alice</td>
                                <td>MB776</td>
                                <td>$ 99</td>
                            </tr>

                            <tr>
                                <td>Admin Template</td>
                                <td>Lilly</td>
                                <td>A124</td>
                                <td>$ 19</td>
                            </tr>

                            <tr>
                                <td>UI Kit</td>
                                <td>Rip</td>
                                <td>U556</td>
                                <td>$ 27</td>
                            </tr>

                            <tr>
                                <td>Font Pack</td>
                                <td>Crystal</td>
                                <td>F918</td>
                                <td>$ 56</td>
                            </tr>

                            <tr>
                                <td>Mega Bundle</td>
                                <td>Alice</td>
                                <td>MB776</td>
                                <td>$ 99</td>
                            </tr>
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
        <!-- End Items Sold -->
    </div>
    <!-- End Row -->
@endsection

@section("scripts")
    <script src="{{ asset("scripts/plugins/d3/d3.min.js") }}"></script>
    <script src="{{ asset("scripts/plugins/nvd3/build/nv.d3.min.js") }}"></script>
    <script src="{{ asset("scripts/plugins/raphael/raphael.min.js") }}"></script>
    <script src="{{ asset("scripts/plugins/jquery-mapael/js/jquery.mapael.min.js") }}"></script>
    <script src="{{ asset("scripts/plugins/jquery-mapael/js/maps/usa_states.min.js") }}"></script>
    <script src="{{ asset("scripts/plugins/highcharts/highcharts.js") }}"></script>
    <script src="{{ asset("scripts/plugins/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js") }}"></script>
    <script src="{{ asset("scripts/plugins/rickshaw/rickshaw.min.js") }}"></script>
@endsection

@section("styles")
    <link rel="stylesheet" href="{{ asset("scripts/plugins/nvd3/build/nv.d3.min.css") }}">
@endsection

@section("page-script")
    <script src="{{ asset("scripts/pages/dashboard.js") }}"></script>
@endsection