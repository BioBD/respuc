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
				sort : [sortLowerCase, false, true, false],
				filters : [true, false, false, false],
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
								<th style="width: 250px;">Data</th>
								<th style="width: 250px;">Presenças</th>
								<th style="width: 400px;">Descrição</th>
							</tr>
							<tbody id="tablebody">
								<?php foreach ($eventos as $evento) { ?> 
									<tr>
										<td><a href="<?php echo $this->config->item('base_link').'EventoController/find' ?>"><?php echo $evento->getNome();?></a></td>
										<td><?php echo $evento->getDataEvento();?></td>
										<td><?php echo $evento->getPresencas();?></td>
										<td><?php echo $evento->getDescricao();?></td>									
									</tr>
								<?php } ?>
							</tbody>
			</table>
			<!--	$String = "{$this->config->item('base_link')}EventoController/edit?nome=".$evento->getNome();
        			$String2 = "{$this->config->item('base_link')}EventoController/delete?nome=".$evento->getNome();
        			
        			echo '<a href="'.$String.'">EDIT</a>';
        			echo "<br>";
        			echo '<a href="'.$String2.'">DELETE</a>'; -->
    </div>
</div>