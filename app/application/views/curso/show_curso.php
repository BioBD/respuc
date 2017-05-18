<div class = "row">
    <?php // require_once APPPATH . 'views/include/left_menu.php' ?>
    <div class="col-lg-12">
      <form method="post" action="save" enctype="multipart/form-data">

        <div class="row">
                <div class="form-group">
                    <label for="nome" class="col-lg-1 control-label"> Nome*: </label>
                    <div class="col-lg-4">
                        <input disabled type="hidden" name="old_nome" value="<?php echo $curso->getNome()?>">
                        <input disabled type="text" class="form-control" placeholder="Digite o nome"
                               name="nome" onkeypress="return validateLetterInput(event);" required
                               oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                               oninput="setCustomValidity('')"
                               value="<?php echo $curso->getNome()?>"/>
                    </div>

                    <label for="coord" class="col-lg-1 control-label"> Coordenador: </label>
                    <div class="col-lg-4">
                        <input disabled type="text" class="form-control" placeholder="Digite o coordenador"
                               name="coord" onkeypress="return validateLetterInput(event);" required
                               oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                               oninput="setCustomValidity('')"
                               value="<?php echo $curso->getCoord()?>"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="depto" class="col-lg-1 control-label"> Departamento: </label>
                    <div class="col-lg-4">
                        <input disabled type="text" class="form-control" placeholder="Digite o epartamento"
                               name="depto" onkeypress="return validateLetterInput(event);" required
                               oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                               oninput="setCustomValidity('')"
                               value="<?php echo $curso->getDepto()?>"/>
                    </div>

                    <label for="qtd_alunos" class="col-lg-1 control-label"> Quantidade de Alunos: </label>
                    <div class="col-lg-3">
                            <input disabled type="text" class="form-control" 
                                  name="qtd_alunos" onkeypress="return validateNumberInput(event);" required
                                  oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                  oninput="setCustomValidity('')"
                                  value="<?php echo $curso->getQtdAlunos()?>"/>
                    </div>
                </div>
            </div>
      </form>
    </div>
</div>