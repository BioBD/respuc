<!DOCTYPE html>
<html lang="pt-br" style="" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients no-cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths -moz- js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients no-cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths">

    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>SISTEMA RESPUC/NEAM</title>

        <link rel="shortcut icon" href="<?= $this->config->item('assets'); ?>images/favicon.ico" type="image/x-icon">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Responsive Flat Dropdown Menu Demo</title>

        <script type="text/javascript" src="<?= $this->config->item('assets'); ?>js/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('assets'); ?>js/ui/jquery-ui.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('assets'); ?>js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('assets'); ?>js/jquerysettings.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('assets'); ?>js/jquery/jquery.redirect.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('assets'); ?>js/bootstrap-switch.min.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('assets'); ?>js/jquery/jquery.mask.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('assets'); ?>js/jquery.tablesorter.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('assets'); ?>js/jquery.tablesorter.widgets.js"></script>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <link href="<?= $this->config->item('assets'); ?>css/indexformat.css" rel="stylesheet">
    </head>


    <body>

        <div style="width: 100%; height: 45px; background: rgb(141, 179, 201) none repeat scroll 0% 0%; padding: 5px;">
        <div class="row"> <div class="col-md-12 text-right"> <ul class="list-inline">

        <li><a href="https://www.facebook.com/BRPUCRio/" title="PUC-RIO Facebook" class="" target="_top"> 
        <span class="fa fa-facebook-square fa-2x"> &nbsp; </span> </a> </li>

        <li><a href="https://twitter.com/pucriodigital" title="PUC-RIO Twitter" class="" target="_top"> 
        <span class="fa fa-twitter-square fa-2x"> &nbsp; </span> </a> </li> 

        <li><a href="https://br.linkedin.com/edu/pontifícia-universidade-católica-do-rio-de-janeiro-10582" title="PUC-RIO Twitter" class="" target="_top"> 
        <span class="fa fa-linkedin-square fa-2x"> &nbsp; </span> </a> </li> 

        <li><a href="https://www.youtube.com/user/pucriooficial" title="PUC-RIO YouTube" class="" target="_top"> 
        <span class="fa fa-youtube-square fa-2x"> &nbsp; </span> </a> </li> </ul> </div> </div> </div>

        <div style="width: 100%;" align="center">
        <img src="<?= $this->config->item('assets'); ?>images/header.png" usemap="#mapeamento">

        <map id="mapeamento" name="mapeamento">
        <area shape="rect" alt="respuc" coords="306,7,386,90" href="http://www.puc-rio.br/vrc/respuc/" target="_self">
        <area shape="rect" alt="respuc1" coords="620,4,698,87" href="http://www.puc-rio.br/vrc/respuc/" target="_self">
        <area shape="rect" alt="dipuc" coords="0,0,95,99" href="http://www.inf.puc-rio.br" target="_self">
        <area shape="rect" alt="home" coords="385,13,613,85" href="http://www.neam.puc-rio.br/neam" target="_self">
        <area shape="rect" alt="puc"  coords="938,0,993,98" href="http://www.puc-rio.br/index.html" target="_self">

        </map> </div> 

        <style type="text/css"> ul li.activeMenu a { background-color: darkorange; } </style>
        <style type="text/css"> ul li a:hover { background-color: rgb(141, 179, 201) none repeat scroll 0% 0%; } </style>
        <style type="text/css"> ul li a:hover { background-color: rgb(141, 179, 201) none repeat scroll 0% 0%; } </style>

        <nav> <a id="resp-menu" class="responsive-menu" href="#"> <i class="fa fa-reorder"> </i> Menu</a> 

        <ul class="menu" style="height:49px;">

        <li class="activeMenu"> <a href = "<?=$this->config->item('url_link'); ?>DisplayInfo/inicio" style="height: 49px;"> 
        <i class="fa fa-home"> </i> Início </a> </li>

        <li> <a href="<?= $this->config->item('url_link'); ?>DisplayInfo/admin" style="height: 49px;"> 
        <i class="fa fa-pencil-square-o"> </i> Administração</a> </li>

        <li> <a href="<?= $this->config->item('url_link'); ?>DisplayInfo/relatorio" style="height: 49px;"> 
        <i class="fa fa-line-chart"> </i> Relatórios</a> </li>

        <li> <a id="contact" href="<?= $this->config->item('url_link'); ?>DisplayInfo/contato" style="height: 49px;">
        <i class="fa fa-envelope"> </i> Contatos</a> </li> </ul> </nav>

        <script>
            setTimeout(function() {
                var redirectLocation = "<?=$this->config->item('url_link'); ?>DisplayInfo/inicio";
                var redirectionLocation = "<?=$this->config->item('url_link'); ?>";
                if(window.location.href !== redirectLocation && window.location.href == redirectionLocation)
                    window.location.href = "<?=$this->config->item('url_link'); ?>DisplayInfo/inicio";}, 100);
        </script>