<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>RESPUC NEAM</title>
        <link href="<?= $this->config->item('assets'); ?>css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?= $this->config->item('assets'); ?>css/themes/base/jquery-ui.css" />
        <link rel="stylesheet" href="<?= $this->config->item('assets'); ?>css/bootstrap-switch.min.css"></script>
        <script type="text/javascript" src="<?= $this->config->item('assets'); ?>js/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('assets'); ?>js/ui/jquery-ui.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('assets'); ?>js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('assets'); ?>js/jquerysettings.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('assets'); ?>js/jquery/jquery.redirect.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('assets'); ?>js/bootstrap-switch.min.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('assets'); ?>js/jquery/jquery.mask.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('assets'); ?>js/jquery.tablesorter.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('assets'); ?>js/jquery.tablesorter.widgets.js"></script>

        <link href="<?= $this->config->item('assets'); ?>css/basic.css" rel="stylesheet" />

</head>
<body>

    <header class="navbar <?php if ($this->db->database == 'app_dev') echo "navbar-test"; else echo "navbar-sags";?>" role="banner" id="top">
        <div class="container">
            <a class="navbar-brand" href="<?= $this->config->item('base_link') ?>">
                    <?php
                        if ($this->db->database == 'app_dev') 
                        {
                            echo "AMBIENTE DE TESTES<br>";
                        }
                    ?>   
                <img src="<?= $this->config->item('assets'); ?>images/logo_puc_horizontal.png" width=320 height=80 />
            </a>
        </div>
    </header>

    <div class="main-container">