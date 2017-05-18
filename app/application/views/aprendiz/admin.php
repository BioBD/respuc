<div>
    <?php 
		if(isset($message) && $message !== null){
			echo "<script>alert(\"{$message}\")</script>";			
		} 
	?>
    <div>
            <a href="<?php echo $this->config->item('base_link').'AprendizController/insert' ?>">
                <input type="button" class='btn btn-primary' value="Inserir Aprendiz">
            </a>
            <a href="<?php echo $this->config->item('base_link').'AprendizController/form_csv' ?>">
                <input type="button" class='btn btn-success' value="Importar CSV">
            </a>

        <div class="row">
        </div>
        <br/>

		<table class="table table-bordered table-striped table-min-td-size" style="max-width: 100%;" id="sortable-table">
							<tr>
								<th style="width: 100px;">Nome</th>
								<th style="width: 100px;">Email</th>
								<th style="width: 150px;">Trabalho</th>
								<th colspan="2" style="width: 600px;">Responsável</th>
                                <th colspan="2" style="width: 500px;">Ações</th>
							</tr>
							<tr>
								<th></th>
								<th></th>
								<th></th>
								<th style="width: 100px;">Nome</th>
								<th style="width: 250px;">Telefone</th>
                                <th style="width: 250px;"></th>
                                <th style="width: 250px;"></th> 
							</tr>
							<tbody id="tablebody">
								<?php foreach ($aprendizes as $aprendiz) { ?> 
									<tr>
										<td>
											<a href='<?=$this->config->item('base_link')?>InstituicaoController/get?cpf=<?=urlencode($aprendiz->getCPF())?>'>
												<?=$instituicao->getNome()?> </a> 
										</td>
										<td><?php echo $aprendiz->getNome();?></td>
										<td><?php echo $aprendiz->getEmail();?></td>
										<td><?php echo $aprendiz->getTrabalho();?></td>
										<td><?php echo $aprendiz->getNomeResponsavel();?></td>
										<td><?php echo $aprendiz->getTelefoneResponsavel();?></td>
                                        <td><a href="<?php echo $this->config->item('base_link').'AprendizController/edit?nome='.$aprendiz->getNome(); ?>">
                                            <input class="btn btn-success" type="button" value="Editar"></a></td>
                                        <td><a href="<?php echo $this->config->item('base_link').'AprendizController/delete?nome='.$aprendiz->getNome(); ?>">
                                            <input class="btn btn-danger" type="button" value="Deletar"></a></td>								
									</tr>
								<?php } ?>
							</tbody>
			</table>
    </div>
</div>