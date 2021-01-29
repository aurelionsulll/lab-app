<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="https://ciprotec.ma/wp-content/uploads/2020/03/ciprotec-picto.png">
    <title>Labo dashboard</title>
    <link href="{{ asset('admin/assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/dist/css/style.min.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e696b1788a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vxe-table/lib/style.css">
    <!-- 引入脚本 -->
    <script src="https://cdn.jsdelivr.net/npm/xe-utils"></script>
    <script src="https://cdn.jsdelivr.net/npm/vxe-table"></script>
    <style>
        .sidebar
        {
            display: none !important;
        }
        .fullmainn{
            margin-left: 0px !important;
        }
        @media only screen and (max-width: 600px) {
            .leftSideBar{
                display: none !important;
            }
            .mainContent{
                margin-left: 0px !important;
            }
        }
    </style>

</head>

<body>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5" style="background:#2d3033">
                    <a class="navbar-brand" href="#">
                        <b class="logo-icon">
                            <img  src="{{asset('assets/images/labo_ain_itti.png')}}" alt="homepage" class="light-logo" width="47px" style="margin-left: 25px;margin-bottom:5px"/>
                        </b>
                        @if (Auth::user()->is_admin == 1)
                        <i class="fas fa-bars float-right" style="margin-left: 130px; font-size:25px" onclick="change()"></i>
                        @endif
                    </a>
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-left mr-auto">

                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"></a>

                        </li>
                    </ul>
                    <ul class="navbar-nav float-right" style="">
                         <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div style="margin-left: 40px;margin-right: 20px">
                                    <img src="{{ asset('admin/assets/images/users/1.jpg') }}" alt="user" class="rounded-circle" width="31" ">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <script>
                                    var i = 1;
                                </script>
                                <a class="dropdown-item" href="admin/logout"><i class="ti-arrow-circle-up m-r-5 m-l-5"></i>Se déconnecter</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar leftSideBar" data-sidebarbg="skin6" style="@if(Auth::user()->is_admin != 1)display: none @endif" id="leftsideba">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li><br><br><br><br></li>
                        @if (Auth::user()->is_admin== 1)
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('cp_admin')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        @endif
                        @if (Auth::user()->is_admin== 1)
                        <li class="sidebar-item" style="{{ request()->is('homepage') || request()->is('aboutpage')  || request()->is('infopage') || request()->is('gallerypage') ? 'background-color: #e5e5e5' : '' }}" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> <a class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false"><i class="fas fa-file"></i><span class="hide-menu">Gestion des pages </span></a></li>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" style="width: 240px;{{ request()->is('homepage') ? 'color: blue' : '' }}" href="homepage">D'accueil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" style="width: 240px;{{ request()->is('aboutpage') ? 'color: blue' : '' }}" href="aboutpage">À propos de nous </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"  style="width: 240px;{{ request()->is('infopage') ? 'color: blue' : '' }}"href="infopage">Info utile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" style="width: 240px;{{ request()->is('gallerypage') ? 'color: blue' : '' }}" href="gallerypage">Galerie</a>
                          </div>
                        @endif
                        @if (Auth::user()->is_admin== 1)
                        <li class="sidebar-item" style="{{ (request()->is('admincontact')) ? 'background-color: #e5e5e5' : '' }}"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('admincontact')}}" aria-expanded="false"><i class="fas fa-envelope-open-text"></i><span class="hide-menu">Gestion de messagerie</span></a></li>
                        @endif
                        @if (Auth::user()->is_admin== 1)
                        <li class="sidebar-item" style="{{ (request()->is('createlogin')) ? 'background-color: #e5e5e5' : '' }}"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('createlogin')}}" aria-expanded="false"><i class="fas fa-clipboard-list"></i><span class="hide-menu">Liste des sociétés</span></a></li>
                        @endif
                        @if (Auth::user()->is_admin== 1)
                        <li class="sidebar-item" style="{{ (request()->is('indexAllAccountList')) ? 'background-color: #e5e5e5' : '' }}"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('indexAllAccountList')}}" aria-expanded="false"><i class="far fa-list-alt"></i><span class="hide-menu">Liste des patients</span></a></li>
                        @endif
                        @if (Auth::user()->is_admin== 1)
                            <li class="sidebar-item" style="{{ (request()->is('appointmentAdminview')) ? 'background-color: #e5e5e5' : '' }}"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('appointmentAdminview')}}" aria-expanded="false"><i class="far fa-calendar-check"></i><span class="hide-menu">Liste des rendez-vous</span></a></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </aside>
        <div  class="page-wrapper mainContent" style="@if(Auth::user()->is_admin != 1 ) margin-left : 0px !important @endif" id="mainn">
            <div class="page-breadcrumb" id="app">
                    <div class="row align-items-center">
                        @yield('content')
                    </div>
            </div>
    </div>
<script>
    window.Laravel={!! json_encode([
    'csrftoken'   =>csrf_token(),
    'url'    =>url('/')
    ])!!};
</script>


<script>

 function change(){

    if(document.getElementById('leftsideba').className == "left-sidebar leftSideBar"){
                var root = document.getElementById( 'leftsideba' ); // '0' to assign the first (and only `HTML` tag)
                root.setAttribute( 'class', 'sidebar' );
                var rooot = document.getElementById( 'mainn' ); // '0' to assign the first (and only `HTML` tag)
                rooot.setAttribute( 'class', 'fullmainn' );
            }

        else
        {
            var roott = document.getElementById( 'leftsideba' ); // '0' to assign the first (and only `HTML` tag)
            roott.setAttribute( 'class', 'left-sidebar leftSideBar' );
            var rrooot = document.getElementById( 'mainn' ); // '0' to assign the first (and only `HTML` tag)
            rrooot.setAttribute( 'class', 'page-wrapper mainContent' );
        }
    }
</script>

<script src="{{asset('js/app.js')}}"></script>
</body>

</html>
