<div class = "row">
    <?php // require_once APPPATH . 'views/include/left_menu.php' ?>
    <div class="col-lg-12">
      <form method="post" action="save" enctype="multipart/form-data">

        <div class="row">
                <div class="form-group">
                    <label for="nome" class="col-lg-1 control-label"> Nome*: </label>
                    <div class="col-lg-4">
						<input disabled type="text" name="nome" value="<?php echo $escola->getNome()?>">
                        <input disabled type="text" class="form-control" placeholder="Digite o nome"
                               name="nome" onkeypress="return validateLetterInput(event);" required
                               oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                               oninput="setCustomValidity('')"
                               value="<?php echo $escola->getNome()?>"/>
                    </div>

                    <label for="telefone" class="col-lg-1 control-label"> Telefone: </label>
                    <div class="col-lg-3">
                            <input disabled type="text" class="form-control" 
                                  name="telefone" onkeypress="return validateNumberInput(event);" required
                                  oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                  oninput="setCustomValidity('')"
                                  value="<?php echo $escola->getTelefone()?>"/>
                    </div>
                </div>
            </div>
      </form>
    </div>
</div>