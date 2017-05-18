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
				sort : [sortLowerCase, sortLowerCase, sortLowerCase, sortLowerCase, sortLowerCase],
				filters : [true, true, true, true, true],
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
								<th style="width: 250px;">Email</th>
								<th style="width: 250px;">Trabalho</th>
								<th style="width: 200px;">Responsável</th>
								<th style="width: 400px;">Profissão Responsável</th>
							</tr>
							<tbody id="tablebody">
								<?php foreach ($aprendizes as $aprendiz) { ?> 
									<tr>
										<td><a href="<?php echo $this->config->item('base_link').'AprendizController/find' ?>"><?php echo $aprendiz->getNome();?></a></td>
										<td><?php echo $aprendiz->getEmail();?></td>
										<td><?php echo $aprendiz->getTrabalho();?></td>
										<td><?php echo $aprendiz->getNomeResponsavel();?></td>
										<td><?php echo $aprendiz->getProfissaoResponsavel();?></td>
									</tr>
								<?php } ?>
							</tbody>
			</table>
			<!--	$String = "{$this->config->item('base_link')}AprendizController/edit?cpf=".$aprendiz->getCpf();
        			$String2 = "{$this->config->item('base_link')}AprendizController/delete?cpf=".$aprendiz->getCpf();
        			echo '<a href="'.$String.'">EDIT</a>';
        			echo "<br>";
        			echo '<a href="'.$String2.'">DELETE</a>'; -->
    </div>
</div>