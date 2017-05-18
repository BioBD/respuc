<div class = "row">
    <?php // require_once APPPATH . 'views/include/left_menu.php' ?>
    <div class="col-lg-12">
      <form method="post" action="save" enctype="multipart/form-data">

        <div class="row">
                <div class="form-group">
                    <label for="nome" class="col-lg-1 control-label"> Nome*: </label>
                    <div class="col-lg-4">
                        <input disabled type="hidden" name="old_name" value="<?php echo $evento->getNome()?>">
                        <input disabled type="text" class="form-control" placeholder="Digite o nome"
                               name="nome" onkeypress="return validateLetterInput(event);" required
                               oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                               oninput="setCustomValidity('')"
                               value="<?php echo $evento->getNome()?>"/>
                    </div>

                    <label for="dataevento" class="col-lg-1 control-label"> Data do Evento: </label>
                    <div class="col-lg-3">
                            <input disabled type="text" class="form-control" 
                                  name="dataevento" onkeypress="return validateNumberInput(event);" required
                                  oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                  oninput="setCustomValidity('')"
                                  value="<?php echo $evento->getDataEvento()?>"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="presencas" class="col-lg-1 control-label"> Presenças: </label>
                    <div class="col-lg-4">
                        <input disabled type="text" class="form-control" placeholder="Digite a presença"
                               name="presencas" onkeypress="return validateLetterInput(event);" required
                               oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                               oninput="setCustomValidity('')"
                               value="<?php echo $evento->getPresencas()?>"/>
                    </div>

                    <label for="descricao" class="col-lg-1 control-label"> Descrição: </label>
                    <div class="col-lg-4">
                        <input disabled type="text" class="form-control" placeholder="Digite o descrição"
                               name="descricao" onkeypress="return validateLetterInput(event);" required
                               oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                               oninput="setCustomValidity('')"
                               value="<?php echo $evento->getDescricao()?>"/>
                    </div>
                </div>
            </div>
      </form>
    </div>
</div>