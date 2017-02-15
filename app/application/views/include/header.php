<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>RESPUC NEAM</title>

        <link href="<?= $this->config->item('assets'); ?>css/basic.css" rel="stylesheet" />

</head>
<body>
    <header class="navbar <?php if ($this->db->database == 'app_dev') echo "navbar-test"; else echo "navbar-sags";?>" role="banner" id="top">
        <div class="container">
                </a>
                <div class="navbar-form navbar-right" style="margin-top:20px">
                    <?php
                        if ($this->db->database == 'app_dev') 
                        {
                            echo "AMBIENTE DE TESTES<br>";
                        }
                        else
                        {
                            echo "AMBIENTE DE PRODUCAO<br>";
                        }
                    ?>   

                </div>
        </div>
    </header>

    <div class="main-container">