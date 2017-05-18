<div class = "row">
    <?php // require_once APPPATH . 'views/include/left_menu.php' ?>
    <div class="col-lg-12">
 <!--     <form method="post" action="save" enctype="multipart/form-data"> -->

        <div class="row">
                <div class="form-group">
                    <label for="nome" class="col-lg-1 control-label"> Nome*: </label>
                    <div class="col-lg-4">
                        <input type="hidden" name="old_nome" value="<?php echo $instituicao->getNome()?>">
                        <input disabled type="text" class="form-control" placeholder="Digite o nome"
                               name="nome" onkeypress="return validateLetterInput(event);" required
                               oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                               oninput="setCustomValidity('')"
                               value="<?php echo $instituicao->getNome() ?>"/>
                    </div>
                    
                    <label for="telefone" class="col-lg-1 control-label"> Telefone*: </label>
                    <div class="col-lg-3">
                          <input disabled type="text" class="form-control phone phone1" placeholder="(ddd) Telefone de contato"
                                name="telefone" id="telefone" maxlength="25" required onkeypress="return validateNumberInput(event);"
                                oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                oninput="setCustomValidity('')"
                                value="<?php echo $instituicao->getTelefone() ?>"/>
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
                                value="<?php echo $instituicao->getCelular() ?>"/>
                    </div>
                    
                    <label for="email" class="col-lg-1 control-label"> E-mail*: </label>
                    <div class="col-lg-3">
                        <input disabled type="email" id="email" class="form-control" placeholder="Email"
                               name="email" required title ="Favor incluir '@' e '.' ."
                               oninvalid="this.setCustomValidity('Este campo requer um endereço de email.')"
                               oninput="setCustomValidity('')"
                               value="<?php echo $instituicao->getEmail() ?>"/>

                        <script type="text/javascript">
                            window.onload = funcExistingEmail();
                        </script>
                    </div>

                    <label for="vinculo" class="col-lg-1 control-label"> Vínculo: </label>
                    <div class="col-lg-3">
                        <input disabled type="text" class="form-control" placeholder="Digite o vínculo"
                               name="vinculo" onkeypress="return validateLetterInput(event);" required
                               oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                               oninput="setCustomValidity('')"
                               value="<?php echo $instituicao->getVinculo() ?>"/>
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
                                value="<?php echo $instituicao->getNomeResponsavel() ?>"/>
                        </div>
                        
                        <label for="telefone_responsavel" class="col-lg-1 control-label"> Telefone*: </label>
                        <div class="col-lg-3">
                            <input disabled type="text" class="form-control phone phone1" placeholder="(ddd) Telefone do responsável"
                                    name="telefone_responsavel" id="telefone_responsavel" maxlength="25" required onkeypress="return validateNumberInput(event);"
                                    oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                    oninput="setCustomValidity('')"
                                    value="<?php echo $instituicao->getTelefoneResponsavel() ?>"/>
                        </div>

                        <label for="email_responsavel" class="col-lg-1 control-label"> E-mail*: </label>
                        <div class="col-lg-3">
                            <input disabled type="email_responsavel" id="email_responsavel" class="form-control" placeholder="Email do responsável"
                                name="email_responsavel" required title ="Favor incluir '@' e '.' ."
                                oninvalid="this.setCustomValidity('Este campo requer um endereço de email.')"
                                oninput="setCustomValidity('')"
                                value="<?php echo $instituicao->getEmailResponsavel() ?>"/>

                            <script type="text/javascript">
                                window.onload = funcExistingEmail();
                            </script>
                        </div>
                    </div>
                </div>
                <br />
           <!--     <div class="row">
                    <div class="form-group">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4" style="padding-right:95px">
                            <input class="btn btn-primary" style="float:right" type="submit" value="Salvar">
                        </div>
                    </div>
                </div> -->
  <!--    </form> -->
    </div>
</div>


