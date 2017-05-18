<script>

	function showCounter(currentPage, totalPage, firstRow, lastRow, totalRow, totalRowUnfiltered) {
		return '';
	}

	function sortLowerCase(l, r) {
		return l.toLowerCase().localeCompare(r.toLowerCase());
	}

	$(document).ready(function() {
			$('#sortable-table').datatable({
				pageSize : Number.MAX_VALUE,
				sort : [sortLowerCase, sortLowerCase, sortLowerCase, true],
				filters : [true, true, true, false],
				filterText: 'Escreva para filtrar... ',
				counterText	: showCounter,
				sortKey : 0				
			});
	});

</script>

<div>
    <?php // require_once APPPATH . 'views/include/left_menu.php' ?>
    <div>

		<table class="table table-bordered table-striped table-min-td-size" style="max-width: 100%;" id="sortable-table">
							<tr>
								<th style="width: 100px;">Nome</th>
								<th style="width: 250px;">Coordenador</th>
								<th style="width: 250px;">Departamento</th>
								<th style="width: 400px;">Quantidade de Alunos</th>
							</tr>
							<tbody id="tablebody">
								<?php foreach ($cursos as $curso) { ?> 
									<tr>
										<td><a href="<?php echo $this->config->item('base_link').'CursoController/find' ?>"><?php echo $curso->getNome();?></a></td>
										<td><?php echo $curso->getCoord();?></td>
										<td><?php echo $curso->getDepto();?></td>
										<td><?php echo $curso->getQtdAlunos();?></td>									
									</tr>
								<?php } ?>
							</tbody>
			</table>
			<!--	$String = "{$this->config->item('base_link')}CursoController/edit?nome=".$curso->getNome();
        			$String2 = "{$this->config->item('base_link')}CursoController/delete?nome=".$curso->getNome();
        			echo '<a href="'.$String.'">EDIT</a>';
        			echo "<br>";
        			echo '<a href="'.$String2.'">DELETE</a> -->
    </div>
</div>