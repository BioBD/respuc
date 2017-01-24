<!doctype html>
<?php session_start(); ?>
<html lang="en" class="no-js">
    <head>
        <title>RESPUC - PUC-RIO</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=Montserrat:300,400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic' rel='stylesheet' type='text/css'>


        <link rel="stylesheet" type="text/css" href="views/css/bootstrap.min.css" media="screen">
        <link rel="stylesheet" type="text/css" href="views/css/jquery.bxslider.css" media="screen">
        <link rel="stylesheet" type="text/css" href="views/css/owl.carousel.css" media="screen">
        <link rel="stylesheet" type="text/css" href="views/css/owl.theme.css" media="screen">
        <link rel="stylesheet" type="text/css" href="views/css/font-awesome.css" media="screen">

        <!-- REVOLUTION STYLE SHEETS -->
        <link rel="stylesheet" type="text/css" href="views/css/settings.css">
        <!-- REVOLUTION LAYERS STYLES -->
        <link rel="stylesheet" type="text/css" href="views/css/layers.css">
        <!-- REVOLUTION NAVIGATION STYLES -->
        <link rel="stylesheet" type="text/css" href="views/css/navigation.css">

        <link rel="stylesheet" type="text/css" href="views/css/style.css" media="screen">


        <script type="text/javascript" src="views/js/jquery.min.js"></script>
        <script type="text/javascript" src="views/js/jquery.migrate.js"></script>
        <script type="text/javascript" src="views/js/jquery.bxslider.min.js"></script>
        <script type="text/javascript" src="views/js/jquery.appear.js"></script>
        <script type="text/javascript" src="views/js/jquery.countTo.js"></script>
        <script type="text/javascript" src="views/js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="views/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="views/js/jquery.imagesloaded.min.js"></script>
        <script type="text/javascript" src="views/js/retina-1.1.0.min.js"></script>

        <!-- REVOLUTION JS FILES -->
        <script type="text/javascript" src="views/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="views/js/jquery.themepunch.revolution.min.js"></script>

        <!-- SLIDER REVOLUTION 5.0 EXTENSIONS
                (Load Extensions only on Local File Systems !
                The following part can be removed on Server for On Demand Loading) -->
        <script type="text/javascript" src="views/js/extensions/revolution.extension.actions.min.js"></script>
        <script type="text/javascript" src="views/js/extensions/revolution.extension.carousel.min.js"></script>
        <script type="text/javascript" src="views/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script type="text/javascript" src="views/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script type="text/javascript" src="views/js/extensions/revolution.extension.migration.min.js"></script>
        <script type="text/javascript" src="views/js/extensions/revolution.extension.navigation.min.js"></script>
        <script type="text/javascript" src="views/js/extensions/revolution.extension.parallax.min.js"></script>
        <script type="text/javascript" src="views/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script type="text/javascript" src="views/js/extensions/revolution.extension.video.min.js"></script>
        <script type="text/javascript" src="views/js/script.js"></script>

        <!-- ACCORDION */ -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(function () {
                $("#accordion").accordion();
            });
        </script>
        <!-- END ACCORDION */ -->


    </head>
    <body>
        <!-- Container -->
        <div id="container">
            <!-- Header
                ================================================== -->
            <header class="clearfix">
                <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                    <div class="top-line">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <ul class="info-list">
                                        <li>
                                            <i class="fa fa-globe"></i>
                                            PUC RIO - LOGO
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="social-icons">
                                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a class="dribble" href="#"><i class="fa fa-dribbble"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index.html"></a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a class="active" href="index.php?page=home">Home</a></li>
                                <li><a href="index.php?ctrl=voluntario&pg=voluntarios">Voluntários</a></li>
                                <li><a href="index.php?page=instituicoes">Instituições</a></li>
                                <li><a href="index.php?page=atividades">Atividades</a></li>
                                <li><a href="index.php?page=estagios">Estágios</a></li>
                                <li class="search"><a href="#" class="open-search"><i class="fa fa-search"></i></a>
                                    <form class="form-search">
                                        <input type="search" placeholder="Search:"/>
                                        <button type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </header>
            <?php
            if (isset($_GET['ctrl'])) {
                include "controllers/controller_" . $_GET['ctrl'] . ".php";
            } else {
                if (isset($_GET['page'])) {
                    include "views/" . $_GET['page'] . ".php";
                } else {
                    include "views/home.php";
                }
            }
            ?>

            <?php include "views/footer.php"; ?>
        </div>
        <!-- End Container -->

        <!-- Revolution slider -->
        <script type="text/javascript">
            var tpj = jQuery;
            var revapi66;
            tpj(document).ready(function () {
                if (tpj("#rev_slider_66_1").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_66_1");
                } else {
                    revapi66 = tpj("#rev_slider_66_1").show().revolution({
                        sliderType: "standard",
                        jsFileLocation: "js/",
                        sliderLayout: "fullwidth",
                        dottedOverlay: "none",
                        gridheight: 600,
                        gridwidth: 1140,
                        delay: 9000,
                        navigation: {
                            keyboardNavigation: "off",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation: "off",
                            onHoverStop: "off",
                            touch: {
                                touchenabled: "on",
                                swipe_threshold: 75,
                                swipe_min_touches: 1,
                                swipe_direction: "vertical",
                                drag_block_vertical: false
                            },
                            arrows: {
                                style: "uranus",
                                enable: true,
                                hide_onmobile: true,
                                hide_under: 778,
                                hide_onleave: true,
                                hide_delay: 200,
                                hide_delay_mobile: 1200,
                                tmp: '',
                                left: {
                                    h_align: "left",
                                    v_align: "center",
                                    h_offset: 20,
                                    v_offset: 0
                                },
                                right: {
                                    h_align: "right",
                                    v_align: "center",
                                    h_offset: 20,
                                    v_offset: 0
                                }
                            }
                        },
                        lazyType: "none",
                        shadow: 0,
                        spinner: "off",
                        stopLoop: "on",
                        stopAfterLoops: 0,
                        stopAtSlide: 1,
                        shuffle: "off",
                        autoHeight: "off",
                        fullScreenAlignForce: "off",
                        fullScreenOffsetContainer: "",
                        fullScreenOffset: "",
                        disableProgressBar: "on",
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
                }
            }); /* ready */
        </script>
    </body>
</html>