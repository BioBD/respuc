<div class = "row">
    <?php require_once APPPATH . 'views/include/left_menu.php' ?>
    <div class="col-lg-10">
	    <ul class="nav nav-pills nav-stacked">
			<li><a href="<?= $this->config->item('base_link'); ?>InstituicaoController/search">Procurar</a></li>
			<li><a href="<?= $this->config->item('base_link'); ?>InstituicaoController/show">Mostrar todos</a></li>
			<li><a href="<?= $this->config->item('base_link'); ?>InstituicaoController/insert">Inserir um</a></li>
			<li><a href="<?= $this->config->item('base_link'); ?>InstituicaoController/form_csv">Enviar csv</a></li>
	    </ul>

    </div>
</div>
