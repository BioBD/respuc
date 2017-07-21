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
								<th style="width: 250px;">Responsável</th>
								<th style="width: 200px;">Profissão Responsável</th>
								<th style="width: 400px;">Telefone Responsável</th>
							</tr>
							<tbody id="tablebody">
								<?php foreach ($alunos as $aluno) { ?> 
									<tr>
										<td>
											<a href='<?=$this->config->item('base_link')?>AlunoController/get?cpf=<?=urlencode($aluno->getCPF())?>'>
												<?=$aluno->getNome()?> </a> 
										</td>
										<td><?php echo $aluno->getEmail();?></td>
										<td><?php echo $aluno->getNomeResponsavel();?></td>
										<td><?php echo $aluno->getProfissaoResponsavel();?></td>
										<td><?php echo $aluno->getTelefoneResponsavel();?></td>
									</tr>
								<?php } ?>
							</tbody>
			</table>
			<!--	$String = "{$this->config->item('base_link')}AlunoController/edit?nome=".$aluno->getNome();
        			$String2 = "{$this->config->item('base_link')}AlunoController/delete?nome=".$aluno->getNome();
        			echo '<a href="'.$String.'">EDIT</a>';
        			echo "<br>";
        			echo '<a href="'.$String2.'">DELETE</a>'; -->
    </div>
</div>