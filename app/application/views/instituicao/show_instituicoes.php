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
				sort : [sortLowerCase, false, false, sortLowerCase, sortLowerCase, sortLowerCase, sortLowerCase],
				filters : [true, false, false, true, true, true, true],
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
								<th style="width: 250px;">Telefone</th>
								<th style="width: 250px;">Celular</th>
								<th style="width: 100px;">Email</th>
								<th style="width: 150px;">Vínculo</th>
								<th colspan="3" style="width: 600px;">Responsável</th>
							</tr>
							<tr>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th style="width: 100px;">Nome</th>
								<th style="width: 250px;">Email</th>
								<th style="width: 250px;">Telefone</th> 
							</tr>
							<tbody id="tablebody">
								<?php foreach ($instituicoes as $instituicao) { ?> 
									<tr>
										<td>
											<a href='<?=$this->config->item('base_link')?>InstituicaoController/get?nome=<?=urlencode($instituicao->getNome())?>'>
												<?=$instituicao->getNome()?> </a> 
										</td>
										<td><?php echo $instituicao->getTelefone();?></td>
										<td><?php echo $instituicao->getCelular();?></td>
										<td><?php echo $instituicao->getEmail();?></td>
										<td><?php echo $instituicao->getVinculo();?></td>
										<td><?php echo $instituicao->getNomeResponsavel();?></td>
										<td><?php echo $instituicao->getEmailResponsavel();?></td>
										<td><?php echo $instituicao->getTelefoneResponsavel();?></td>									
									</tr>
								<?php } ?>
							</tbody>
			</table>
			<!--		$String = "{$this->config->item('base_link')}InstituicaoController/edit?nome=".$instituicao->getNome();
					$String2 = "{$this->config->item('base_link')}InstituicaoController/delete?nome=".$instituicao->getNome();
					echo '<a href="'.$String.'">EDIT</a>';
					echo "<br>";
					echo '<a href="'.$String2.'">DELETE</a>'; -->
    </div>
</div>



