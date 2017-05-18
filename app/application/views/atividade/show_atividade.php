<div class = "row">
    <?php // require_once APPPATH . 'views/include/left_menu.php' ?>
    <div class="col-lg-12">
      <form method="post" action="save" enctype="multipart/form-data">

        <div class="row">
                <div class="form-group">
                    <label for="nome" class="col-lg-1 control-label"> Nome: </label>
                    <div class="col-lg-4">
                        <input disabled type="hidden" name="old_nome" value="<?php echo $atividade->getNome()?>">
                        <input disabled type="text" class="form-control" placeholder="Digite o nome"
                               name="nome" onkeypress="return validateLetterInput(event);" required
                               oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                               oninput="setCustomValidity('')"
                               value="<?php echo $atividade->getNome()?>"/>
                    </div>
                </div>
            </div>
      </form>
      <br><br>
      <br><br>
		<table class="table table-bordered table-striped table-min-td-size" style="max-width: 100%;" id="sortable-table">
							<tr>
								<th style="    text-align:center;    vertical-align:middle;" colspan="4">Participantes da atividade</th>
							</tr>
							<tr>
                                <th>Nome</th>
                                <th>Tipo</th>
							</tr>
							<tbody id="tablebody">
								<?php foreach ($pessoas as $pessoa) { ?> 
									<tr>
                                        <?php if($pessoa->tipo === "aluno") 
                                        {?>

										<td>
											<a href='<?=$this->config->item('base_link')?>AlunoController/get?cpf=<?=urlencode($pessoa->cpf)?>'>
												<?=$pessoa->nome?> </a> 
										</td>

                                        <?php
                                        }else {?>

										<td>
											<a href='<?=$this->config->item('base_link')?>AprendizController/get?cpf=<?=urlencode($pessoa->cpf)?>'>
												<?=$pessoa->nome?> </a> 
										</td>


                                        <?php
                                        }
                                        ?>
										<td><?php echo $pessoa->tipo?></td>
									</tr>
								<?php } ?>
							</tbody>
			</table>
    </div>
</div>