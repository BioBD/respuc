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
            <a href="<?php echo $this->config->item('base_link').'InstituicaoController/insert' ?>">
                <input type="button" class='btn btn-primary' value="Inserir Instituição">
            </a>

        <div class="row">
        </div>
        <br/>

		<table class="table table-bordered table-striped table-min-td-size" style="max-width: 100%;" id="sortable-table">
							<tr>
								<th style="width: 100px;">Nome</th>
								<th style="width: 100px;">Coordenação</th>
								<th style="width: 150px;">Departamento</th>
								<th style="width: 150px;">Quantidade de Alunos</th>
                                <th colspan="2" style="width: 500px;">Ações</th>
							</tr>
							<tbody id="tablebody">
								<?php foreach ($cursos as $curso) { ?> 
									<tr>
										<td><?php echo $curso->getNome();?></td>
										<td><?php echo $curso->getCoord();?></td>
										<td><?php echo $curso->getDepto();?></td>
										<td><?php echo $curso->getQtdAlunos();?></td>
                                        <td><a href="<?php echo $this->config->item('base_link').'CursoController/edit?nome='.$curso->getNome(); ?>">
                                            <input class="btn btn-success" type="button" value="Editar"></a></td>
                                        <td><a href="<?php echo $this->config->item('base_link').'CursoController/delete?nome='.$curso->getNome(); ?>">
                                            <input class="btn btn-danger" type="button" value="Deletar"></a></td>								
									</tr>
								<?php } ?>
							</tbody>
			</table>
    </div>
</div>