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
    <a href="<?php echo $this->config->item('base_link').'InstituicaoController/insert'?>">
    <input type="button" class='btn btn-info' value="Cadastrar Instituição"></a>

    <a href="<?php echo $this->config->item('base_link').'InstituicaoController/form_csv'?>">
    <input type="button" class='btn btn-success' value="Importar CSV"></a>

    <input type="button" onclick="goBack()" class='btn btn-warning' value="Voltar"></a>

    <div class="row"></div> <br>

	<table class="table table-bordered table-striped table-min-td-size" style="max-width: 100%;" id="sortable-table">
	<tr>
		<th style="width: 100px;">Nome</th>
		<th style="width: 100px;">Email</th>
		<th style="width: 150px;">Vínculo</th>
		<th colspan="3" style="width: 600px;">Responsável</th>
        <th colspan="2" style="width: 500px;">Ações</th>
	</tr>

	<tr>
		<th></th>
		<th></th>
		<th></th>
		<th style="width: 100px;">Nome</th>
		<th style="width: 250px;">Email</th>
		<th style="width: 250px;">Telefone</th>
        <th style="width: 250px;"></th>
        <th style="width: 250px;"></th> 
	</tr>

	<tbody id="tablebody">
		<?php foreach ($instituicoes as $instituicao) { ?> 
			<tr>
				<td>
					<a href='<?=$this->config->item('base_link')?>InstituicaoController/get?nome=<?=urlencode($instituicao->getNome())?>'>
					<?=$instituicao->getNome()?> </a> 
				</td>
					<td><?php echo $instituicao->getEmail();?></td>
						<td><?php echo $instituicao->getVinculo();?></td>
							<td><?php echo $instituicao->getNomeResponsavel();?></td>
								<td><?php echo $instituicao->getEmailResponsavel();?></td>
									<td><?php echo $instituicao->getTelefoneResponsavel();?></td>
    <td><a href="<?php echo $this->config->item('base_link').'InstituicaoController/edit?nome='.$instituicao->getNome(); ?>">
        <input class="btn btn-success" type="button" value="Editar"></a></td>
    <td><a onclick="return confirm('Tem certeza que deseja deletar a instituiçao <?= $instituicao->getNome()?> ?')" href="<?php echo $this->config->item('base_link').'InstituicaoController/delete?nome='.$instituicao->getNome(); ?>">
        <input class="btn btn-danger" type="button" value="Excluir"></a></td>								
		</tr><?php } ?>
	</tbody>
</table>
</div>
</div>