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
    <a href="<?php echo $this->config->item('base_link').'AtividadeController/insert'?>">
    <input type="button" class='btn btn-info' value="Cadastrar Atividade"></a>

    <a href="<?php echo $this->config->item('base_link').'AtividadeController/form_csv'?>">
    <input type="button" class='btn btn-success' value="Importar CSV"></a>

    <input type="button" onclick="goBack()" class='btn btn-warning' value="Voltar"></a>

    <div class="row"></div> <br>

	<table class="table table-bordered table-striped table-min-td-size" style="max-width: 100%;" id="sortable-table">
	<tr>
		<th style="width: 100px;">Nome</th>
        <th colspan="2" style="width: 500px;">Adicionar Pessoa</th>
        <th colspan="2" style="width: 200px;">Ações</th>
	</tr>
							
	<tbody id="tablebody">
		<?php foreach ($atividades as $atividade) { ?> 
			<tr>
				<td>
					<a href='<?=$this->config->item('base_link')?>AtividadeController/get?nome=<?=urlencode($atividade->getNome())?>'>
					<?=$atividade->getNome()?> </a> 
					</td>

                    <td colspan="2">
						<form action="addPerson" enctype="multipart/form-data">
							<input type="hidden" name="atividade" value="<?=$atividade->getNome()?>">
								<select  class="form-control endereco" id="person" name="person" required
										oninvalid="this.setCustomValidity('Favor escolher um item da lista.')"
										oninput="setCustomValidity('')">
								<option value=""> -- Selecione uma pessoa a adicionar -- </option>
								<?php foreach($candidatos[$atividade->getNome()] as $candidato){?>
								<option value="<?=$candidato->cpf?>####<?=$candidato->tipo?>"> 
								<?=$candidato->nome?> - <?=$candidato->tipo?> - CPF: <?=$candidato->cpf?> </option><?php
		}?>
	    <input class="btn btn-success" type="submit" value="Adicionar a atividade"></a></td></form></td>
        <td><a href="<?php echo $this->config->item('base_link').'AtividadeController/edit?nome='.$atividade->getNome(); ?>">
            <input class="btn btn-success" type="button" value="Editar"></a></td>
        <td><a href="<?php echo $this->config->item('base_link').'AtividadeController/delete?nome='.$atividade->getNome(); ?>">
            <input onclick="return confirm('Tem certeza que deseja deletar a atividade <?= $atividade->getNome()?> ?')" class="btn btn-danger" type="button" value="Deletar"></a></td>
            </tr>
		<?php } ?>
	</tbody>
</table>
</div>
</div>