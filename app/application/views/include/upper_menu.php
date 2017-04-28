<script>
    $(function () {
        $('#nav li a').click(function () {
            $('#nav li').removeClass();
            $($(this).attr('href')).addClass('active');
        });
    });
</script>
 <style type="text/css">
    li:hover { /*Trocar a cor das opções principais ao passar o mouse por cima */
        background:#c2c2d6;


    }
    li:hover ul {  /*Faz as opções cairem direto da navbar ao passar o mouse ( não precisa clicar) */
        display: block;
    }


    ul.nav a:hover{ /*Muda coisas quando passa o mouse por cima de alguma opção */
        background:#c2c2d6;
        color:#000000;
        border-color:#cc0000;
        border-width:1px;
    }
    li a.active { /* Troca a cor da opção da navbar correspondente ao link atual */
        background-color:#BDBDBD;}

    ul li a.not-active { /*Para quando não quiser que o link seja acessado */
        pointer-events: none;
    }
</style> 
<body>
    <nav class = "navbar navbar-default action-bar-to-right" style = "width:100%;" >

        <div class = "container-fluid" >
            <div  id="nav">
                <ul class = "nav navbar-nav" >
                <?php
                $paginaLink = $_SERVER['PHP_SELF'];
                $extra = '"';
                foreach($CRUDS as $crud)
                {

                ?>
                <li class = "dropdown" >
                    <a  <?php
                        if (strpos($paginaLink, $crud["pagina_admin"]) !== false) {
                            echo 'class="link active';
                        } else {
                            echo 'class="';
                        }
                        ?> navbar-brand <?php echo $extra ?> data-toggle = "dropdown" href = "#" > <?=$crud["nome"]?>
                            <span class = "caret" > </span></a >
                        <ul class = "dropdown-menu" >
                            <li > <a href = "<?= $this->config->item('url_link'); ?><?=$crud["controller"]?>/admin" > Administração </a></li >
                            <li > <a href = "<?= $this->config->item('url_link'); ?><?=$crud["controller"]?>/show" > Relatórios </a></li >
                        </ul>
                    </li>

                <?php                 
                }

                ?>
                </ul>
            </div>
        </div>
    </nav>