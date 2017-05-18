<script>

	// function showCounter(currentPage, totalPage, firstRow, lastRow, totalRow, totalRowUnfiltered) {
	// 	return '';
	// }

	// function sortLowerCase(l, r) {
	// 	return l.toLowerCase().localeCompare(r.toLowerCase());
	// }

	// $(document).ready(function() {
	// 		$('#sortable-table').datatable({
	// 			pageSize : Number.MAX_VALUE,
	// 			sort : [sortLowerCase, false, false, sortLowerCase, sortLowerCase, sortLowerCase, sortLowerCase],
	// 			filters : [true, false, false, true, true, true, true],
	// 			filterText: 'Escreva para filtrar... ',
	// 			counterText	: showCounter,
	// 			sortKey : 0				
	// 		});
	// });

</script>

<div>
    <?php // require_once APPPATH . 'views/include/left_menu.php'
		if($message !== null){
			echo "<script>alert("$message")</script>";			
		} 
	?>
    <div>
            <a href="<?php echo $this->config->item('base_link').'AlunoController/insert' ?>">
                <input type="button" class='btn btn-primary' value="Inserir Aluno">
            </a>

        <div class="row">
        </div>
        <br/>

		<table class="table table-bordered table-striped table-min-td-size" style="max-width: 100%;" id="sortable-table">
							<tr>
								<th style="width: 100px;">Nome</th>
								<th style="width: 100px;">Email</th>
								<th style="width: 150px;">Cursos</th>
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
								<?php foreach ($alunos as $aluno) { ?> 
									<tr>
										<td><?php echo $aluno->getNome();?></td>
										<td><?php echo $aluno->getEmail();?></td>
										<td><?php echo $aluno->getCursos();?></td>
										<td><?php echo $aluno->getNomeResponsavel();?></td>
										<td><?php echo $aluno->getTelefoneResponsavel();?></td>
                                        <td><a href="<?php echo $this->config->item('base_link').'AlunoController/edit?nome='.$aluno->getNome(); ?>">
                                            <input class="btn btn-success" type="button" value="Editar"></a></td>
                                        <td><a href="<?php echo $this->config->item('base_link').'AlunoController/delete?nome='.$aluno->getNome(); ?>">
                                            <input class="btn btn-danger" type="button" value="Deletar"></a></td>								
									</tr>
								<?php } ?>
							</tbody>
			</table>
    </div>
</div>