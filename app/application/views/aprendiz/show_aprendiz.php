<div class = "row">
    <?php // require_once APPPATH . 'views/include/left_menu.php' ?>
    <div class="col-lg-12">
      <form method="post" action="save" enctype="multipart/form-data">

        <div class="row">
                <div class="form-group">
                    <label for="nome" class="col-lg-1 control-label"> Nome*: </label>
                    <div class="col-lg-4">
                        <input disabled type="hidden" name="old_nome" value="<?php echo $aprendiz->getNome()?>"><br><br>
                        <input disabled type="text" class="form-control" placeholder="Digite o nome"
                               name="nome" onkeypress="return validateLetterInput(event);" required
                               oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                               oninput="setCustomValidity('')"
                               value="<?php echo $aprendiz->getNome()?>"/>
                    </div>

                    <label for="cpf" class="col-lg-1 control-label"> CPF: </label>
                    <div class="col-lg-4">
                        <input disabled type="text" class="form-control" placeholder="Digite o cpf"
                               name="cpf" onkeypress="return validateNumberInput(event);" required
                               oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                               oninput="setCustomValidity('')"
                               value="<?php echo $aprendiz->getCpf()?>"/>
                    </div>

                    <label for="rg" class="col-lg-1 control-label"> RG: </label>
                    <div class="col-lg-4">
                        <input disabled type="text" class="form-control" placeholder="Digite o rg"
                               name="rg" onkeypress="return validateNumberInput(event);" required
                               oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                               oninput="setCustomValidity('')"
                               value="<?php echo $aprendiz->getRg()?>"/>
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
                               value="<?php echo $aprendiz->getDataNascimento()?>"/>
                    </div>

                    <label for="naturalidade" class="col-lg-1 control-label"> Naturalidade: </label>
                    <div class="col-lg-4">
                        <input disabled type="text" class="form-control" placeholder="Digite a naturalidade"
                               name="naturalidade" onkeypress="return validateLetterInput(event);" required
                               oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                               oninput="setCustomValidity('')"
                               value="<?php echo $aprendiz->getNaturalidade()?>"/>
                    </div>

                    <label for="telefone" class="col-lg-1 control-label"> Telefone*: </label>
                    <div class="col-lg-3">
                          <input disabled type="text" class="form-control phone phone1" placeholder="(ddd) Telefone de contato"
                                name="telefone" id="telefone" maxlength="25" required onkeypress="return validateNumberInput(event);"
                                oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                oninput="setCustomValidity('')"
                                value="<?php echo $aprendiz->getTelefone()?>"/>
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
                                value="<?php echo $aprendiz->getCelular()?>"/>
                    </div>
                    
                    <label for="email" class="col-lg-1 control-label"> E-mail*: </label>
                    <div class="col-lg-3">
                        <input disabled type="email" id="email" class="form-control" placeholder="Email"
                               name="email" required title ="Favor incluir '@' e '.' ."
                               oninvalid="this.setCustomValidity('Este campo requer um endereço de email.')"
                               oninput="setCustomValidity('')"
                               value="<?php echo $aprendiz->getEmail()?>"/>
                        <script type="text/javascript">
                            window.onload = funcExistingEmail();
                        </script>
                    </div>                  
                  </div>
                </div>
                <div class="row">
                  <div class="form-group"> 
                      <label for="rua" class="col-lg-1 control-label"> Rua: </label>
                      <div class="col-lg-4">
                          <input disabled type="text" class="form-control" placeholder="Digite a rua"
                                name="rua" onkeypress="return validateLetterInput(event);" required
                                oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                oninput="setCustomValidity('')"
                                value="<?php echo $aprendiz->getRua()?>"/>
                      </div>

                      <label for="numero" class="col-lg-1 control-label"> Número: </label>
                      <div class="col-lg-1">
                          <input disabled type="text" class="form-control" 
                                name="numero" onkeypress="return validateNumberInput(event);" required
                                oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                oninput="setCustomValidity('')"
                                value="<?php echo $aprendiz->getNumero()?>"/>
                      </div>

                      <label for="complemento" class="col-lg-1 control-label"> Complemento: </label>
                      <div class="col-lg-3">
                          <input disabled type="text" class="form-control" 
                                name="complemento" onkeypress="return validateNumberInput(event);" required
                                oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                oninput="setCustomValidity('')"
                                value="<?php echo $aprendiz->getComplemento()?>"/>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="form-group">
                    <label for="bairro" class="col-lg-1 control-label"> Bairro: </label>
                      <div class="col-lg-3">
                          <input disabled type="text" class="form-control" placeholder="Digite o bairro"
                                name="bairro" onkeypress="return validateLetterInput(event);" required
                                oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                oninput="setCustomValidity('')"
                                value="<?php echo $aprendiz->getBairro()?>"/>
                      </div>

                      <label for="cidade" class="col-lg-1 control-label"> Cidade: </label>
                      <div class="col-lg-3">
                          <input disabled type="text" class="form-control" placeholder="Digite a cidade"
                                name="cidade" onkeypress="return validateLetterInput(event);" required
                                oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                oninput="setCustomValidity('')"
                                value="<?php echo $aprendiz->getCidade()?>"/>
                      </div>

                      <label for="uf" class="col-lg-1 control-label"> UF: </label>
                      <div class="col-lg-2">
                          <input disabled type="text" class="form-control" 
                                name="uf" onkeypress="return validateLetterInput(event);" required
                                oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                oninput="setCustomValidity('')"
                                value="<?php echo $aprendiz->getUf()?>"/>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="form-group">
                      <label for="cep" class="col-lg-1 control-label"> CEP: </label>
                      <div class="col-lg-3">
                          <input disabled type="text" class="form-control" 
                                name="cep" onkeypress="return validateNumberInput(event);" required
                                oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                oninput="setCustomValidity('')"
                                value="<?php echo $aprendiz->getCep()?>"/>
                      </div>

                      <label for="trabalho" class="col-lg-1 control-label"> Trabalho: </label>
                      <div class="col-lg-3">
                          <input disabled type="text" class="form-control" 
                                name="trabalho" onkeypress="return validateLetterInput(event);" required
                                oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                oninput="setCustomValidity('')"
                                value="<?php echo $aprendiz->getTrabalho()?>"/>
                      </div>
                  </div>
                </div>
                <br/>
                <b>Responsável:</b>
                <div class="row"><br/></div>
                <div class="row">
                    <div class="form-group">
                        <label for="nome_responsavel" class="col-lg-1 control-label"> Nome: </label>
                        <div class="col-lg-3">
                            <input disabled type="text" class="form-control" placeholder="Digite o nome do responsável"
                                name="nome_responsavel" onkeypress="return validateLetterInput(event);" required
                                oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                oninput="setCustomValidity('')"
                                value="<?php echo $aprendiz->getNomeResponsavel()?>"/>
                        </div>
                        
                        <label for="telefone_responsavel" class="col-lg-1 control-label"> Telefone*: </label>
                        <div class="col-lg-3">
                            <input disabled type="text" class="form-control phone phone1" placeholder="(ddd) Telefone do responsável"
                                    name="telefone_responsavel" id="telefone_responsavel" maxlength="25" required onkeypress="return validateNumberInput(event);"
                                    oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                    oninput="setCustomValidity('')"
                                    value="<?php echo $aprendiz->getTelefoneResponsavel()?>"/>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group">
                        <label for="profissao_responsavel" class="col-lg-1 control-label"> Profissão: </label>
                        <div class="col-lg-3">
                            <input disabled type="text" class="form-control" placeholder="Digite a profissão do responsável"
                                name="profissao_responsavel" onkeypress="return validateLetterInput(event);" required
                                oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                oninput="setCustomValidity('')"
                                value="<?php echo $aprendiz->getProfissaoResponsavel()?>"/>
                        </div>

                        <label for="cpf_responsavel" class="col-lg-1 control-label"> CPF: </label>
                        <div class="col-lg-3">
                            <input disabled type="text" class="form-control" 
                                  name="cpf_responsavel" onkeypress="return validateNumberInput(event);" required
                                  oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                  oninput="setCustomValidity('')"
                                  value="<?php echo $aprendiz->getCpfResponsavel()?>"/>
                        </div>
                    </div>
                </div>
      </form>
    </div>
</div>