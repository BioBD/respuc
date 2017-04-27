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
            <a href="<?php echo $this->config->item('base_link').'InstituicaoController/insert' ?>">
                <input type="button" class='btn btn-primary' value="Inserir Instituição">
            </a>

        <div class="row">
        </div>
        <br/>

		<table class="table table-bordered table-striped table-min-td-size" style="max-width: 100%;" id="sortable-table">
							<tr>
								<th style="width: 100px;">Nome</th>
								<th style="width: 100px;">Email</th>
								<th style="width: 150px;">Vínculo</th>
								<th colspan="3" style="width: 600px;">Responsável</th>
                                <th colspan="2" style="width: 500px;">Ações</th>
							</tr>
							<tr>
								<th></th>
								<th></th>
								<th></th>
								<th style="width: 100px;">Nome</th>
								<th style="width: 250px;">Email</th>
								<th style="width: 250px;">Telefone</th>
                                <th style="width: 250px;"></th>
                                <th style="width: 250px;"></th> 
							</tr>
							<tbody id="tablebody">
								<?php foreach ($instituicoes as $instituicao) { ?> 
									<tr>
										<td><?php echo $instituicao->getNome();?></td>
										<td><?php echo $instituicao->getEmail();?></td>
										<td><?php echo $instituicao->getVinculo();?></td>
										<td><?php echo $instituicao->getNomeResponsavel();?></td>
										<td><?php echo $instituicao->getEmailResponsavel();?></td>
										<td><?php echo $instituicao->getTelefoneResponsavel();?></td>
                                        <td><a href="<?php echo $this->config->item('base_link').'InstituicaoController/edit?nome='.$instituicao->getNome(); ?>">
                                            <input class="btn btn-success" type="button" value="Editar"></a></td>
                                        <td><a href="<?php echo $this->config->item('base_link').'InstituicaoController/delete?nome='.$instituicao->getNome(); ?>">
                                            <input class="btn btn-danger" type="button" value="Deletar"></a></td>								
									</tr>
								<?php } ?>
							</tbody>
			</table>
    </div>
</div>