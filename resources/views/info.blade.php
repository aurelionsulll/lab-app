@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div id="home" class="divider">
            <div class="container-fluid p-0">

                <!-- Slider Revolution Start -->
                <div class="rev_slider_wrapper">
                    <div class="rev_slider" data-version="5.0">
                        <ul>
                            <!-- SLIDE 1 -->
                            @foreach($sliders as $slider)
                                <li data-index="rs-{{$slider->id}}" data-transition="random" data-slotamount="7"  data-easein="default" data-easeout="default" data-masterspeed="1000"  data-thumb="images/{{$slider->image}}"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-description="">
                                    <!-- MAIN IMAGE -->
                                    <img src="images/{{$slider->image}}"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="6" data-no-retina style="color:rgba(255, 255, 255, 1)">
                                    <img src="images/pattern3.png"  alt=""  data-bgposition="center top" data-bgfit="repeat" data-bgrepeat="repeat" class="rev-slidebg" data-bgparallax="6" data-no-retina data-background="red" >
                                    <!-- LAYERS -->

                                    <!-- LAYER NR. 1 -->
                                    <div class="tp-caption tp-resizeme text-uppercase text-white  pl-40 pr-40"
                                         id="rs-1-layer-1"
                                         data-x="['center']"
                                         data-hoffset="['0']"
                                         data-y="['middle']"
                                         data-voffset="['-115']"
                                         data-fontsize="['50']"
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
                                         style="z-index: 7; white-space: nowrap; font-weight:600; border-radius:15px;">{{$slider->text}}
                                    </div>

                                    <!-- LAYER NR. 2 -->
                                    <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway  pl-30 pr-30"
                                         id="rs-1-layer-2"

                                         data-x="['center']"
                                         data-hoffset="['0']"
                                         data-y="['middle']"
                                         data-voffset="['-45']"
                                         data-fontsize="['28']"
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
                                         style="z-index: 7; white-space: nowrap; font-weight:600; border-radius:15px;" ><span class="mti">{{$slider->subtext}}</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <script>
                    $(document).ready(function(e) {
                        var revapi = $(".rev_slider").revolution({
                            sliderType:"standard",
                            sliderLayout: "auto",
                            dottedOverlay: "none",
                            delay: 5000,
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
                                    enable: false,
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

        <div  class="d-flex justify-content-center mt-60 onlyl ">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <div class="card shadow  mb-5 bg-white rounded onlyl" style="width: 40%; float:left;margin-right:25px;border:0px;min-height: 100px;">
                        <i class="icon-nursert pt-10" style="font-size:60px ;color:#3ec5cc;"></i>
                        <div class="card-body">
                            <p class="card-text BC F-13" style="text-align:left">
                                Notre équipe vous accueille du Lundi au Vendredi de 07h30 à 18h30 et le Samedi de 08h00 à 13h00.
                            </p>
                        </div>
                    </div>
                    <div class="card shadow  mb-5 bg-white rounded onlyl" style="width: 40%; float:left;margin-right:25px;border:0px;min-height: 100px;">
                        <i class="icon-positive3 pt-10" style="font-size:60px ;color:#3ec5cc;"></i>
                        <div class="card-body">
                            <p class="card-text BC F-13" style="text-align:left">
                                Si vous disposez d’une assurance maladie, n’oubliez pas de présenter l’ordonnance et la feuille des soins ainsi que la prise en charge dans le cadre d’une convention CMIM, CNOPS et CNSS.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>







        <div style="" class="container-fluid onlyt" style="">
            <div class="card shadow  mb-5 bg-white rounded onlyt lastmof" style="margin-bottom: 30px!important;width: 40%; float:left;margin-right:10%;margin-left: 5%; height:120px;border:0px;">
                <i class="icon-nursert pt-10" style="font-size:60px ;color:#3ec5cc;"></i>
                <div class="card-body">
                    <p class="card-text BC F-13" style="text-align:left">
                        Notre équipe vous accueille du Lundi au Vendredi de 07h30 à 18h30 et le Samedi de 07h30 à 13h00.
                    </p>
                </div>
            </div>
            <div style="padding: 10px; margin: 20px">
                <br>
            </div>

            <div class="card shadow  mb-5 bg-white rounded onlyt lastmof" style="margin-bottom: 30px!important;width: 40%; float:left;margin-right: 5%; height:120px;border:0px;">
                <i class="icon-positive3 pt-10" style="font-size:60px ;color:#3ec5cc;"></i>
                <div class="card-body">
                    <p class="card-text BC F-13" style="text-align:left">
                        Si vous disposez d’une assurance maladie, n’oubliez pas de présenter l’ordonnance et la feuille des soins ainsi que la prise en charge dans le cadre d’une convention.
                    </p>
                </div>
            </div>
        </div>


        <div  class="container mb-30 onlyl" style="margin-bottom:60px; margin-top:60px;">
            <div style="width:50%; border: 0" class="onlylp" >
                <img class="pull-left mr-15 thumbnail" src="https://cliniquego.com/2016/wp-content/uploads/2017/11/Prelevement_domicile_Infirmiere_Montreal.jpg" alt="" style="width:430px;height:260px">
            </div>
            <div class="rrd">
                <h2 class="text-uppercase mt-0 LBC">Prélèvement à domicile</h2>
                <p class="BC F-13">Pour les prélèvements sanguins à domicile, vous devez remplir le formulaire pour prendre rendez-vous avec notre équipe.</p>
                <P class="BC F-13">Notre équipe se déplace à votre domicile pour effectuer vos prises de sang sur rendez-vous du Lundi au Vendredi entre 08h00 à 10h00.</P>
            </div>
            <div class="float-right formrp BC F-13">
                <a href="{{url('/contact')}}" class="btn btn-primary mt-40 pull-right" style="background-color:#3ec5cc;border:0px;font-size:15px;font-weight:600; font-size: 16px; color:#fff">
                    Remplissez le formulaire
                </a>
            </div>
        </div>

        <div  class="container-fluid mb-30 onlyt" style="margin-bottom:60px; margin-top:60px;">
            <div style="width:50%; border: 0" class="onlylp" >
                <img class="pull-left mr-15 thumbnail" src="https://cliniquego.com/2016/wp-content/uploads/2017/11/Prelevement_domicile_Infirmiere_Montreal.jpg" alt="" style="width:430px;height:260px">
            </div>
            <div class="rrd">
                <h2 class="text-uppercase mt-0 LBC">Prélèvement à domicile</h2>
                <p class="BC F-13">Pour les prélèvements sanguins à domicile, vous devez remplir le formulaire pour prendre rendez-vous avec notre équipe.</p>
                <P class="BC F-13">Notre équipe se déplace à votre domicile pour effectuer vos prises de sang sur rendez-vous du Lundi au Vendredi entre 08h00 à 10h00.</P>
            </div>
            <div class="float-right formrp BC F-13">
                <a href="{{url('/contact')}}" class="btn btn-primary mt-40 pull-right" style="background-color:#3ec5cc;border:0px;font-size:15px;font-weight:600; font-size: 16px; color:#fff">
                    Remplissez le formulaire
                </a>
            </div>
        </div>
    </div>


    <div class="container col-md-12  mb-30 pt-40 pb-40 mw-100" style="background-color:#00a3c8;">
        <div class="col-md-12"  style="margin-left:10px;font-size:17px; color:#fff;width:100%">
            <h2 class="text-uppercase mt-0 " style="color:#fff">Récupérer vos résultats</h2>
            <div style="width:60%;float : left;" class="noimg">
                La plupart des résultats sont disponibles au laboratoire ou en ligne le soir même pour les prises de sang effectuées le matin. Cependant, au moment de l’enregistrement de votre dossier, nous vous confirmerons la date en fonction des examens effectués.
                <br>
                Vous pouvez aussi récupérer vos résultats en ligne via notre espace sécurisé accessible par login et mot de passe.
            </div>
            <div style="float : left; width:40%" class="onlylp">
                <img class="pull-left mr-15 " src="https://us.123rf.com/450wm/dolgachov/dolgachov1407/dolgachov140701101/29640828-la-sant%C3%A9-et-de-la-m%C3%A9decine-notion-grave-docteur-presse-papiers-et-le-patient-%C3%A0-l-h%C3%B4pital.jpg?ver=6" alt="" style="width:430px;height:260px">
            </div>
        </div>
    </div>

    <div  class="container-fluid mb-30 style="margin-bottom:60px; margin-top:60px">
    <div class="col-md-12 BC">
        <div class="rsp-6" style="width:40%;float : left; margin-right:20%">
            <h3 class="text-uppercase mt-0 LBC morespace"><i class="fas fa-credit-card" style="color:#00a3c8"></i> Modalités de règlement</h3>
            <p class="F-13">Vous pouvez régler vos analyses par espèce, chèque, carte bancaire, bon de prise en charge (CMIM, CNOPS).</p>
        </div>
        <div class="rsp-6" style="float:left; width:40%">
            <h3 class="text-uppercase mt-0 LBC morespace"><i class="fas fa-fingerprint" style="color:#00a3c8"></i> Confidentialité</h3>
            <p class="F-13">Les données informatiques vous concernant sont soumises au secret médical et sont strictement confidentielles.</p>
        </div>
    </div>
    </div>
    </div>
@endsection
