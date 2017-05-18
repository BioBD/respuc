<script>

</script>

<div>
    <?php 
		if(isset($message) && $message !== null){
			echo "<script>alert(\"{$message}\")</script>";			
		} 
	?>
    <div>
            <a href="<?php echo $this->config->item('base_link').'AlunoController/insert' ?>">
                <input type="button" class='btn btn-primary' value="Inserir Aluno">
            </a>
            <a href="<?php echo $this->config->item('base_link').'AlunoController/form_csv' ?>">
                <input type="button" class='btn btn-success' value="Importar CSV">
            </a>

        <div class="row">
        </div>
        <br/>

		<table class="table table-bordered table-striped table-min-td-size" style="max-width: 100%;" id="sortable-table">
							<tr>
								<th style="width: 100px;">Nome</th>
								<th style="width: 100px;">Email</th>
								<th colspan="2" style="width: 600px;">Responsável</th>
                                <th colspan="2" style="width: 500px;">Ações</th>
							</tr>
							<tr>
								<th></th>
								<th></th>
								<th style="width: 100px;">Nome</th>
								<th style="width: 250px;">Telefone</th>
                                <th style="width: 250px;"></th>
                                <th style="width: 250px;"></th> 
							</tr>
							<tbody id="tablebody">
								<?php foreach ($alunos as $aluno) { ?> 
									<tr>
										<td>
											<a href='<?=$this->config->item('base_link')?>AlunoController/get?cpf=<?=urlencode($aluno->getCPF())?>'>
												<?=$aluno->getNome()?> </a> 
										</td>
										<td><?php echo $aluno->getEmail();?></td>
										<td><?php echo $aluno->getNomeResponsavel();?></td>
										<td><?php echo $aluno->getTelefoneResponsavel();?></td>
                                        <td><a href="<?php echo $this->config->item('base_link').'AlunoController/edit?cpf='.$aluno->getCPF(); ?>">
                                            <input class="btn btn-success" type="button" value="Editar"></a></td>
                                        <td><a href="<?php echo $this->config->item('base_link').'AlunoController/delete?cpf='.$aluno->getCPF(); ?>">
                                            <input class="btn btn-danger" type="button" value="Deletar"></a></td>								
									</tr>
								<?php } ?>
							</tbody>
			</table>
    </div>
</div>