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
    <a href="<?php echo $this->config->item('base_link').'VoluntarioController/insert'?>">
    <input type="button" class='btn btn-info' value="Cadastrar Voluntario"></a>

    <a href="<?php echo $this->config->item('base_link').'VoluntarioController/form_csv'?>">
    <input type="button" class='btn btn-success' value="Importar CSV"></a>

    <input type="button" onclick="goBack()" class='btn btn-warning' value="Voltar"></a>

    <div class="row"></div> <br>

	<table class="table table-bordered table-striped table-min-td-size" style="max-width: 100%;" id="sortable-table">
			<tr>
				<th>Nome</th>
				<th>Email</th>
				<th>Matricula</th>
                <th colspan="2" style="width: 500px;">Ações</th>
			</tr>

	<tbody id="tablebody">
		<?php foreach ($voluntarios as $voluntario) { ?> 
			<tr>
				<td>
				<a href='<?=$this->config->item('base_link')?>VoluntarioController/get?cpf=<?=urlencode($voluntario->getCPF())?>'><?=$voluntario->getNome()?></a>
				</td>
					<td><?php echo $voluntario->getEmail();?></td>
					<td><?php echo $voluntario->getMatricula();?></td>
                    <td><a href="<?php echo $this->config->item('base_link').'VoluntarioController/edit?cpf='.$voluntario->getCPF(); ?>">
                        <input class="btn btn-primary" type="button" value="Editar"></a></td>
                    <td><a href="<?php echo $this->config->item('base_link').'VoluntarioController/delete?cpf='.$voluntario->getCPF(); ?>">
                        <input onclick="return confirm('Tem certeza que deseja deletar o voluntario de CPF <?= $voluntario->getCPF()?> ?')" class="btn btn-danger" type="button" value="Excluir"></a></td>								
					</tr>
				<?php } ?>
			</tbody>
		</table>
    </div>
</div>