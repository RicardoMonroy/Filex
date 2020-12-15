<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <!-- Author -->
    <meta name="author" content="Tooring">
    <!-- Description -->
    <meta name="description" content="Plataforma de firmas digitales">
    <!-- Page Title -->
    <title>{{ config('app.name', 'Filex') }}</title>
    <!-- Favicon -->
    <link href="{{ asset('frontend/images/favicon.ico') }}" rel="icon">
    <!-- Bundle -->
    <link href="{{ asset('vendor/css/bundle.min.css') }}" rel="stylesheet">
    <!-- Plugin Css -->
    <link href="{{ asset('endor/css/LineIcons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/css/revolution-settings.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/css/cubeportfolio.min.css') }}" rel="stylesheet">
    <!-- Style Sheet -->
    <link href="{{ asset('frontend/css/navigation.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/line-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="90">

<!-- Loader -->
<div class="loader-bg">
    <div class="loader"></div>
</div>
<!-- Loader ends -->

<!-- START HEADER -->
<header>
    <!--Navigation-->
    <nav class="navbar navbar-top-default navbar-expand-lg navbar-simple nav-line">
        <div class="container round-nav">
            <a href="index-frontend.html" title="Logo" class="logo scroll">
                <!--Logo Default-->
                <img src="{{ asset('frontend/images/logoAlt.png') }}" alt="logo" class="ml-lg-3 m-0">
            </a>

            <!--Nav Links-->
            <div class="collapse navbar-collapse" id="megaone">
                <div class="navbar-nav ml-auto">
                    <a class="nav-link scroll line" href="#slider-section">Home</a>
                    <a class="nav-link scroll line" href="#about">Nosotros</a>
                    {{-- <a class="nav-link scroll line" href="#portfolio">Our Clients</a> --}}
                    <a class="nav-link scroll line" href="#pricing">Planes</a>
                    {{-- <a class="nav-link scroll line" href="#blog">Blog</a> --}}
                    @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-large btn-rounded btn-strongBlue btn-hvr-up btn-hvr-blue">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-large btn-rounded btn-strongBlue btn-hvr-up btn-hvr-blue">Acceder</a>
                                {{-- @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-large btn-rounded btn-strongBlue btn-hvr-up btn-hvr-blue" >Registro</a>
                                @endif --}}
                            @endauth
                        </div>
                    @endif

                </div>
            </div>
        </div>

        <!--Side Menu Button-->
        <div class="navigation-toggle">
            <ul class="slider-social toggle-btn my-0">
                <li>
                    <a href="javascript:void(0);" class="sidemenu_btn" id="sidemenu_toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!--Side Nav-->
    <div class="side-menu hidden">

        <div class="mega-title" id="mega-title"><h2 class="inner-mega-title">Filex</h2></div>

        <span id="btn_sideNavClose">
          <i class="las la-times btn-close"></i>
        </span>
        <div class="inner-wrapper">
            <nav class="side-nav w-100">
                <a href="index-frontend.html" title="Logo" class="logo scroll navbar-brand">
                    <img src="frontend/images/logo.png" alt="logo">
                </a>
                <ul class="navbar-nav text-capitalize">
                    <li class="nav-item">
                        <a class="nav-link scroll" href="#slider-section">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll" href="#about">Nosotros</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link scroll" href="#portfolio">Our Clients</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link scroll" href="#pricing">Planes</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link scroll" href="#blog">Blog</a>
                    </li> --}}
                    <li class="get-started-btn">
                        <a href="" class="btn btn-medium btn-rounded btn-blue btn-hvr-strongBlue btn-hvr-up d-lg-none" data-animation-duration="500" data-fancybox data-src="#animatedModal">Get Started</a>
                    </li>
                </ul>
            </nav>

            <div class="side-footer w-100">
                {{-- <ul class="social-icons-simple">
                    <li><a class="facebook_bg_hvr2 wow fadeInLeft" href="javascript:void(0)" data-wow-delay="300ms"><i class="fab fa-facebook-f"></i> </a> </li>
                    <li><a class="instagram_bg_hvr2 wow fadeInUp" href="javascript:void(0)" data-wow-delay="500ms"><i class="fab fa-instagram"></i> </a> </li>
                    <li><a class="twitter_bg_hvr2 wow fadeInRight" href="javascript:void(0)" data-wow-delay="300ms"><i class="fab fa-twitter"></i> </a> </li>
                </ul> --}}
                <p>&copy; 2020 Filex. Made With Love by Tooring</p>
            </div>
        </div>
    </div>
    <a id="close_side_menu" href="javascript:void(0);"></a>
    <!-- End side menu -->

    <!--Get Started Model Popup-->
    {{-- <div class="quote-content hidden animated-modal" id="animatedModal">
        <!--Heading-->
        <div class="pb-md-5 p-0 text-center">
            <span class="text-blue font-weight-200 font-20">We are MegaOne Company</span>
            <h2 class="main-font font-weight-600 text-black mt-2">Lets start your <span class="text-strongBlue js-rotating">project, website</span></h2>
        </div>
        <!--Contact Form-->
        <form class="contact-form" id="modal-contact-form-data">
            <div class="row">
                <!--Result-->
                <div class="col-12" id="quote_result"></div>

                <!--Left Column-->
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" id="quote_name" name="quoteName" placeholder="Name" required=""
                               type="text">
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="quote_contact" name="userPhone" placeholder="Contact #" required=""
                               type="text">
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="quote_type" name="projectType" placeholder="Project type" required=""
                               type="text">
                    </div>
                </div>

                <!--Right Column-->
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" id="quote_email" name="userEmail" placeholder="Email" required=""
                               type="email">
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="quote_address" name="userAddress" placeholder="City / Country"
                               required="" type="text">
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="quote_budget" name="quoteBudget" placeholder="Budget" required=""
                               type="text">
                    </div>
                </div>

                <!--Full Column-->
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea class="form-control" id="userMessage"
                                  name="userMessage"  placeholder="Please explain your project in detail."></textarea>
                    </div>
                </div>

                <!--Button-->
                <div class="col-md-12">
                    <div class="form-check">
                        <label class="checkbox-lable font-weight-200 font-16">Contact by phone is preferred
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <a href="javascript:void(0)" class="btn btn-large btn-rounded btn-strongBlue btn-hvr-up btn-hvr-blue modal_contact_btn" id="quote_submit_btn">Submit Now</a>
                </div>
            </div>
        </form>
    </div> --}}
</header>
<!-- END HEADER -->

<!-- START MAIN SLIDER -->
<div id="slider-section" class="slider-section">
    <div id="revo_main_wrapper" class="rev_slider_wrapper fullwidthbanner-container m-0 p-0 bg-dark" data-alias="classic4export" data-source="gallery">
        <!-- START REVOLUTION SLIDER 5.4.1 fullwidth mode -->
        <div id="vertical-bullets" class="rev_slider fullwidthabanner white vertical-tpb" data-version="5.4.1">
            <ul>
                <!-- SLIDE 1 -->
                <li data-index="rs-01" data-transition="fade" data-slotamount="default" data-easein="Power100.easeIn" data-easeout="Power100.easeOut" data-masterspeed="2000" data-fsmasterspeed="1500" data-param1="01">
                    <!-- MAIN IMAGE -->

                    <img src="frontend/images/Banner1.png"  data-kenburns="on" data-duration="15000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10"  data-bgfit="cover" data-bgrepeat="no-repeat" data-bgposition="center center" class="rev-slidebg" alt="slider-image" data-no-retina>
                    <div class="bg-overlay bg-black opacity-5"></div>
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption tp-resizeme rs-parallaxlevel-2"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-80','-80','-65','-65']"
                         data-width="none" data-height="none" data-type="text"
                         data-textAlign="['center','center','center','center']"
                         data-responsive_offset="on" data-start="1000"
                         data-frames='[{"delay":10,"speed":2000,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":280,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'>
                        <p class="text-white alt-font font-18">¡Olvídate de los papeles!</p>
                    </div>
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption tp-resizeme rs-parallaxlevel-3"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-30','-30','-10','-10']"
                         data-width="none" data-height="none" data-type="text"
                         data-textAlign="['center','center','center','center']"
                         data-responsive_offset="on" data-start="1000"
                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                        <h1 class="text-white font-40 main-font font-weight-600 text-capitalize">Filex</h1>
                    </div>
                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption tp-resizeme rs-parallaxlevel-3"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['20','20','30','30']"
                         data-width="none" data-height="none" data-type="text"
                         data-textAlign="['center','center','center','center']"
                         data-responsive_offset="on" data-start="1000"
                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                        <h1 class="text-white font-40 main-font font-weight-600 text-capitalize"><span class="font-weight-200">Gestión de</span> <span>Firmas Digitales.</span>
                        </h1>
                    </div>
                    <!-- LAYER NR. 4 -->
                    <div class="tp-caption tp-resizeme rs-parallaxlevel-2"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['95','95','100','100']"
                         data-width="none" data-height="none" data-type="text"
                         data-textAlign="['center','center','center','center']"
                         data-responsive_offset="on" data-start="1500"
                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                        <p class="text-white alt-font font-18">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae egestas mi, vel dapi<br>bus diam. Mauris malesuada, nisl non rutrum commodo, sem magna.</p>
                    </div>
                    <!-- LAYER NR. 5 -->
                    <div class="tp-caption tp-resizeme rs-parallaxlevel-2"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['180','180','175','190']"
                         data-width="['500','500','500','500']" data-textalign="['center','center','center','center']" data-type="text"
                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                        <a href="#about" class="scroll btn btn-medium btn-rounded btn-blue btn-hvr-strongBlue btn-hvr-up">Conócenos</a>
                    </div>
                </li>

                <!-- SLIDE 2 -->
                <li data-index="rs-02" data-transition="fade" data-slotamount="default" data-easein="Power100.easeIn" data-easeout="Power100.easeOut" data-masterspeed="2000" data-fsmasterspeed="1500" data-param1="02">
                    <!-- MAIN IMAGE -->
                    <img src="frontend/images/Banner2.png" data-kenburns="on" data-duration="13000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10"  data-bgfit="cover" data-bgrepeat="no-repeat" data-bgposition="center center" class="rev-slidebg" alt="slider-image" data-no-retina>
                    <div class="bg-overlay bg-black opacity-5"></div>
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption tp-resizeme"
                         data-x="['left','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-60','-60','-55','-55']"
                         data-width="none" data-height="none" data-type="text"
                         data-textAlign="['left','center','center','center']"
                         data-responsive_offset="on" data-start="1000"
                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                        <h1 class="text-white main-font font-40 font-weight-600">Filex</h1>
                    </div>
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption tp-resizeme"
                         data-x="['left','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-5','-5','-5','-5']"
                         data-width="none" data-height="none" data-type="text"
                         data-textAlign="['left','center','center','center']"
                         data-responsive_offset="on" data-start="1500"
                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                        <h1 class="text-white font-40 main-font font-weight-600"><span class="font-weight-200">Un lugar para firmar tus</span> documentos.</h1>
                    </div>
                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption tp-resizeme"
                         data-x="['left','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['70','70','70','70']"
                         data-width="none" data-height="none" data-whitespace="nowrap" data-type="text"
                         data-textAlign="['left','center','center','center']"
                         data-responsive_offset="on" data-start="2000"
                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                        <p class="text-white alt-font font-18">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae egestas mi, vel dapi<br>bus diam. Mauris malesuada, nisl non rutrum commodo, sem magna.</p>
                    </div>
                    <!-- LAYER NR. 4 -->
                    <div class="tp-caption tp-resizeme"
                         data-x="['left','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['155','155','150','150']"
                         data-width="['500','500','500','500']" data-textalign="['left','center','center','center']" data-type="text"
                         data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power4.easeInOut;" data-transform_out="s:900;e:Power2.easeInOut;s:900;e:Power2.easeInOut;" data-start="1800" data-splitin="none" data-splitout="none" data-responsive_offset="on">
                        <a href="#contact" class="scroll btn btn-medium btn-rounded btn-blue btn-hvr-strongBlue btn-hvr-up">Learn More</a>
                    </div>
                </li>

                <!-- SLIDE 3 -->
                <li data-index="rs-03" data-transition="fade" data-slotamount="default" data-easein="Power100.easeIn" data-easeout="Power100.easeOut" data-masterspeed="2000" data-fsmasterspeed="1500" data-param1="03">
                    <!-- MAIN IMAGE -->
                    <img src="frontend/images/Banner3.png" data-kenburns="on" data-duration="11000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10"  data-bgfit="cover" data-bgrepeat="no-repeat" data-bgposition="center center" class="rev-slidebg" alt="slider-image" data-no-retina>
                    <div class="bg-overlay bg-black opacity-4"></div>
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption tp-resizeme"
                         data-x="['right','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-60','-60','-55','-55']"
                         data-whitespace="nowrap" data-responsive_offset="on"
                         data-width="['none','none','none','none']" data-type="text"
                         data-textalign="['right','center','center','center']"
                         data-transform_idle="o:1;"
                         data-transform_in="x:-50px;opacity:0;s:2000;e:Power3.easeOut;"
                         data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                         data-start="1000" data-splitin="none" data-splitout="none">
                        <h1 class="text-white main-font font-40 font-weight-600">No corras riesgos</h1>
                    </div>
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption tp-resizeme"
                         data-x="['right','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                         data-whitespace="nowrap" data-responsive_offset="on"
                         data-width="['none','none','none','none']" data-type="text"
                         data-textalign="['right','center','center','center']" data-fontsize="['48','48','20','26']"
                         data-transform_idle="o:1;"
                         data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                         data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                         data-start="900" data-splitin="none" data-splitout="none">
                        <h1 class="text-white font-40 main-font font-weight-600"><span class="font-weight-200">Utiliza</span> Filex</h1>
                    </div>
                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption tp-resizeme"
                         data-x="['right','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['70','70','70','70']"
                         data-width="none" data-height="none" data-whitespace="nowrap" data-type="text"
                         data-textAlign="['right','center','center','center']"
                         data-responsive_offset="on" data-start="2000"
                         data-transform_in="z:0;rX:0deg;rY:0;rZ:0;sX:2;sY:2;skX:0;skY:0;opacity:0;s:1000;e:Power2.easeOut;"
                         data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;">
                        <p class="text-white alt-font font-18">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae egestas mi, vel dapi<br>bus diam. Mauris malesuada, nisl non rutrum commodo, sem magna.</p>
                    </div>
                    <!-- LAYER NR. 4 -->
                    <div class="tp-caption tp-resizeme"
                         data-x="['right','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['155','155','150','150']"
                         data-width="['500','500','500','500']" data-textalign="['right','center','center','center']" data-type="text"
                         data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power4.easeInOut;" data-transform_out="s:900;e:Power2.easeInOut;s:900;e:Power2.easeInOut;" data-start="1800" data-splitin="none" data-splitout="none" data-responsive_offset="on">
                        <a href="#contact" class="scroll btn btn-medium btn-rounded btn-blue btn-hvr-strongBlue btn-hvr-up">Learn More</a>
                    </div>
                </li>

                <!-- SLIDE 4 -->
                <li data-index="rs-04" data-transition="fade" data-slotamount="default" data-easein="Power100.easeIn" data-easeout="Power100.easeOut" data-masterspeed="2000" data-fsmasterspeed="1500" data-param1="03">
                    <!-- MAIN IMAGE -->
                    <img src="frontend/images/Banner4.png" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" alt="slider-image" data-no-retina>
                    <div class="bg-overlay bg-black opacity-4"></div>
                    <div class="slider-overlay"></div>
                    <!-- Video -->
                    {{-- <div class="rs-background-video-layer"
                         data-forcerewind="on"
                         data-volume="mute"
                         data-videowidth="100%"
                         data-videoheight="100vh"
                         data-videomp4="frontend/video/slider-video.mp4"
                         data-videopreload="auto"
                         data-videoloop="loopandnoslidestop"
                         data-forceCover="1"
                         data-aspectratio="16:9"
                         data-autoplay="true"
                         data-autoplayonlyfirsttime="false"></div> --}}
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption tp-resizeme"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-60','-60','-55','-55']"
                         data-whitespace="nowrap" data-responsive_offset="on"
                         data-width="['none','none','none','none']" data-type="text"
                         data-textalign="['center','center','center','center']"
                         data-transform_idle="o:1;"
                         data-frames='[{"delay":10,"speed":2000,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":280,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                         data-transform_in="x:-50px;opacity:0;s:2000;e:Power3.easeOut;"
                         data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                         data-start="1000" data-splitin="none" data-splitout="none">
                        <h1 class="text-white main-font font-40 font-weight-600">Aquí podras encontrar </h1>
                    </div>
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption tp-resizeme"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                         data-whitespace="nowrap" data-responsive_offset="on"
                         data-width="['none','none','none','none']" data-type="text"
                         data-textalign="['center','center','center','center']" data-fontsize="['48','48','20','26']"
                         data-transform_idle="o:1;"
                         data-frames='[{"delay":10,"speed":2000,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":280,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                         data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                         data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                         data-start="900" data-splitin="none" data-splitout="none">
                        <h1 class="text-white font-40 main-font font-weight-600"><span class="font-weight-200">Los</span> Mejores planes</h1>
                    </div>
                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption tp-resizeme"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['70','70','70','70']"
                         data-width="none" data-height="none" data-whitespace="nowrap" data-type="text"
                         data-textAlign="['center','center','center','center']"
                         data-responsive_offset="on" data-start="2000"
                         data-frames='[{"delay":10,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":280,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                         data-transform_in="z:0;rX:0deg;rY:0;rZ:0;sX:2;sY:2;skX:0;skY:0;opacity:0;s:1000;e:Power2.easeOut;"
                         data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;">
                        <p class="alt-font font-18 text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae egestas mi, vel dapi<br>bus diam. Mauris malesuada, nisl non rutrum commodo, sem magna.</p>
                    </div>
                    <!-- LAYER NR. 4 -->
                    <div class="tp-caption tp-resizeme"
                         data-frames='[{"delay":10,"speed":2000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":280,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['155','155','150','150']"
                         data-width="['500','500','500','500']" data-textalign="['center','center','center','center']" data-type="text"
                         data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power4.easeInOut;" data-transform_out="s:900;e:Power2.easeInOut;s:900;e:Power2.easeInOut;" data-start="1800" data-splitin="none" data-splitout="none" data-responsive_offset="on">
                        <a href="#contact" class="scroll btn btn-medium btn-rounded btn-blue btn-hvr-strongBlue btn-hvr-up">Learn More</a>
                    </div>
                </li>

            </ul>
        </div>
    </div>
    <ul class="social-icons social-icons-simple revicon white d-none d-md-block d-lg-block">
        <li class="d-table"><a href="javascript:void(0)" class="facebook_bg_hvr2"><i class="fab fa-facebook-f"></i></a> </li>
        <li class="d-table"><a href="javascript:void(0)" class="twitter_bg_hvr2"><i class="fab fa-twitter"></i> </a> </li>
        <li class="d-table"><a href="javascript:void(0)" class="linkdin_bg_hvr2"><i class="fab fa-linkedin-in"></i> </a> </li>
        <li class="d-table"><a href="javascript:void(0)" class="instagram_bg_hvr2"><i class="fab fa-instagram"></i> </a> </li>
    </ul>
</div>
<!--scroll down-->
<a href="#about" class="scroll-down link scroll main-font font-15 animate">Scroll Down <i class="fas fa-long-arrow-alt-down"></i></a>
<!-- END MAIN SLIDER -->

<!-- START ABOUT US -->
<section class="about" id="about">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 wow fadeInLeft" data-wow-delay="300ms">
                <p class="text-blue font-weight-200 font-20">Con Filex</p>
                <h1 class="main-font font-weight-600 text-black"><span>Podrás firmar <span class="text-strongBlue js-rotating">Contratos,Facturas,Cartas,Oficios</span></span> <span> de forma digital</span></h1>
            </div>

            <div class="col-12 col-lg-6 m-ipad wow fadeInRight" data-wow-delay="300ms">
                <div class="ml-md-4 pl-md-2 font-weight-200 text-grey font-18">
                    <p>Curabitur mollis bibendum luctus. Duis suscipit vitae dui sed suscipit. Vestibulum auctor nunc vitae diam eleifend, in maximus metus sollicitudin. Quisque vitae sodales lectus. Nam porttitor justo sed mi finibus, vel tristique risus faucibus. </p>
                    <p>Curabitur mollis bibendum luctus. Duis suscipit vitae dui sed suscipit. Vestibulum auctor nunc vitae diam eleifend, in maximus metus sollicitudin. Quisque vitae sodales lectus. </p>
                </div>
            </div>
        </div>
        <!-- About Boxes -->
        <div class="row about-margin">
            <!-- First Box -->
            <div class="col-md-4 col-sm-12">
                <div class="about-box center-block bg-strongBlue wow zoomIn" data-wow-delay="400ms">
                    <div class="about-main-icon pb-4">
                        <i class="fas fa-file-signature"></i>
                    </div>
                    <h5>Firma de forma segura<span> todos tus documentos.</span></h5>
                </div>
            </div>
            <!-- Second Box -->
            <div class="col-md-4 col-sm-12">
                <div class="about-box active center-block bg-blue wow zoomIn" data-wow-delay="500ms">
                    <div class="about-main-icon pb-4">
                        <i class="fas fa-file-medical" aria-hidden="true"></i>
                    </div>
                    <h5>Lleva un historial <span>de tus firmas.</span></h5>
                </div>
            </div>
            <!-- Third Box -->
            <div class="col-md-4 col-sm-12">
                <div class="about-box center-block bg-strongBlue wow zoomIn" data-wow-delay="600ms">
                    <div class="about-main-icon pb-4">
                        <i class="fas fa-mail-bulk" aria-hidden="true"></i>
                    </div>
                    <h5>Invita a usuarios a firmar <span> de forma segura.</span></h5>
                </div>
            </div>
        </div>
        <!-- About Image -->
        <div class="d-flex justify-content-center wow bounceInLeft" data-wow-delay="300ms">
            <img src="frontend/images/Brand1.png" alt="About-Us Plant">
        </div>
    </div>
</section>
<!-- END ABOUT US -->

<!-- START TEAM STATS -->
{{-- <section class="half-section p-0 stats-bg">
    <h2 class="d-none">heading</h2>
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 p-0 order-1 order-md-2">
                <div class="owl-carousel owl-theme owl-split">
                    <!-- Team-1 -->
                    <div class="item">
                        <div class="hover-effect">
                            <img alt="blog" src="frontend/images/team-img1.jpg" class="team-img">
                        </div>
                    </div>
                    <!-- Team-2 -->
                    <div class="item">
                        <div class="hover-effect">
                            <img alt="blog" src="frontend/images/team-img2.jpg" class="team-img">
                        </div>
                    </div>
                    <!-- Team-3 -->
                    <div class="item">
                        <div class="hover-effect">
                            <img alt="blog" src="frontend/images/team-img3.jpg" class="team-img">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="skill-box">
                    <div class="main-title mb-5 text-center text-lg-left main-title wow fadeIn" data-wow-delay="300ms">
                        <p class="font-weight-200 font-20 text-white">Check Our Skills</p>
                        <h2 class="margin-top main-font font-40 font-weight-normal text-white">We have best financial <span class="d-block mt-1">skilled team.</span></h2>
                    </div>
                    <ul class="text-left">
                        <!-- First Bar -->
                        <li class="custom-progress text-white">
                            <h6 class="font-16 mb-0 text-capitalize">Business Consulting <span class="float-right"><b class="numscroller">85</b>%</span></h6>

                            <div class="progress">
                                <div class="progress-bar blue-bar progress-bar-striped" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </li>
                        <!-- Second Bar -->
                        <li class="custom-progress text-white">
                            <h6 class="font-16 mb-0 text-capitalize">Financial Advising<span class="float-right"><b class="numscroller">68</b>%</span></h6>

                            <div class="progress">
                                <div class="progress-bar strongBlue-bar progress-bar-striped" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </li>
                        <!-- Third Bar -->
                        <li class="custom-progress text-white">
                            <h6 class="font-16 mb-0 text-capitalize">Brand Consulting <span class="float-right"><b class="numscroller">85</b>%</span></h6>

                            <div class="progress">
                                <div class="progress-bar blue-bar progress-bar-striped" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </li>
                        <!-- Fourth Bar -->
                        <li class="custom-progress mb-0 text-white">
                            <h6 class="font-16 mb-0">Strategic Consulting<span class="float-right"><b class="numscroller">95</b>%</span></h6>

                            <div class="progress">
                                <div class="progress-bar strongBlue-bar progress-bar-striped" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- END TEAM STATS -->

<!-- START PORTFOLIO -->
{{-- <section id="portfolio" class="padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title text-center pb-5 wow fadeInUp" data-wow-delay="100ms">
                    <p class="text-strongBlue font-weight-200 font-20">Basic Info about work</p>
                    <h1 class="main-font font-weight-600 text-black">Our Valued Customers</h1>
                    <p class="margin-top font-16 alt-font font-weight-normal text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in velit dolor.<span class="d-block"> Vivamus gravida, neque nec interdum cursus, erat ligula</span>.</p>
                </div>
                <div class="pointer nav nav-pills mb-4 mb-md-4 d-flex justify-content-center filtering">
                    <span data-filter="*" class="nav-link active">All</span>
                    <span class="nav-link" data-filter=".Agencies">Agencies</span>
                    <span class="nav-link" data-filter=".Business">Clinical</span>
                    <span class="nav-link" data-filter=".Personal">Personal</span>
                    <span class="nav-link" data-filter=".Medical">Medical</span>
                </div>

                <ul class="da-thumbs gallery">
                    <!-- First Image -->
                    <li class="items Business Medical Agencies">
                        <img src="frontend/images/portfolio-img1.jpg" alt="img">
                        <a href="frontend/images/portfolio-img1.jpg" class="text-center" data-fancybox="images">
                            <div class="overlay">
                                <div>
                                    <div class="search-icon"><i class="fa fa-search"></i></div>
                                    <h4 class="">Hudson Lee</h4>
                                    <span>New York, USA</span>
                                </div>
                            </div>
                        </a>
                    </li>

                    <!-- Second Image -->
                    <li class="items Business Medical Agencies">
                        <img src="frontend/images/portfolio-img2.jpg" alt="img">
                            <a href="frontend/images/portfolio-img2.jpg" class="text-center" data-fancybox="images">
                                <div class="overlay">
                                    <div>
                                        <div class="search-icon"><i class="fa fa-search"></i></div>
                                        <h4 class="">Will Smith</h4>
                                        <span>New York, USA</span>
                                    </div>
                                </div>
                            </a>
                    </li>

                    <!-- Third Image -->
                    <li class="items Personal Business">
                        <img src="frontend/images/portfolio-img3.jpg" alt="img">
                            <a href="frontend/images/portfolio-img3.jpg" class="text-center" data-fancybox="images">
                                <div class="overlay">
                                    <div>
                                        <div class="search-icon"><i class="fa fa-search"></i></div>
                                        <h4 class="">Steve Smith</h4>
                                        <span>New York, USA</span>
                                    </div>
                                </div>
                            </a>
                    </li>

                    <!-- Fourth Image -->
                    <li class="items Medical Personal">
                        <img src="frontend/images/portfolio-img4.jpg" alt="img">
                            <a href="frontend/images/portfolio-img4.jpg" class="text-center" data-fancybox="images">
                                <div class="overlay">
                                    <div>
                                        <div class="search-icon"><i class="fa fa-search"></i></div>
                                        <h4 class="">Janey Woods</h4>
                                        <span>New York, USA</span>
                                    </div>
                                </div>
                            </a>
                    </li>

                    <!-- Fifth Image -->
                    <li class="items Medical Agencies">
                        <img src="frontend/images/portfolio-img5.jpg" alt="img">
                            <a href="frontend/images/portfolio-img5.jpg" class="text-center" data-fancybox="images">
                                <div class="overlay">
                                    <div>
                                        <div class="search-icon"><i class="fa fa-search"></i></div>
                                        <h4 class="">Paul Jackson</h4>
                                        <span>New York, USA</span>
                                    </div>
                                </div>
                            </a>
                    </li>

                    <!-- Sixth Image -->
                    <li class="items Business surgery Medical">
                        <img src="frontend/images/portfolio-img6.jpg" alt="img">
                            <a href="frontend/images/portfolio-img6.jpg" class="text-center" data-fancybox="images">
                                <div class="overlay">
                                    <div>
                                        <div class="search-icon"><i class="fa fa-search"></i></div>
                                        <h4 class="">Eva Marie</h4>
                                        <span>New York, USA</span>
                                    </div>
                                </div>
                            </a>
                    </li>
                </ul>
                <div class="text-center pt-5">
                    <a href="frontend/standalone.html" class="btn btn-large btn-rounded btn-strongBlue btn-hvr-up btn-hvr-blue">View More Portfolio</a>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- END PORTFOLIO -->

<!-- START CLIENTS -->
{{-- <section class="pt-0 padding-bottom">
    <h2 class="d-none">hidden</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!--Client Slider-->
                <div class="owl-carousel partners-slider">
                    <!--Item-->
                    <div class="logo-item"><img alt="client-logo" src="frontend/images/client-1.png"></div>
                    <!--Item-->
                    <div class="logo-item"><img alt="client-logo" src="frontend/images/client-1.png"></div>
                    <!--Item-->
                    <div class="logo-item"><img alt="client-logo" src="frontend/images/client-1.png"></div>
                    <!--Item-->
                    <div class="logo-item"><img alt="client-logo" src="frontend/images/client-1.png"></div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- END CLIENTS -->

<!-- START PARALLAX -->
<section class="parallax-img parallax">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 offset-lg-3">
                <!-- Testimonial Slider -->
                <div id="testimonial-carousal" class="owl-carousel owl-theme testimonial-owl text-center wow fadeIn" data-wow-delay="300ms">
                    <!-- Item-1 -->
                    <div class="item">
                        <div class="icon-quotes mb-4">
                            <i class="fas fa-quote-right"></i>
                        </div>
                        <div class="description">
                            <p class="text-black paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae egestas mi, vel dapibus diam. Mauris malesuada, nisl non rutrum commodo, sem magna laoreet tellus, eu euismod dolor enim et mi. In at tempor purus. </p>
                        </div>
                        <div class="testimonial-img mt-4">
                            <img src="frontend/images/testimonial-1.png" alt="student img">
                        </div>
                        <div class="testimonial-tittle mt-3 mb-3">
                            <h3 class="mb-0 text-black alt-font font-weight-normal font-24">Guillermo Bringas</h3>
                        </div>
                    </div>

                    <!-- Item-2-->
                    {{-- <div class="item">
                        <div class="icon-quotes mb-4">
                            <i class="fas fa-quote-right"></i>
                        </div>
                        <div class="description">
                            <p class="text-white paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae egestas mi, vel dapibus diam. Mauris malesuada, nisl non rutrum commodo, sem magna laoreet tellus, eu euismod dolor enim et mi. In at tempor purus. </p>
                        </div>
                        <div class="testimonial-img mt-4">
                            <img src="frontend/images/testimonial-2.png" alt="student img">
                        </div>
                        <div class="testimonial-tittle mt-3 mb-3">
                            <h3 class="mb-0 text-white alt-font font-weight-normal font-24">Trixly Wanders</h3>
                        </div>
                    </div> --}}

                    <!-- Item-3 -->
                    {{-- <div class="item">
                        <div class="icon-quotes mb-4">
                            <i class="fas fa-quote-right"></i>
                        </div>
                        <div class="description">
                            <p class="text-white paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae egestas mi, vel dapibus diam. Mauris malesuada, nisl non rutrum commodo, sem magna laoreet tellus, eu euismod dolor enim et mi. In at tempor purus. </p>
                        </div>
                        <div class="testimonial-img mt-4">
                            <img src="frontend/images/testimonial-3.png" alt="student img">
                        </div>
                        <div class="testimonial-tittle mt-3 mb-3">
                            <h3 class="mb-0 text-white alt-font font-weight-normal font-24">Steve Austin</h3>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END PARALLAX -->

<!-- START PRICE -->
<section id="pricing" class="pricing">
    <div class="container">
        <div class="row wow fadeInUp" data-wow-delay="100ms">
            <div class="col-12 text-center">
                <p class="text-blue font-weight-200 font-20">Listo para una mejor experiencia</p>
                <h1 class="main-font font-weight-600 text-black">Conoce nuestros planes</h1>
                <p class="margin-top font-16 alt-font font-weight-normal text-grey">Puedes registarte de forma gratuita y despues elegir un plan</p>
            </div>
        </div>
        <div class="row padding-top">
            <!-- Plan-1 -->
                <div class="col-lg-6 col-md-12 col-sm-12 price-strongBlue wow fadeInLeft" data-wow-delay="300ms">
                    <div class="pricing-item">
                        <h3 class="pb-3 main-font font-24 text-blue">Básico</h3>
                        <div class="pricing-price d-flex"><sup class="price-dollar text-strongBlue">$</sup> <span class="pricing-currency text-strongBlue">0.00
                            <span class="d-block alt-font font-weight-200 font-10 text-center text-strongBlue">mxn / moth</span></span>
                            <p class="pricing-para text-grey ml-3">Tarfa plana, sujeto a cambios</p>
                        </div>
                        <ul class="pricing-list mb-0">
                            <li><i class="fa fa-check" aria-hidden="true"></i> Firma de documentos.</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Firma dígital.</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Tus datos seguros.</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> </li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> </li>
                        </ul>
                        <a href="{{ route('login') }}" class="btn btn-large strongBlue-long-btn rounded-pill w-100 btn-hvr-up portfolio-btn-strongBlue">Registrarme</a>
                    </div>
                </div>
            <!-- Plan-2 -->
            @foreach ($plans as $plan)


            <div class="col-lg-6 col-md-12 col-sm-12 price-blue wow fadeInUp" data-wow-delay="500ms">
                <div class="pricing-item">
                    <h3 class="pb-3 main-font font-24 text-strongBlue">{{ $plan->nickname ? '$plan->nickname' : 'Premium' }}</h3>
                    <div class="pricing-price d-flex"><sup class="price-dollar text-blue">$</sup> <span class="pricing-currency text-blue">{{ $plan->amount/100 }}
                        <span class="d-block alt-font font-weight-200 font-10 text-center">{{$plan->currency }} / {{ $plan->interval }}</span></span>
                        <p class="pricing-para text-grey ml-3">Tarfa plana, sujeto a cambios</p>
                    </div>
                    <ul class="pricing-list mb-0">
                        <li><i class="fa fa-check" aria-hidden="true"></i> Firma de documentos.</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Firma dígital.</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Tus datos seguros.</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Documentos en la nube</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Implementar eFirma</li>
                    </ul>
                    <a href="{{ route('login') }}" class="btn btn-large blue-long-btn rounded-pill w-100 btn-hvr-up portfolio-btn-blue">Registrarme</a>
                </div>
            </div>
            @endforeach
            <!-- Plan-3 -->
            {{-- <div class="col-lg-4 col-md-12 col-sm-12 price-strongBlue wow fadeInRight" data-wow-delay="300ms">
                <div class="pricing-item">
                    <h3 class="pb-3 main-font font-24 text-blue">Advance</h3>
                    <div class="pricing-price d-flex"><sup class="price-dollar text-strongBlue">$</sup> <span class="pricing-currency text-strongBlue">99
                            <span class="d-block alt-font font-weight-200 font-10 text-center">Month</span></span>
                        <p class="pricing-para text-grey ml-3">It has survived not only five centuries, but also the leap into electronic</p>
                    </div>
                    <ul class="pricing-list mb-0">
                        <li><i class="fa fa-check" aria-hidden="true"></i> Full Access.</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Unlimited Bandwidth.</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Professional Websites.</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Social media integration.</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> 40MB of storage space.</li>
                    </ul>
                    <a href="javascript:void(0)" class="btn btn-large strongBlue-long-btn rounded-pill w-100 btn-hvr-up portfolio-btn-strongBlue">Choose Plan</a>
                </div>
            </div> --}}
        </div>
    </div>
</section>
<!-- END PRICE -->

<!-- START BLOG -->
<section class="half-section p-0 blog" id="blog">
    <h2 class="d-none">heading</h2>
    <div class="container-fluid">
        <div class="row align-items-center blog-bg">
            <div class="col-lg-6 col-md-12 p-0 order-1 order-md-2">
                <div class="owl-carousel owl-theme owl-split">
                    <!-- Team-1 -->
                    <div class="item">
                        <div class="hover-effect">
                            <img alt="blog" src="frontend/images/NewsBlog.png" class="team-img">
                        </div>
                    </div>
                    <!-- Team-2 -->
                    <div class="item">
                        <div class="hover-effect">
                            <img alt="blog" src="frontend/images/NewsBlog2.png" class="team-img">
                        </div>
                    </div>
                    <!-- Team-3 -->
                    <div class="item">
                        <div class="hover-effect">
                            <img alt="blog" src="frontend/images/NewsBlog3.png" class="team-img">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="align-items-center pc-0 px-md-5 skill-box">
                    <div class="main-title mb-5 text-center text-lg-left wow fadeIn" data-wow-delay="300ms">
                        <p class="text-strongBlue font-weight-200 font-20">Últimas novedades</p>
                        <h1 class="main-font font-weight-600 text-black margin-top">Tu guía juridica</h1>
                        <p class="font-15 alt-font font-weight-normal text-grey margin-top">Echa un vistazo a nuestra sección de noticias, te ayudaremos con lo relacionado a tus contratos.</p>
                        <a href="frontend/blog.html" class="mt-3 btn btn-medium btn-rounded btn-blue btn-hvr-up btn-hvr-strongBlue">Ver el Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BLOG -->

<!-- START CONTACT-FORM -->
<section id="contact" class="contact-sec">
    <div class="container">
        <!--Heading-->
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 text-center">
                <p class="text-blue font-weight-200 font-20">¿Alguna duda?</p>
                <h1 class="main-font font-weight-600 text-black">Estamos en contacto</h1>
            </div>
        </div>

        <!-- Contact-us -->
        <div class="row">
            <div class="col-12 col-lg-6 contact-details text-md-left">
                <div class="font-15 alt-font light-grey text-center text-lg-left">
                    Puedes ponerte en contacto con nosotros, podemos resolver tus dudas.
                </div>
                <div class="row mt-5 wow fadeIn" data-wow-delay="200ms">
                    <!-- Address-Box -->
                    <div class="col-12 col-md-6 text-center text-lg-left">
                        <h4 class="main-font text-blue font-16 font-weight-600">Dirección</h4>
                        <p class="alt-font font-14 light-grey mt-3">123 calle , CDMX, México. </p>
                    </div>
                    <!-- Phone-Box -->
                    <div class="col-12 col-md-6 pt-5 pt-md-0 wow fadeIn text-center text-lg-left" data-wow-delay="400ms">
                        <h4 class="main-font text-blue font-16 font-weight-600">Teléfono</h4>
                        <p class="alt-font font-14 light-grey mt-3">Oficina : 01800 1234567 Movil : 1234567890 </p>
                    </div>
                </div>

                <div class="row mt-5">
                    <!-- Email-Box -->
                    <div class="col-12 col-md-6 wow fadeIn text-center text-lg-left" data-wow-delay="600ms">
                        <h4 class="main-font text-blue font-16 font-weight-600">Email</h4>
                        <p class="alt-font font-14 light-grey mt-3">Email : admin@filex.com.mx Info : info@filex.com.mx </p>
                    </div>
                    <!-- Support-Box -->
                    <div class="col-12 col-md-6 pt-5 pt-md-0 wow fadeIn text-center text-lg-left" data-wow-delay="800ms">
                        <h4 class="main-font text-blue font-16 font-weight-600">Soporte</h4>
                        <p class="alt-font font-14 light-grey mt-3">Soporte : info@filex.com.mx Ventas : sales@filex.com.mx</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 contact-form-box">
                <form class="contact-form" id="contact-form-data">
                    <div class="row">
                        <!-- Submission Popup -->
                        <div class="col-12">
                            <div class="col-sm-12 px-0" id="result"></div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Nombre:" required="" id="first_name" name="firstName">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Apellido:" required="" id="last_name" name="lastName">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="email" placeholder="Email:" required="" id="email" name="userEmail">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="tel" placeholder="Teléfono:" id="phone" name="userPhone">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Mensaje" id="message" name="userMessage"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="button" class="btn btn-large strongBlue-long-btn rounded-pill w-100 btn-hvr-up btn-hvr-blue mt-4 contact_btn" id="submit_btn">SUBMIT REQUEST</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- END CONTACT-FORM -->

<!-- START GOOGLE MAP -->
{{-- <section id="map" class="p-0">
    <div class="row">
        <div class="col-12">
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3333.9674103770367!2d-111.89998968532109!3d33.31966746342612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzPCsDE5JzEwLjgiTiAxMTHCsDUzJzUyLjEiVw!5e0!3m2!1sen!2s!4v1573716071790!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- END GOOGLE-MAP -->

<!-- START FOOTER -->
<footer class="footer">
    <div class="container">
        <div class="row align-items-center">
            <!--Social-->
            <div class="col-12 text-center">
                {{-- <div class="footer-social">
                    <ul class="list-unstyled social-icons social-icons-simple">
                        <li><a class="facebook_bg_hvr2 wow fadeInUp" href="javascript:void(0)"><i class="fab fa-facebook-f" aria-hidden="true"></i> </a> </li>
                        <li><a class="twitter_bg_hvr2 wow fadeInDown" href="javascript:void(0)"><i class="fab fa-twitter" aria-hidden="true"></i> </a> </li>
                        <li><a class="googleplus_bg_hvr2 wow fadeInUp" href="javascript:void(0)"><i class="fab fa-google-plus-g" aria-hidden="true"></i> </a> </li>
                        <li><a class="linkdin_bg_hvr2 wow fadeInDown" href="javascript:void(0)"><i class="fab fa-linkedin-in" aria-hidden="true"></i> </a> </li>
                        <li><a class="instagram_bg_hvr2 wow fadeInUp" href="javascript:void(0)"><i class="fab fa-instagram" aria-hidden="true"></i> </a> </li>
                        <li><a class="pintrest_bg_hvr2 wow fadeInUp" href="javascript:void(0)"><i class="fab fa-pinterest-p" aria-hidden="true"></i> </a> </li>
                    </ul>
                </div> --}}
                <!--Text-->
                <p class="company-about fadeIn">© 2020 Filex. Made With Love By <a href="#">Tooring</a></p>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->

<!--START SCROLL TOP-->
<div class="go-top"><i class="fas fa-angle-up"></i><i class="fas fa-angle-up"></i></div>
<!--END SCROLL TOP-->

<!-- JavaScript -->
<script src="{{ asset('vendor/js/bundle.min.js') }}"></script>
<!-- Plugin Js -->
<script src="{{ asset('vendor/js/jquery.appear.js') }}"></script>
<script src="{{ asset('vendor/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('vendor/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('vendor/js/parallaxie.min.js') }}"></script>
<script src="{{ asset('vendor/js/wow.min.js') }}"></script>
<script src="{{ asset('vendor/js/jquery.cubeportfolio.min.js') }}"></script>
<!-- REVOLUTION JS FILES -->
<script src="{{ asset('vendor/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('vendor/js/jquery.themepunch.revolution.min.js') }}"></script>
<!-- SLIDER REVOLUTION EXTENSIONS -->
<script src="{{ asset('vendor/js/morphext.min.js') }}"></script>
<script src="{{ asset('vendor/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('vendor/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ asset('vendor/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('vendor/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('vendor/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('vendor/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('vendor/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('vendor/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('vendor/js/extensions/revolution.extension.video.min.js') }}"></script>

<!-- CUSTOM JS -->
<script src="{{ asset('frontend/js/isotope.pkgd.js') }}"></script>
<script src="{{ asset('frontend/js/modernizr.custom.97074.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.hoverdir.js') }}"></script>
<!-- custom script -->
<script src="{{ asset('vendor/js/contact_us.js') }}"></script>
<script src="{{ asset('frontend/js/script.js') }}"></script>
</body>
</html>