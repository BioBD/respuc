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
				sort : [sortLowerCase],
				filters : [true],
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
							</tr>
							<tbody id="tablebody">
								<?php foreach ($atividades as $atividade) { ?> 
									<tr>
										<td><a href="<?php echo $this->config->item('base_link')."AtividadeController/get?nome={$atividade->getNome()}" ?>"><?php echo $atividade->getNome();?></a></td>									
									</tr>
								<?php } ?>
							</tbody>
			</table>
			<!--	$String = "{$this->config->item('base_link')}AtividadeController/edit?nome=".$atividade->getNome();
        			$String2 = "{$this->config->item('base_link')}AtividadeController/delete?nome=".$atividade->getNome();
        			echo '<a href="'.$String.'">EDIT</a>';
        			echo "<br>";
        			echo '<a href="'.$String2.'">DELETE</a>'; -->
    </div>
</div>