<script>

</script>

<div>
    <?php // require_once APPPATH . 'views/include/left_menu.php'
		if(isset($message) && $message !== null){
			echo "<script>alert(\"{$message}\")</script>";			
		} 
	?>
    <div>
            <a href="<?php echo $this->config->item('base_link').'FuncionarioController/insert' ?>">
                <input type="button" class='btn btn-primary' value="Inserir Funcionário">
            </a>
            <a href="<?php echo $this->config->item('base_link').'FuncionarioController/form_csv' ?>">
                <input type="button" class='btn btn-success' value="Importar CSV">
			</a>
        <div class="row">
        </div>
        <br/>

		<table class="table table-bordered table-striped table-min-td-size" style="max-width: 100%;" id="sortable-table">
							<tr>
								<th style="width: 100px;">Nome</th>
								<th style="width: 100px;">Email</th>
								<th style="width: 150px;">Função</th>
                                <th colspan="2" style="width: 500px;">Ações</th>
							</tr>
							<tbody id="tablebody">
								<?php foreach ($funcionarios as $funcionario) { ?> 
									<tr>
										<td><?php echo $funcionario->getNome();?></td>
										<td><?php echo $funcionario->getEmail();?></td>
										<td><?php echo $funcionario->getFuncao();?></td>
                                        <td><a href="<?php echo $this->config->item('base_link').'FuncionarioController/edit?cpf='.$funcionario->getCpf(); ?>">
                                            <input class="btn btn-success" type="button" value="Editar"></a></td>
                                        <td><a href="<?php echo $this->config->item('base_link').'FuncionarioController/delete?cpf='.$funcionario->getCpf(); ?>">
                                            <input class="btn btn-danger" type="button" value="Deletar"></a></td>								
									</tr>
								<?php } ?>
							</tbody>
			</table>
    </div>
</div>