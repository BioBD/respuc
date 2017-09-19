<script>

</script>

<div>
    <?php // require_once APPPATH . 'views/include/left_menu.php'
		if(isset($message) && $message !== null)
            echo "<script>alert(\"{$message}\")</script>";			
?>
    <div>
            <a href="<?php echo $this->config->item('base_link').'EscolaController/insert' ?>">
                <input type="button" class='btn btn-primary' value="Inserir Escola">
            </a>

        <div class="row">
        </div>
        <br/>

		<table class="table table-bordered table-striped table-min-td-size" style="max-width: 100%;" id="sortable-table">
							<tr>
								<th style="width: 100px;">Nome</th>
                                <th style="width: 100px;">Telefone</th>
                                <th colspan="2" style="width: 500px;">Ações</th>
							</tr>
							<tbody id="tablebody">
								<?php foreach ($escolas as $escola) { ?> 
									<tr>
										<td><?php echo $escola->getNome();?></td>
                                        <td><?php echo $escola->getTelefone();?></td>
                                        <td><a href="<?php echo $this->config->item('base_link').'EscolaController/edit?nome='.$escola->getNome(); ?>">
                                            <input class="btn btn-success" type="button" value="Editar"></a></td>
                                        <td><a href="<?php echo $this->config->item('base_link').'EscolaController/delete?nome='.$escola->getNome(); ?>">
                                            <input class="btn btn-danger" type="button" value="Deletar"></a></td>								
									</tr>
								<?php } ?>
							</tbody>
			</table>
    </div>
</div>