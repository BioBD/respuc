<div class = "row">
    <?php // require_once APPPATH . 'views/include/left_menu.php' ?>
    <div class="col-lg-12">
      <form method="post" action="save" enctype="multipart/form-data">

        <div class="row">
                <div class="form-group">
                    <label for="nome" class="col-lg-1 control-label"> Nome*: </label>
                    <div class="col-lg-4">
                        <input disabled type="hidden" name="old_nome" value="<?php echo $funcionario->getNome()?>"><br><br>
                        <input disabled type="text" class="form-control" placeholder="Digite o nome"
                               name="nome" onkeypress="return validateLetterInput(event);" required
                               oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                               oninput="setCustomValidity('')"
                               value="<?php echo $funcionario->getNome()?>"/>
                    </div>

                    <label for="cpf" class="col-lg-1 control-label"> CPF: </label>
                    <div class="col-lg-4">
                        <input disabled type="text" class="form-control" placeholder="Digite o cpf"
                               name="cpf" onkeypress="return validateNumberInput(event);" required
                               oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                               oninput="setCustomValidity('')"
                               value="<?php echo $funcionario->getCpf()?>"/>
                    </div>

                    <label for="rg" class="col-lg-1 control-label"> RG: </label>
                    <div class="col-lg-4">
                        <input disabled type="text" class="form-control" placeholder="Digite o rg"
                               name="rg" onkeypress="return validateNumberInput(event);" required
                               oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                               oninput="setCustomValidity('')"
                               value="<?php echo $funcionario->getRg()?>"/>
                    </div>
            </div>
      </div>
      <div class="row">
            <div class="form-group">   

                    <label for="data_nascimento" class="col-lg-1 control-label"> Data de Nascimento: </label>
                    <div class="col-lg-4">
                        <input disabled type="text" class="form-control" placeholder="Digite a data de nascimento"
                               name="data_nascimento" onkeypress="return validateNumberInput(event);" required
                               oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                               oninput="setCustomValidity('')"
                               value="<?php echo $funcionario->getDataNascimento()?>"/>
                    </div>

                    <label for="naturalidade" class="col-lg-1 control-label"> Naturalidade: </label>
                    <div class="col-lg-4">
                        <input disabled type="text" class="form-control" placeholder="Digite a naturalidade"
                               name="naturalidade" onkeypress="return validateLetterInput(event);" required
                               oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                               oninput="setCustomValidity('')"
                               value="<?php echo $funcionario->getNaturalidade()?>"/>
                    </div>

                    <label for="telefone" class="col-lg-1 control-label"> Telefone*: </label>
                    <div class="col-lg-3">
                          <input disabled type="text" class="form-control phone phone1" placeholder="(ddd) Telefone de contato"
                                name="telefone" id="telefone" maxlength="25" required onkeypress="return validateNumberInput(event);"
                                oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                oninput="setCustomValidity('')"
                                value="<?php echo $funcionario->getTelefone()?>"/>
                    </div>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="form-group">
                    <label for="celular" class="col-lg-1 control-label"> Celular*: </label>
                    <div class="col-lg-3">
                          <input disabled type="text" class="form-control phone phone1" placeholder="(ddd) Celular de contato"
                                name="celular" id="celular" maxlength="25" required onkeypress="return validateNumberInput(event);"
                                oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                oninput="setCustomValidity('')"
                                value="<?php echo $funcionario->getCelular()?>"/>
                    </div>
                    
                    <label for="email" class="col-lg-1 control-label"> E-mail*: </label>
                    <div class="col-lg-3">
                        <input disabled type="email" id="email" class="form-control" placeholder="Email"
                               name="email" required title ="Favor incluir '@' e '.' ."
                               oninvalid="this.setCustomValidity('Este campo requer um endereço de email.')"
                               oninput="setCustomValidity('')"
                               value="<?php echo $funcionario->getEmail()?>"/>
                        <script type="text/javascript">
                            window.onload = funcExistingEmail();
                        </script>
                    </div>
                    
                    <label for="funcao" class="col-lg-1 control-label"> Função: </label>
                      <div class="col-lg-3">
                          <input disabled type="text" class="form-control" 
                                name="funcao" onkeypress="return validateLetterInput(event);" required
                                oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                oninput="setCustomValidity('')"
                                value="<?php echo $funcionario->getFuncao()?>"/>
                      </div>
                  </div>
                </div>
      </form>
    </div>
</div>
