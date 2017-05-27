<link rel="stylesheet" href="<?= $this->config->item('assets'); ?>/css/style.css">
<link rel="stylesheet" href="<?= $this->config->item('assets'); ?>/css/style_alt.css" type="text/css">
<div id="wrap" style="background-repeat: repeat-y; background-position: center center;" align="center">
<table width="100%" cellspacing="0" cellpadding="0"><tbody><tr><td valign="top">
<div style="position: absolute; top: 2px; right: 13px; text-align: right;">
<table><tbody><tr></tr></tbody></table></div>
<div class="col-md-12"> <br><br>

<div class="row">
    <div class="col-md-2"></div>
    	<div class="col-md-8">
			<h4>Painel de Administração de Dados!</h4>
    			<p>Neste painel encontram-se as ações para administração de dados no banco! Aqui pode-se inserir, editar e enviar tabela CSV para quaisquer dados presentes...</p> </div>
    <div class="col-md-2"> </div>
</div>

<h4 class="alert alert-info text-center">Visualizar, Editar e Inserir Dados no Sistema</h4>
<div class="col-md-2"></div>

<div class="i-am-centered">
<div class="row" align="center">
	<div class="col-md-2" align="center">
    	<a href = "<?= $this->config->item('url_link'); ?>AlunoController/admin">
    		<div class="panel panel-default">    	
       			<div class="panel-body btn btn-primary" style="width: 100%;">         	
            		<i class="fa fa-wrench" style="color:#fff;"></i>
            		<span style="color:#fff;"><b>Alunos</b></span>            
        		</div>
			</div>
    	</a>
	</div>


<div class="row" align="center">
	<div class="col-md-2" align="center">
    	<a href = "<?= $this->config->item('url_link'); ?>AprendizController/admin">
    		<div class="panel panel-default">    	
       			<div class="panel-body btn btn-primary" style="width: 100%;">         	
            		<i class="fa fa-wrench" style="color:#fff;"></i>
            		<span style="color:#fff;"><b>Aprendizes</b></span>            
        		</div>
			</div>
    	</a>
	</div>

<div class="row" align="center">
	<div class="col-md-2" align="center">
    	<a href = "<?= $this->config->item('url_link'); ?>AtividadeController/admin">
    		<div class="panel panel-default">    	
       			<div class="panel-body btn btn-primary" style="width: 100%;">         	
            		<i class="fa fa-wrench" style="color:#fff;"></i>
            		<span style="color:#fff;"><b>Atividades</b></span>            
        		</div>
			</div>
    	</a>
	</div>

<div class="row" align="center">
	<div class="col-md-2" align="center">
    	<a href = "<?= $this->config->item('url_link'); ?>InstituicaoController/admin">
    		<div class="panel panel-default">    	
       			<div class="panel-body btn btn-primary" style="width: 100%;">         	
            		<i class="fa fa-wrench" style="color:#fff;"></i>
            		<span style="color:#fff;"><b>Instituições</b></span>            
        		</div>
			</div>
    	</a>
	</div>
</div>

<div class="col-md-2"></div>