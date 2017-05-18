<?php 
    if(isset($message) && $message !== null){
        echo "<script>alert(\"{$message}\")</script>";			
    } 
?>

<div class = "row">
    <div class="col-lg-12">
      <form method="post" action="update" enctype="multipart/form-data">

        <div class="row">
                <div class="form-group">
                    <label for="nome" class="col-lg-1 control-label"> Nome*: </label>
                    <div class="col-lg-4">
                        <input type="hidden" name="old_nome" value="<?php echo $atividade->getNome()?>">
                        <input type="text" class="form-control" placeholder="Digite o nome"
                               name="nome" onkeypress="return validateLetterInput(event);" required
                               oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                               oninput="setCustomValidity('')"
                               value="<?php echo $atividade->getNome()?>">
                    </div>
                </div>
            </div>
            <br />
                <div class="row">
                    <div class="form-group">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4" style="padding-right:95px">
                            <input class="btn btn-primary" style="float:right" type="submit" value="Salvar">
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
                                <th>Remover</th>
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
                                        <td><a href="<?php 
                                        echo $this->config->item('base_link').'AtividadeController/removePerson?tipo='.$pessoa->tipo.'&cpf='.$pessoa->cpf.'&atividade='.$atividade->getNome(); 
                                        ?>">
                                            <input class="btn btn-danger" type="button" value="Deletar"></a></td>								
									</tr>
								<?php } ?>
							</tbody>
			</table>


    </div>
</div>