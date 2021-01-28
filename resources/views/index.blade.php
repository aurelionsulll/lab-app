@extends('layouts.app')
@section('content')

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">SERVEUR DE RÉSULTATS</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="POST" action="https://www.laboonline.com/applogin">
                                        <div class="modal-body">
                                            <input id="username" name="username"  type="text" style="display:none" role="textbox" aria-disabled="false" aria-readonly="false">
                                            <script>
                                                var url = 'https://www.laboonline.com/applogin';
                                                function myFunction() {
                                                  document.getElementById("username").value = document.getElementById("login").value;
                                                }
                                            </script>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Votre Identifiant</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="login" style="border-radius: 8px" name="login">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Mot de passe</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" style="border-radius: 8px" name="password">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <p id="demo" style="color: red"></p>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-primary" id="myBtn" onclick="myFunction()">Login</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
    <div class="main-content">
        <div  class="divider">
            <div class="container-fluid p-0">
                <div class="rev_slider_wrapper">
                    <div class="rev_slider" data-version="5.0">
                        <ul>
                                <li data-index="rs-1" data-transition="random" data-slotamount="7"  data-easein="default" data-easeout="default" data-masterspeed="1000"  data-thumb="{{ asset('images/laboratoireainitti2.jpeg') }}"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-description="">
                                    <img src="{{ asset('images/laboratoireainitti2.jpeg') }}"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="6" data-no-retina>
                                    <img src="images/pattern3.png"  alt=""  data-bgposition="center top" data-bgfit="repeat" data-bgrepeat="repeat" class="rev-slidebg" data-bgparallax="6" data-no-retina data-background="red" >
                                    <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway   pl-40 pr-40"
                                         id="rs-1-layer-1"
                                         data-x="['center']"
                                         data-hoffset="['0']"
                                         data-y="['middle']"
                                         data-voffset="['-115']"
                                         data-fontsize="['40']"
                                         data-lineheight="['70']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"
                                         data-transform_idle="o:1;s:500"
                                         data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                                         data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                                         data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                         data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                         data-start="1000"
                                         data-splitin="none"
                                         data-splitout="none"
                                         data-responsive_offset="on"
                                         style="z-index: 7; white-space: nowrap; font-weight:600;" >Officiellement agréé pour les 
                                    </div>
                                    <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway   pl-40 pr-40"
                                         id="rs-1-layer-1"
                                         data-x="['center']"
                                         data-hoffset="['0']"
                                         data-y="['middle']"
                                         data-voffset="['-75']"
                                         data-fontsize="['40']"
                                         data-lineheight="['70']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"
                                         data-transform_idle="o:1;s:500"
                                         data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                                         data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                                         data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                         data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                         data-start="1000"
                                         data-splitin="none"
                                         data-splitout="none"
                                         data-responsive_offset="on"
                                         style="z-index: 7; white-space: nowrap; font-weight:600;" >tests COVID-19 A Marrakech
                                    </div>
                                    <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway  pl-30 pr-30"
                                         id="rs-1-layer-2"
                                         data-x="['center']"
                                         data-hoffset="['0']"
                                         data-y="['middle']"
                                         data-voffset="['4']"
                                         data-fontsize="['30']"
                                         data-lineheight="['40']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"
                                         data-transform_idle="o:1;s:500"
                                         data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                                         data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                                         data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                         data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                         data-start="1000"
                                         data-splitin="none"
                                         data-splitout="none"
                                         data-responsive_offset="on"
                                         style="z-index: 7; white-space: nowrap; font-weight:600; border-radius:15px; "> <a href="{{url('/testappointment')}}" target="_blank" class="btn btn-success" style="color: #fff ;background-color:#f05454 ; border:0; border-radius: 25px; font-weight :600">Cliquez pour prendre rendez-vous <br> et bénéficiez d’une remise de 100 dhs</a>
                                    </div>
                                </li>
                            {{-- @endforeach --}}

                            <li data-index="rs-2" data-transition="random" data-slotamount="7"  data-easein="default" data-easeout="default" data-masterspeed="1000"  data-thumb="{{ asset('images/laboratoireainitti3.jpeg') }}"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-description="">
                                <img src="{{ asset('images/laboratoireainitti3.jpeg') }}"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="6" data-no-retina>
                                <img src="images/pattern3.png"  alt=""  data-bgposition="center top" data-bgfit="repeat" data-bgrepeat="repeat" class="rev-slidebg" data-bgparallax="6" data-no-retina data-background="red" >
                                <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway   pl-40 pr-40"
                                     id="rs-1-layer-1"
                                     data-x="['center']"
                                     data-hoffset="['0']"
                                     data-y="['middle']"
                                     data-voffset="['-115']"
                                     data-fontsize="['40']"
                                     data-lineheight="['50']"
                                     data-width="none"
                                     data-height="none"
                                     data-whitespace="nowrap"
                                     data-transform_idle="o:1;s:500"
                                     data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                                     data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                                     data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                     data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                     data-start="1000"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-responsive_offset="on"
                                     style="z-index: 7; white-space: nowrap; font-weight:600; border-radius:15px;overflow-wrap: break-word;" >laboratoire d'analyse medicale
                                </div>
                                <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway  pl-30 pr-30"
                                         id="rs-1-layer-2"
                                         data-x="['center']"
                                         data-hoffset="['0']"
                                         data-y="['middle']"
                                         data-voffset="['-20']"
                                         data-fontsize="['30']"
                                         data-lineheight="['40']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"
                                         data-transform_idle="o:1;s:500"
                                         data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                                         data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                                         data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                         data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                         data-start="1000"
                                         data-splitin="none"
                                         data-splitout="none"
                                         data-responsive_offset="on"
                                         style="z-index: 7; white-space: nowrap; font-weight:600; border-radius:15px; "> <a href="{{url('/testappointment')}}" target="_blank" class="btn btn-success" style="color: #fff ;background-color:#f05454 ; border:0; border-radius: 25px; font-weight :600">Cliquez pour prendre rendez-vous <br> et bénéficiez d’une remise de 100 dhs</a>
                                    </div>
                            </li>
                            <li data-index="rs-3" data-transition="random" data-slotamount="7"  data-easein="default" data-easeout="default" data-masterspeed="1000"  data-thumb="{{ asset('images/laboratoireainitti1.jpeg') }}"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-description="">
                                <img src="{{ asset('images/laboratoireainitti1.jpeg') }}"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="6" data-no-retina>
                                <img src="images/pattern3.png"  alt=""  data-bgposition="center top" data-bgfit="repeat" data-bgrepeat="repeat" class="rev-slidebg" data-bgparallax="6" data-no-retina data-background="red" >
                                <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway   pl-40 pr-40"
                                     id="rs-1-layer-1"
                                     data-x="['center']"
                                     data-hoffset="['0']"
                                     data-y="['middle']"
                                     data-voffset="['-115']"
                                     data-fontsize="['40']"
                                     data-lineheight="['50']"
                                     data-width="none"
                                     data-height="none"
                                     data-whitespace="nowrap"
                                     data-transform_idle="o:1;s:500"
                                     data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                                     data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                                     data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                     data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                     data-start="1000"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-responsive_offset="on"
                                     style="z-index: 7; white-space: nowrap; font-weight:600; border-radius:15px;overflow-wrap: break-word;" >laboratoire ain itti A Marrakech
                                </div>
                                <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway  pl-30 pr-30"
                                         id="rs-1-layer-2"
                                         data-x="['center']"
                                         data-hoffset="['0']"
                                         data-y="['middle']"
                                         data-voffset="['-20']"
                                         data-fontsize="['30']"
                                         data-lineheight="['40']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"
                                         data-transform_idle="o:1;s:500"
                                         data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                                         data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                                         data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                         data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                         data-start="1000"
                                         data-splitin="none"
                                         data-splitout="none"
                                         data-responsive_offset="on"
                                         style="z-index: 7; white-space: nowrap; font-weight:600; border-radius:15px; "> <a href="{{url('/testappointment')}}" target="_blank" class="btn btn-success" style="color: #fff ;background-color:#f05454 ; border:0; border-radius: 25px; font-weight :600">Cliquez pour prendre rendez-vous <br> et bénéficiez d’une remise de 100 dhs</a>
                                    </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <script>
                    $(document).ready(function(e) {
                        var revapi = $(".rev_slider").revolution({
                            sliderType:"standard",
                            sliderLayout: "auto",
                            dottedOverlay: "none",
                            delay: 5100,
                            navigation: {
                                keyboardNavigation: "off",
                                keyboard_direction: "horizontal",
                                mouseScrollNavigation: "off",
                                onHoverStop: "off",
                                touch: {
                                    touchenabled: "on",
                                    swipe_threshold: 75,
                                    swipe_min_touches: 1,
                                    swipe_direction: "horizontal",
                                    drag_block_vertical: false
                                },
                                arrows: {
                                    style: "gyges",
                                    enable: true,
                                    hide_onmobile: false,
                                    hide_onleave: true,
                                    hide_delay: 200,
                                    hide_delay_mobile: 1200,
                                    tmp: '',
                                    left: {
                                        h_align: "left",
                                        v_align: "center",
                                        h_offset: 0,
                                        v_offset: 0
                                    },
                                    right: {
                                        h_align: "right",
                                        v_align: "center",
                                        h_offset: 0,
                                        v_offset: 0
                                    }
                                },
                                bullets: {
                                    enable: false,
                                    hide_onmobile: true,
                                    hide_under: 800,
                                    style: "hebe",
                                    hide_onleave: false,
                                    direction: "horizontal",
                                    h_align: "center",
                                    v_align: "bottom",
                                    h_offset: 0,
                                    v_offset: 30,
                                    space: 5,
                                    tmp: '<span class="tp-bullet-image"></span><span class="tp-bullet-imageoverlay"></span><span class="tp-bullet-title"></span>'
                                }
                            },
                            responsiveLevels: [1240, 1024, 778],
                            visibilityLevels: [1240, 1024, 778],
                            gridwidth: [1170, 1024, 778, 480],
                            gridheight: [655, 768, 960, 720],
                            lazyType: "none",
                            parallax: {
                                origo: "slidercenter",
                                speed: 1000,
                                levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 100, 55],
                                type: "scroll"
                            },
                            shadow: 0,
                            spinner: "off",
                            stopLoop: "on",
                            stopAfterLoops: 0,
                            stopAtSlide: -1,
                            shuffle: "off",
                            autoHeight: "off",
                            fullScreenAutoWidth: "off",
                            fullScreenAlignForce: "off",
                            fullScreenOffsetContainer: "",
                            fullScreenOffset: "0",
                            hideThumbsOnMobile: "off",
                            hideSliderAtLimit: 0,
                            hideCaptionAtLimit: 0,
                            hideAllCaptionAtLilmit: 0,
                            debugMode: false,
                            fallbacks: {
                                simplifyAll: "off",
                                nextSlideOnWindowFocus: "off",
                                disableFocusListener: false,
                            }
                        });
                    });
                </script>
            </div>
        </div>
        <div class="mb-30 mt-40">
            <div class="container pb-0 TextColor">
                <div class="row">

                    <div class="col-md-4  onlyl wow ">
                        <div class="border-10px p-30" style="height: 470px">
                            <h5 class="BC"><i class="fa fa-clock-o BC" style="color:#3ec5cc"></i> HORAIRES D'OUVERTURES</h5>
                            <p class="mt-0 F-13">Vous pouvez accéder à notre <br>laboratoire du :</p>
                            <div class="opening-hourse text-left">
                                <ul class="list-unstyled">
                                    <li class="clearfix line-height-1 F-13"> <span>Lundi – Dimanche</span>
                                        <div class="value"> 08h30 - 18h00 </div>
                                    </li>
                                </ul>
                            </div>
                            <h5 class="mt-30 BC"><i class="fa fa-pencil-square-o BC" style="color:#3ec5cc"></i> INFOS UTILES</h5>
                            <p class="mt-0 F-13"><span style="font-weight:bold">Prélèvement à domicile :</span> remplissez le formulaire
                                <span style="color: #3ec5cc">
                                <a href="#res" style="color: #3ec5cc ;font-size: 16px">
                                    <i class="fas fa-arrow-right" style="color: #3ec5cc"></i>
                                </a>
                                </span>
                            </p>
                            <p class="mt-0 F-13"><span style="font-weight:bold">Préparez votre examen :</span> Retrouvez nos recommandations utiles avant de procéder aux examens <span style="color: #3ec5cc">
                                    <a href="{{url('/info')}}" style="color: #3ec5cc;font-size: 16px">
                                        <i class="fas fa-arrow-right" style="color: #3ec5cc"></i>
                                    </a>
                                </span>
                            </p>
                            <p class="mt-0 F-13"><span style="font-weight:bold">Conventions :</span> CMIM, CNOPS, CNSS</p>
                        </div>
                    </div>


                    <div class="col-md-4 wow onlyl BC rsp-1 zoro" >
                        <h1 class=" font-playfair mt-0 BC" style="color:#00a3c8 ; font-size: 27px; text-align:center" >LABORATOIRE<br>D’ANALYSES MÉDICALES<br>AIN ITTI</h1>
                        <p class="F-13">Nous assurons votre prise en charge, pour diverses analyses, avec ou sans RDV.</p>
                        <p class="mt-20 F-13">Notre équipe mobile vous propose aussi un service à domicile sur Marrakech.</p>
                        <a href="{{url('/about')}}" class="btn btn-default btn-lg mb-md-0 Hbtn mt-150 float-right" style="background-color:#3ec5cc; font-weight:600; font-size: 16px">En savoir plus</a>
                    </div>



                    <div class="col-md-4 onlyl wow rsp-2">
                        <div class="border-10px p-30" style="height: 470px">
                            <h5 class=" BC" style="font-size: 14px!important;"><i class="fas fa-desktop BC" style="color:#3ec5cc"></i> RÉSULTATS D’ANALYSE EN LIGNE</h5>
                            <p class="mt-0 F-13">Vous pouvez récupérer vos résultats d’analyse via notre espace sécurisé.</p>
                            <div class="opening-hourse text-left" style="margin-top:40;">
                                <ul class="list-unstyled" style="margin-top:50px;" >
                                    <li class="clearfix line-height " style="border:0px;">
                                        <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-default btn-lg mb-40 Nbtn BC" style="background-image:url('data:image/jpeg;base64,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');background-position:center; text-decoration: none; ">
                                            <h4 style="font-weight:600; color: #2c3e50">Accès Patient</h4>
                                        </button>
                                    </li>
                                    <li class="clearfix line-height " style="border:0px;">
                                        <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-default btn-lg mb-md-0 Nbtn" style="background-image:url('assets/images/amd.jpg');background-position:center; text-decoration: none;">
                                            <h4 style="font-weight:600; color: #2c3e50">Accès Médecin</h4>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                        <div class="col-md-12 wow mb-10 BC onlyt " style=" text-align: center;" >
                            <h1 class=" font-playfair mt-0 BC" style="color:#00a3c8 ; font-size: 27px; text-align:center" >LABORATOIRE<br>D’ANALYSES MÉDICALES<br>AIN ITTI</h1>
                            <p class="F-13">Nous assurons votre prise en charge, pour diverses analyses, avec ou sans RDV.</p>
                            <p class="mt-20 F-13">Notre équipe mobile vous propose aussi un service à domicile sur Casablanca.</p>
                            <a href="{{url('/about')}}" class="btn btn-default btn-lg mb-md-0 Hbtn mt-10  float-right" style="background-color:#3ec5cc; font-weight:600; font-size: 16px">En savoir plus</a>
                        </div>
                    <div class="col-md-6 onlyt wow ">
                        <div class="border-10px p-30" style="height: 480px">
                            <h5 class="BC"><i class="fa fa-clock-o BC" style="color:#3ec5cc"></i> HORAIRES D'OUVERTURES</h5>
                            <p class="mt-0 F-13">Vous pouvez accéder à notre <br>laboratoire du :</p>
                            <div class="opening-hourse text-left">
                                <ul class="list-unstyled">
                                    <li class="clearfix line-height-1 F-13"> <span>Lundi – Dimanche</span>
                                        <div class="value"> 08h30 - 18h00 </div>
                                    </li>
                                </ul>
                            </div>
                            <h5 class="mt-30 BC"><i class="fa fa-pencil-square-o BC" style="color:#3ec5cc"></i> INFOS UTILES</h5>
                            <p class="mt-0 F-13"><span style="font-weight:bold">Prélèvement à domicile :</span> remplissez le formulaire
                                <span style="color: #3ec5cc">
                                <a href="#res" style="color: #3ec5cc ;font-size: 16px">
                                    <i class="fas fa-arrow-right" style="color: #3ec5cc"></i>
                                </a>
                                </span>
                            </p>
                            <p class="mt-0 F-13"><span style="font-weight:bold">Préparez votre examen :</span> Retrouvez nos recommandations utiles avant de procéder aux examens <span style="color: #3ec5cc">
                                    <a href="{{url('/info')}}" style="color: #3ec5cc;font-size: 16px">
                                        <i class="fas fa-arrow-right" style="color: #3ec5cc"></i>
                                    </a>
                                </span>
                            </p>
                            <p class="mt-0  F-13"><span style="font-weight:bold">Conventions :</span> CMIM, CNOPS, CNSS

                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 wow  onlyt rsp-2 ">
                        <div class="border-10px p-30" style="height: 480px">
                            <h5 class=" BC" style="font-size: 14px!important;"><i class="fas fa-desktop BC" style="color:#3ec5cc"></i> RÉSULTATS D’ANALYSE EN LIGNE</h5>
                            <p class="mt-0 F-13">Vous pouvez récupérer vos résultats d’analyse via notre espace sécurisé.</p>
                            <div class="opening-hourse text-left" style="margin-top:40;">
                                <ul class="list-unstyled" style="margin-top:50px;" >
                                    <li class="clearfix line-height " style="border:0px;">
                                        <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-default btn-lg mb-40 Nbtn BC" style="background-image:url('data:image/jpeg;base64,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');background-position:center; text-decoration: none; ">
                                            <h4 style="font-weight:600; color: #2c3e50">Accès Patient</h4>
                                        </button>
                                    </li>
                                    <li class="clearfix line-height " style="border:0px;">
                                        <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-default btn-lg mb-md-0 Nbtn" style="background-image:url('assets/images/amd.jpg');background-position:center; text-decoration: none;">
                                            <h4 style="font-weight:600; color: #2c3e50">Accès Médecin</h4>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>

                </div>
            </div>
        </div>


        <div class="container mb-30" style="margin-bottom:60px; margin-top:60px;">
            <h2 class="text-uppercase mt-0  text-center" style="color: #f05454">Test Covid-19</h2>
            <div class="rrd">
                <p class="BC F-13">
                    Nous avons le plaisir de vous informer que le laboratoire d'analyses AIN ITTI est officiellement autorisé pour la réalisation des tests COVID 19 par RT-PCR.
                    La prise en charge des patients pour ce depistage est située à l'étage, dans un espace spécialement dédié, indépendant de l'accueil principal du laboratoire, et totalement conforme aux normes d'hygiène imposées.
                    Il est IMPERATIF de vous munir de votre CIN ou passeport et d’une copie de d’un de ces documents d’identité que gardera le laboratoire afin de faciliter la procédure. Des informations supplémentaires pourront vous être demandées une fois sur place, pour une meilleure organisation, la prise de rendez vous est vivement recommandée par mail à ain itti.laboratoire@gmail.com et les prélèvements sont assurés du lundi au vendredi de 7h30 à 18h et le samedi de 9h00 à 11h.
                    Cependant pour bénéficier d’une exécution rapide du test dans le cadre d’un voyage par exemple vous êtes priés de vous présenter au laboratoire avant 12h.
                </p>
                <p class="BC F-13 text-center" style="font-size:18px">Pour plus d'information contactez :</br><strong><a href="tel:0524329385" style="color: #f05454 ; ">05 24 32 93 85</a></strong></p>

            </div>
            <div class="float-right formrp BC F-13">
                <a href="{{url('testappointment')}}" target="_blank" class="btn btn-primary mt-40 float-right" style="background-color:#3ec5cc;border:0px;font-weight:600; font-size: 16px; color:#fff">
                    Prendre rendez-vous
                </a>
            </div>
        </div>




        <div class="container pb-10 mt-30 col-md-12">
            <div class="section-title text-center" style="margin-bottom: 10px ;margin-top: 40px">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 onlyl">
                        <h2 class="text-uppercase mt-0 LBC">Assurer la satisfaction de nos patients est notre priorité</h2>

                        <p class="BC F-16">Notre équipe de laboratoire Ain Itti professionnels veillent au quotidien sur la qualité de réalisation de vos analyses.
                            Nous avons ainsi équipé notre laboratoire en plateaux techniques avec du matériels très performants pour vous garantir le meilleur délai de vos résultats dans des conditions de qualité optimale.
                        </p>
                    </div>
                    <div class="col-md-12 col-md-offset-2 onlyt">
                        <h2 class="text-uppercase mt-0 LBC">Assurer la satisfaction de nos patients est notre priorité</h2>

                        <p class="BC F-16">Notre équipe de laboratoire Ain Itti professionnels veillent au quotidien sur la qualité de réalisation de vos analyses.
                            Nous avons ainsi équipé notre laboratoire en plateaux techniques avec du matériels très performants pour vous garantir le meilleur délai de vos résultats dans des conditions de qualité optimale.
                        </p>
                    </div>
                </div>
            </div>

            <section class="section-centent">
{{-- <br><br><br><br> --}}
                <div class="row">
                    <div class="container">
                        <div class="">
                            @foreach($analyses as $analyse)
                                <div class="col-md-4">
                                <a href="#"><i class="{{$analyse->icon}}" style="font-size: 40px; color:#3ec5cc"></i></a>
                                    <h3> {{$analyse->name}}</h3>
                                <p>{{$analyse->desc}}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>



        <div>
        </div>
            <div id="res" class="test-resp">
                <br>
                <br>
            </div>
        <div class=" border-10px bg-white-light" >
            <div class="tab-content" >
                <div class="tab-pane fade in active">
                    <div class="row" >
                        <div class="col-md-12 mmmap">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1951.633173718666!2d-7.984485070883399!3d31.645543824870597!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7b8994b1da766054!2sLABORATOIRE%20AINITTI!5e0!3m2!1sfr!2sma!4v1611272615998!5m2!1sfr!2sma" width="900" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection