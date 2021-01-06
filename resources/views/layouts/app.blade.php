<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>Filex | {{ $titlePage }}</title> <!-- TODO: Modificar etiquetas Meta de la app -->

        <meta name="description" content="Aplicación Filex, firma de contratos digitales">
        <meta name="author" content="Tooring">
        <meta name="robots" content="noindex, nofollow">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="img/favicon.ico">
        <link rel="apple-touch-icon" href="{{ asset('backend/img/icon57.png') }}" sizes="57x57">
        <link rel="apple-touch-icon" href="{{ asset('backend/img/icon72.png') }}" sizes="72x72">
        <link rel="apple-touch-icon" href="{{ asset('backend/img/icon76.png') }}" sizes="76x76">
        <link rel="apple-touch-icon" href="{{ asset('backend/img/icon114.png') }}" sizes="114x114">
        <link rel="apple-touch-icon" href="{{ asset('backend/img/icon120.png') }}" sizes="120x120">
        <link rel="apple-touch-icon" href="{{ asset('backend/img/icon144.png') }}" sizes="144x144">
        <link rel="apple-touch-icon" href="{{ asset('backend/img/icon152.png') }}" sizes="152x152">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.css') }}">

        <!-- Related styles of various icon packs and javascript plugins -->
        <link rel="stylesheet" href="{{ asset('backend/css/plugins.css') }}">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="{{ asset('backend/css/main.css') }}">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="{{ asset('backend/css/themes.css') }}">
        <!-- END Stylesheets -->

        <!-- Modernizr (Browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->
        <script src="{{ asset('backend/js/vendor/modernizr-respond.min.js') }}"></script>

        <!-- Font Awesome -->
        <link href="{{ asset('backend/css/fonts/fontawesome/css/all.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    </head>
    <!-- In the PHP version you can set the following options from the config file -->
    <!--
        Add one of the following classes to the body element for the desirable feature:
        'sidebar-left-pinned'                         for a left pinned sidebar (always visible > 1200px)
        'sidebar-right-pinned'                        for a right pinned sidebar (always visible > 1200px)
        'sidebar-left-pinned sidebar-right-pinned'    for both sidebars pinned (always visible > 1200px)
    -->
    <body class="header-fixed-top ">
        <!-- Left Sidebar -->
        <!-- In the PHP version you can set the following options from the config file -->
        <!-- If you add the class .enable-hover, then a small portion of left sidebar will be visible and it can be opened with a mouse hover (> 1200px) (may affect website performance) -->
        <div id="sidebar-left" class="enable-hover">
            <!-- Sidebar Content -->
            <div class="sidebar-content">
                <!-- Search Form -->
                <form action="page_ready_search_results.html" method="post" class="sidebar-search">
                    <input type="text" id="sidebar-search-term" name="sidebar-search-term" placeholder="Search..">
                </form>
                <!-- END Search Form -->

                <!-- Wrapper for scrolling functionality -->
                <div class="sidebar-left-scroll">
                    <!-- Sidebar Navigation -->
                    <ul class="sidebar-nav">
                        <li>
                            <h2 class="sidebar-header">Welcome</h2>
                        </li>
                        <li>
                            <a href="{{ route('dashboard') }}" class="{{ $activePage == 'dashboard' ? ' active' : '' }}"><i class="fa fa-home"></i>Dashboard</a>
                        </li>
                        <li>
                            <h2 class="sidebar-header">Mis documentos</h2>
                        </li>
                        <li>
                            <a href="{{ route('files.index') }}" class="{{ $activePage == 'files' ? ' active' : '' }}"><i class="fa fa-file-pdf-o"></i>Mis Archivos</a>
                        </li>
                        <li>
                            <a href="{{ route('contracts.index') }}" class="{{ $activePage == 'contracts' ? ' active' : '' }}"><i class="fas fa-file-contract"></i>Mis Contratos</a>
                        </li>

                        <li>
                            <h2 class="sidebar-header">Información</h2>
                        </li>
                        <li>
                            <a href="#" class="menu-link"><i class="fa fa-gear"></i>Tipos de Firmas</a>
                            <ul>
                                <li>
                                    <a href="page_comp_animations.html">e Firma</a>
                                </li>
                                <li>
                                    <a href="page_comp_carousel.html">Digital</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="menu-link"><i class="fa fa-file"></i>Aspectos Legales</a>
                            <ul>
                                <li>
                                    <a href="page_ready_blank.html">Ascpecto 1</a>
                                </li>
                                <li>
                                    <a href="page_ready_404.html">Ascpecto 2</a>
                                </li>
                                <li>
                                    <a href="page_ready_search_results.html">Ascpecto 3</a>
                                </li>
                                <li>
                                    <a href="page_ready_pricing_tables.html">Ascpecto 4</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <h2 class="sidebar-header">Administración</h2>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-envelope-o"></i>Mi Perfil</a>
                        </li>
                        <li class="{{ $activePage == 'slider' ? ' active' : '' }}">
                            <a href="#" class="menu-link"><i class="fa fa-paper-plane"></i>LandignPage</a>
                            <ul>
                                <li>
                                    <a href="{{ route('sliders.index') }}" class="{{ $activePage == 'slider' ? ' active' : '' }}">Sliders</a>
                                </li>
                                <li>
                                    <a href="{{ route('about.edit', 1) }}" class="{{ $activePage == 'about' ? ' active' : '' }}">Nosotros</a>
                                </li>
                                <li>
                                    <a href="#">Planes</a>
                                </li>
                                <li>
                                    <a href="#">Contacto</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <!-- END Sidebar Navigation -->
                </div>
                <!-- END Wrapper for scrolling functionality -->
            </div>
            <!-- END Sidebar Content -->
        </div>
        <!-- END Left Sidebar -->

        <!-- Right Sidebar -->
        <!-- In the PHP version you can set the following options from the config file -->
        <!-- If you add the class .enable-hover, then a small portion of right sidebar will be visible and it can be opened with a mouse hover (> 1200px) (may affect website performance) -->
        <div id="sidebar-right">
            <!-- Sidebar Content -->
            <div class="sidebar-content">
                <!-- User Info -->
                <div class="user-info">
                    <div class="user-details"><a href="#">{{ Auth::user()->name }}</a><br><em>Role</em></div>
                    <img src="{{ asset('backend/img/template/avatar.png') }}" alt="Avatar">
                </div>
                <!-- END User Info -->

                <!-- Wrapper for scrolling functionality -->
                <div class="sidebar-right-scroll">
                    <!-- Color Themes -->
                    {{-- <div class="sidebar-section">
                        <h2 class="sidebar-header">Color Themes</h2>
                        <!-- Change Color Theme functionality can be found in main.js - templateOptions() -->
                        <ul class="theme-colors clearfix">
                            <li class="active">
                                <a href="javascript:void(0)" class="themed-background-default themed-border-default" data-theme="default" data-toggle="tooltip" title="Default"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-river themed-border-river" data-theme="css/themes/river.css" data-toggle="tooltip" title="River"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-amethyst themed-border-amethyst" data-theme="css/themes/amethyst.css" data-toggle="tooltip" title="Amethyst"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-dragon themed-border-dragon" data-theme="css/themes/dragon.css" data-toggle="tooltip" title="Dragon"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-emerald themed-border-emerald" data-theme="css/themes/emerald.css" data-toggle="tooltip" title="Emerald"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-grass themed-border-grass" data-theme="css/themes/grass.css" data-toggle="tooltip" title="Grass"></a>
                            </li>
                        </ul>
                    </div> --}}
                    <!-- END Color Themes -->

                    <!-- User Menu -->
                    <ul class="sidebar-nav">
                        <li>
                            <h2 class="sidebar-header">Menú</h2>
                        </li>
                        {{-- <li>
                            <a href="page_special_timeline.html"><i class="fa fa-clock-o"></i> Updates</a>
                        </li>
                        <li>
                            <a href="page_special_user_profile.html"><i class="fa fa-pencil-square"></i> Profile</a>
                        </li>
                        <li>
                            <a href="page_special_message_center.html"><i class="fa fa-envelope-o"></i> Messages</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="fa fa-cog"></i> Settings</a>
                        </li> --}}
                        <li>
                            {{-- <a href="page_special_login.html"><i class="fa fa-power-off"></i> Logout</a> --}}
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                    <!-- END User Menu -->

                    <!-- Notifications -->
                    {{-- <div class="sidebar-section">
                        <h2 class="sidebar-header">Notifications</h2>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <small><em>2 hours ago</em></small><br>
                            PHP version updated successfully on <a href="javascript:void(0)">Server #5</a>
                        </div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <small><em>3 hours ago</em></small><br>
                            <a href="javascript:void(0)">Game Server</a> crashed but restored!
                        </div>
                        <div class="alert alert-warning alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <small><em>5 hours ago</em></small><br>
                            <a href="javascript:void(0)">FTP Server</a> went down for maintenance!
                        </div>
                    </div> --}}
                    <!-- END Notifications -->

                    <!-- Messages -->
                    {{-- <div class="sidebar-section">
                        <h2 class="sidebar-header">Messages</h2>
                        <div class="alert alert-info">
                            <small><a href="page_special_user_profile.html">Claire</a>, 2 minutes ago</small><br>
                            Hi John, I just wanted to let you know that.. <a href="page_special_message_center.html">more</a>
                        </div>
                        <div class="alert alert-info">
                            <small><a href="page_special_user_profile.html">Michael</a>, 5 minutes ago</small><br>
                            The project is moving along just fine and we.. <a href="page_special_message_center.html">more</a>
                        </div>
                    </div> --}}
                    <!-- END Messages -->
                </div>
                <!-- END Wrapper for scrolling functionality -->
            </div>
            <!-- END Sidebar Content -->
        </div>
        <!-- END Right Sidebar -->

        <!-- Page Container -->
        <!-- In the PHP version you can set the following options from the config file -->
        <!-- Add the class .full-width for a full width page (100%, 1920px max width) -->
        <div id="page-container" class="full-width">
            <!-- Header -->
            <!-- In the PHP version you can set the following options from the config file -->
            <!-- Add the class .navbar-default or .navbar-inverse for a light or dark header respectively -->
            <!-- Add the class .navbar-fixed-top or .navbar-fixed-bottom for a fixed header on top or bottom respectively -->
            <!-- If you add the class .navbar-fixed-top remember to add the class .header-fixed-top to <body> element -->
            <!-- If you add the class .navbar-fixed-bottom remember to add the class .header-fixed-bottom to <body> element -->
            <header class="navbar navbar-default navbar-fixed-top">
                <!-- Right Header Navigation -->
                <ul class="nav header-nav pull-right">
                    {{-- <li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-cogs"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-custom pull-right">
                            <li class="dropdown-header text-center">HEADER</li>
                            <li>
                                <div class="btn-group btn-group-justified btn-group-sm">
                                    <a href="javascript:void(0)" class="btn btn-default" id="options-header-default">Default</a>
                                    <a href="javascript:void(0)" class="btn btn-default" id="options-header-inverse">Inverse</a>
                                </div>
                            </li>
                            <li>
                                <div class="btn-group btn-group-justified btn-group-sm">
                                    <a href="javascript:void(0)" class="btn btn-default" id="options-header-top">Top</a>
                                    <a href="javascript:void(0)" class="btn btn-default" id="options-header-bottom">Bottom</a>
                                </div>
                            </li>
                            <li class="hidden-xs hidden-sm dropdown-header text-center">FULL WIDTH PAGE</li>
                            <li class="hidden-xs hidden-sm">
                                <div class="btn-group btn-group-justified btn-group-sm">
                                    <a href="javascript:void(0)" class="btn btn-default" id="options-fw-disable">Disable</a>
                                    <a href="javascript:void(0)" class="btn btn-default" id="options-fw-enable">Enable</a>
                                </div>
                            </li>
                            <li class="visible-lg dropdown-header text-center">PIN SIDEBARS</li>
                            <li class="visible-lg">
                                <div class="btn-group btn-group-justified btn-group-sm">
                                    <a href="javascript:void(0)" class="btn btn-default" id="options-pin-left">Pin Left</a>
                                    <a href="javascript:void(0)" class="btn btn-default" id="options-pin-right">Pin Right</a>
                                </div>
                            </li>
                            <li class="visible-lg dropdown-header text-center">SIDEBARS MOUSE HOVER</li>
                            <li class="visible-lg">
                                <div class="btn-group btn-group-justified btn-group-sm">
                                    <a href="javascript:void(0)" class="btn btn-default" id="options-hover-left">Left</a>
                                    <a href="javascript:void(0)" class="btn btn-default" id="options-hover-right">Right</a>
                                </div>
                            </li>
                            <li class="visible-lg hidden-lt-ie9 dropdown-header text-center">EFFECT WHEN SIDEBARS OPEN</li>
                            <li class="visible-lg hidden-lt-ie9 text-center">
                                <div class="btn-group-vertical btn-group-sm" id="option-effects">
                                    <button class="btn btn-default" data-fx="fx-none">None</button>
                                    <button class="btn btn-default" data-fx="fx-opacity">Opacity</button>
                                    <button class="btn btn-default" data-fx="fx-move">Move</button>
                                    <button class="btn btn-default" data-fx="fx-push">Push</button>
                                    <button class="btn btn-default" data-fx="fx-rotate">Rotate</button>
                                    <button class="btn btn-default" data-fx="fx-push-move">Push and Move</button>
                                    <button class="btn btn-default" data-fx="fx-push-rotate">Push and Rotate</button>
                                </div>
                            </li>
                        </ul>
                    </li> --}}
                    <li>
                        <a href="javascript:void(0)" id="sidebar-right-toggle">
                            <strong></strong> <i class="fa fa-user"></i>
                        </a>
                    </li>
                </ul>
                <!-- END Right Header Navigation -->

                <!-- Left Header Navigation -->
                <ul class="nav header-nav pull-left">
                    <li>
                        <a href="javascript:void(0)" id="sidebar-left-toggle">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                </ul>
                <!-- END Left Header Navigation -->

                <!-- Header Brand -->
                <a href="{{ route('dashboard') }}" class="navbar-brand">
                    <img src="{{ asset('backend/img/template/brand.png') }}" alt="Filex">
                    <span>Filex</span>
                </a>
                <!-- END Header Brand -->
            </header>
            <!-- END Header -->

            <!-- FX Container -->
            <!-- In the PHP version you can set the following options from the config file -->
            <!--
                All effects apply in resolutions larger than 1200px width
                Add one of the following classes to #fx-container for setting an effect to main content when one of the sidebars are opened
                'fx-none'           remove all effects (better website performance)
                'fx-opacity'        opacity effect
                'fx-move'           move effect
                'fx-push'           push effect
                'fx-rotate'         rotate effect
                'fx-push-move'      push-move effect
                'fx-push-rotate'    push-rotate effect
            -->
            <div id="fx-container" class="fx-opacity">
                <!-- Page content -->
                <div id="page-content" class="block">
                    @yield('content')
                </div>
                <!-- END Page Content -->

                <!-- Remember to include excanvas for IE8 chart support -->
                <!--[if IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->

                <!-- Footer -->
                <footer class="clearfix">
                    <div class="pull-right">
                        Crafted with <i class="fa fa-heart text-danger"></i> by <a href="#" target="_blank">Tooring</a>
                    </div>
                    <div class="pull-left">
                        <?php echo date('Y'); ?> &copy; <a href="{{ route('welcome') }}" target="_blank">Filex V.0.1</a>
                    </div>
                </footer>
                <!-- END Footer -->
            </div>
            <!-- END FX Container -->
        </div>
        <!-- END Page Container -->

        <!-- Scroll to top link, check main.js - scrollToTop() -->
        <a href="javascript:void(0)" id="to-top"><i class="fa fa-angle-up"></i></a>

        <!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>!window.jQuery && document.write(decodeURI('%3Cscript src="{{ asset('js/vendor/jquery-1.11.1.min.js') }}"%3E%3C/script%3E'));</script>

        <!-- Bootstrap.js, Jquery plugins and custom Javascript code -->
        <script src="{{ asset('backend/js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('backend/js/plugins.js') }}"></script>
        <script src="{{ asset('backend/js/main.js') }}"></script>

        <!-- ckeditor.js, load it only in the page you would like to use CKEditor -->
        <script src="{{ asset('backend/js/ckeditor/ckeditor.js') }}"></script>

        <!-- Javascript code only for this page -->
        {{-- <script>
            $(function () {
                // Set up timeline scrolling functionality
                $('.timeline-con').slimScroll({height: 565, color: '#000000', size: '3px', touchScrollStep: 100, distance: '0'});
                $('.timeline').css('min-height', '565px');

                // Demo status updates and timeline functionality
                var statusUpdate = $('#status-update');
                var statusUpdateVal = '';

                $('#accept-request').click(function () {
                    $(this).replaceWith('<span class="label label-success">Awesome, you became friends!');
                });

                $('#status-update-btn').click(function () {
                    statusUpdateVal = statusUpdate.val();

                    if (statusUpdateVal) {
                        $('.timeline-con').slimScroll({scrollTo: '0px'});

                        $('.timeline').prepend('<li class="animation-pullDown">' +
                            '<div class="timeline-item">' +
                            '<h4 class="timeline-title"><small class="timeline-meta">just now</small><i class="fa fa-file"></i> Status</h4>' +
                            '<div class="timeline-content"><p>' + $('<div />').text(statusUpdateVal).html().substring(0, 200) + '</p><em>Demo functionality</em></div>' +
                            '</div>' +
                            '</li>');

                        statusUpdate.val('').attr('placeholder', 'I hope you like it! :-)');
                    }
                });

                /*
                 * Flot 0.8.3 Jquery plugin is used for charts
                 *
                 * For more examples or getting extra plugins you can check http://www.flotcharts.org/
                 * Plugins included in this template: pie, resize, stack
                 */

                // Get the elements where we will attach the charts
                var chartClassic = $('#chart-classic');

                // Random data for the charts
                var dataEarnings = [[0, 60], [1, 100], [2, 80], [3, 84], [4, 124], [5, 90], [6, 150]];
                var dataSales = [[0, 30], [1, 50], [2, 40], [3, 42], [4, 62], [5, 45], [6, 75]];

                /* Classic Chart */
                $.plot(chartClassic,
                    [
                        {
                            data: dataEarnings,
                            lines: {show: true, fill: true, fillColor: {colors: [{opacity: 0.25}, {opacity: 0.25}]}},
                            points: {show: true, radius: 7}
                        },
                        {
                            data: dataSales,
                            lines: {show: true, fill: true, fillColor: {colors: [{opacity: 0.15}, {opacity: 0.15}]}},
                            points: {show: true, radius: 7}
                        }
                    ],
                    {
                        colors: ['#f39c12', '#2e3030'],
                        legend: {show: false},
                        grid: {borderWidth: 0, hoverable: true, clickable: true},
                        yaxis: {show: false},
                        xaxis: {show: false}
                    }
                );

                // Creating and attaching a tooltip to the classic chart
                var previousPoint = null, ttlabel = null;
                chartClassic.bind('plothover', function (event, pos, item) {

                    if (item) {
                        if (previousPoint !== item.dataIndex) {
                            previousPoint = item.dataIndex;

                            $('#chart-tooltip').remove();
                            var x = item.datapoint[0], y = item.datapoint[1];

                            if (item.seriesIndex === 1) {
                                ttlabel = '<strong>' + y + '</strong> sales';
                            } else {
                                ttlabel = '$ <strong>' + y + '</strong>';
                            }

                            $('<div id="chart-tooltip" class="chart-tooltip">' + ttlabel + '</div>')
                                .css({top: item.pageY - 45, left: item.pageX + 5}).appendTo("body").show();
                        }
                    }
                    else {
                        $('#chart-tooltip').remove();
                        previousPoint = null;
                    }
                });
            });
        </script> --}}

        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}

    </body>
</html>
