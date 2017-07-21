<script></script> <br> <br>
<div>
	<?php 
		if(isset($message) && $message !== null)
			echo "<script>alert(\"{$message}\")</script>";			
	?>

<script>
function goBack() {
    window.history.back()
}
</script>

<div>
    <a href="<?php echo $this->config->item('base_link').'AlunoController/insert'?>">
    <input type="button" class='btn btn-info' value="Cadastrar Aluno"></a>

    <a href="<?php echo $this->config->item('base_link').'AlunoController/form_csv'?>">
    <input type="button" class='btn btn-success' value="Importar CSV"></a>

    <input type="button" onclick="goBack()" class='btn btn-warning' value="Voltar"></a>

    <div class="row"></div> <br>

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
                                <input class="btn btn-primary" type="button" value="Editar"></a></td>
                                <td><a href="<?php echo $this->config->item('base_link').'AlunoController/delete?cpf='.$aluno->getCPF(); ?>">
                                <input class="btn btn-danger" type="button" value="Excluir"></a></td>								
								</tr>
						<?php } ?>
				</tbody>
		</table>
    </div>
</div>