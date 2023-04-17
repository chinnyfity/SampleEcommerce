
<!DOCTYPE html>
<html dir="ltr" lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1 ,maximum-scale=1, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="keywords" content="" />
<meta name="title" content="Company Name | Artworks" />
<meta name="description" content="" />
<link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">

<title>{{ $page_title }}</title>
<!-- <link rel='stylesheet' id='woocommerce-smallscreen-css'  href="{{ asset('css/wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreen822f.css?ver=3.6.2') }}" type='text/css' media='only screen and (max-width: 768px)' /> -->
<link rel='stylesheet' id='woocommerce-general-css'  href="{{ asset('css/wp-content/plugins/woocommerce/assets/css/woocommerce822f.css?ver=3.6.2') }}" type='text/css' media='all' />
<link rel='stylesheet' id='phoxy-child-css-css'  href="{{ asset('css/wp-content/themes/phoxy-child-theme/style5fba.css?ver=5.2') }}" type='text/css' media='all' />

<link rel='stylesheet' id='phoxy-shop-css'  href="{{ asset('css/shop5fba.css?ver=5.2') }}" type='text/css' media='all' />
<link rel='stylesheet' id='phoxy-theme-css'  href="{{ asset('css/wp-content/themes/phoxy/assets/css/style5fba.css?ver=5.2') }}" type='text/css' media='all' />
<link rel='stylesheet' id='whizzy_inuit-css'  href="{{ asset('css/wp-content/plugins/whizzy/assets/css/inuit8a54.css?ver=1.0.0') }}" type='text/css' media='all' />
<link rel='stylesheet' id='whizzy_magnific-popup-css'  href="{{ asset('css/wp-content/plugins/whizzy/assets/css/mangnific-popup8a54.css?ver=1.0.0') }}" type='text/css' media='all' />
<!-- <link rel='stylesheet' id='lightgallery-css'  href="{{ asset('css/wp-content/plugins/whizzy/assets/css/lightgallery.min8a54.css?ver=1.0.0') }}" type='text/css' media='all' /> -->
<!-- <link rel='stylesheet' id='dgwt-jg-lightgallery-css'  href="{{ asset('css/wp-content/plugins/phoxy-plugins/lib/phoxy-justified-gallery/assets/css/lightgallery.min4963.css?ver=1.1') }}" type='text/css' media='all' /> -->
<link rel='stylesheet' id='dgwt-jg-style-css'  href="{{ asset('css/wp-content/plugins/phoxy-plugins/lib/phoxy-justified-gallery/assets/css/style.min4963.css?ver=1.1') }}" type='text/css' media='all' />

<!-- <link rel='stylesheet' id='ionicons-css' href="{{ asset('css/wp-content/themes/phoxy/assets/css/ionicons.min5fba.css?ver=5.2') }}" type='text/css' media='all' /> -->

<link href="{{ asset('css/bootstrap.css') }}" rel='stylesheet' />

<script type='text/javascript' src="{{ asset('css/wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4') }}"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Kurale|Merienda" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/accordion.css') }}" />
<link rel="stylesheet" href="{{ asset('css/custom-bootstrap-margin-padding.css') }}" />

<link rel='stylesheet' id='menu-item-item-css' href="{{ asset('css/wp-content/themes/phoxy/assets/css/menu-item-item5fba.css?ver=5.2') }}" type='text/css' media='all' />
<link rel='stylesheet' id='phoxy-dynamic-css' href="{{ asset('css/phoxy_dynamic_css.css') }}" type='text/css' media='all' />
<link rel='stylesheet' id='phoxy-shop-css' href="{{ asset('css/responsive.css') }}" type='text/css' media='all' />

</head>

<body class="archive post-type-archive post-type-archive-product woocommerce woocommerce-page woocommerce-no-js  mob-main-menu wpb-js-composer js-comp-ver-5.6 vc_responsive" style="background:#ccc;">


<input type="hidden" value="{{url('/')}}" id="site_url">
<input type="text" value="{{ $page_name }}" id="page_names" style="display:none;">
<input type="hidden" value="{{ csrf_token() }}" id="txt_token">

    <div class="preloader-wrap">
        <svg width="30px" height="30px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-infinity">
            <path fill="none" d="M24.3,30C11.4,30,5,43.3,5,50s6.4,20,19.3,20c19.3,0,32.1-40,51.4-40 C88.6,30,95,43.3,95,50s-6.4,20-19.3,20C56.4,70,43.6,30,24.3,30z" stroke="#222222" stroke-width="10" stroke-dasharray="236.06181396484376 20.527114257812485">
                <animate attributeName="stroke-dashoffset" calcMode="linear" values="0;256.58892822265625" keyTimes="0;1" dur="1.1" begin="0s" repeatCount="indefinite"></animate>
            </path>
        </svg>
    </div>

<div class="main-wrapper" data-top="1024">

    @if($page_name=="")
        <div class="header_top_bg dark-submenu" style="background:#ccc!important;position:fixed;width:100%">
    @else
        <div class="header_top_bg  dark-submenu" style="background:#ccc; margin-top:-4em">
    @endif

        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    @if($page_name=="")
                        <header class="right-menu right-menu1 classic">
                    @else
                        <header class="right-menu classic add_dark">
                    @endif
                    <input type="hidden" id="cart_counts" value="{{ $product_count }}">

                        <a href="#" class="mob-nav">
                            <div class="hamburger">
                                <div class="bar1"></div>
                                <div class="bar2"></div>
                                <div class="bar3"></div>
                            </div>
                        </a>

                        <div class="cart_items cart_items1 for_mobile">
                            <p><font class="view_carts"><span class="counts1">{{ $product_count }}</span> <i class="fa fa-shopping-cart"></i></font></p>
                        </div>

                        
                        <div class="logo-wrap  logo-wrap1__">
                            <a href="{{ url('/') }}" class="logo"><span><img src="{{ asset('img/logo.png') }}"></span></a>
                        </div>

                        <nav id="topmenu" class="topmenu topmenu1">
                            <div class="mini-cart-wrapper mob-version">
                                <div class="hamburger1">
                                    MENU
                                </div>
                            </div>
                                    
                            <a href="#" class="mob-nav-close">
                                <!-- <span>close</span> -->
                                <div class="hamburger">
                                    <span class="line"></span>
                                    <span class="line"></span>
                                </div>
                            </a>

                            <ul id="menu-menu-1" class="menu menu1_">
                            
                                <li id="menu-item-6754" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6754"><a href="#">Home</a></li>
                                </li>
                            </ul>

                            <div class="cart_items for_desktop">
                                <p>
                                    <a href="javascript:;" class="view_carts">
                                        <font title="View your shopping cart"><span class="counts1">{{ $product_count }}</span> <i class="fa fa-shopping-cart"></i></font>
                                    </a>
                                </p>
                            </div>

                        </nav>

                    </header>
                </div>
            </div>
        </div>
    </div>



    <div class="demo-pages-wrap">
        <div class="checkbox_wrap demo-version" style="display:none;">
            <fieldset class="checkbox-switch">
                <input type="checkbox" id="checkbox-1">
                <label for="checkbox-1" title="Dark Version on/off" class="checkbox-right js-version" data-state="light"></label>
            </fieldset>
        </div>
    </div>