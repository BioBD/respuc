<script>
    /* permite apenas numeros, tab e backspace*/
    function validateNumberInput(evt) {

        var key_code = (evt.which) ? evt.which : evt.keyCode;
        if ((key_code >= 48 && key_code <= 57) || key_code == 9 || key_code == 8) {
            return true;
        }
        return false;
    }
    /* permite letras, letras com acentos, hifen e espaco */
    function validateLetterInput(evt) {

        var key_code = (evt.which) ? evt.which : evt.keyCode;

        if ((key_code >= 65 && key_code <= 90) || (key_code >= 97 && key_code <= 122) || key_code == 9 || key_code == 39
                || key_code == 8 || key_code == 45 || key_code == 32 || (key_code >= 180 && key_code <= 252)) {

            return true;
        }
        return false;
    }
    /* permite letras e numeros */
    function validateLetterAndNumberInput(evt) {

        var key_code = (evt.which) ? evt.which : evt.keyCode;

        if (((key_code >= 65 && key_code <= 90) || (key_code >= 97 && key_code <= 122))
                || ((key_code >= 48 && key_code <= 57) || key_code == 9 || key_code == 8)) {

            return true;
        }
        return false;
    }

    function funcEmail() {
        var email = document.getElementById("email");
        var confirm_email = document.getElementById("confirm_email");
        confirm_email.onchange = function () {
            if (email.value === confirm_email.value) {
                confirm_email.style.backgroundColor = "#FFFFFF";
            } else {
                confirm_email.style.backgroundColor = "#F78D8D";
                alert("E-mail e confirmação de e-mail não estão iguais. Favor verificar.");
            }
        };
    }

    function funcExistingEmail() {

        var email = document.getElementById("email");
        email.onchange = function () {
            $.get(
                    "<?= $this->config->item('url_link') ?>login/checkExistingEmail?email=" + $("#email").val(),
                    function (data) {
                        if (data == "true") {
                            alert("Este email já está cadastrado.");
                            event.preventDefault();
                            return true;
                        }
                    });
        };
        return false;
    }


    $(document).ready(function ($) {
        var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
                spOptions = {
                    onKeyPress: function (val, e, field, options) {
                        field.mask(SPMaskBehavior.apply({}, arguments), options);
                    },
                    onChange: function (val, e, field, options) {
                        field.mask(SPMaskBehavior.apply({}, arguments), options);
                    }
                };
        $(".phone").mask(SPMaskBehavior, spOptions);
        $("#cep").mask("00000-000");
        $("#cpf").mask("000.000.000-00");
    });

</script>

<div class = "row">
    <?php // require_once APPPATH . 'views/include/left_menu.php' ?>
    <div class="col-lg-12">
      <form method="post" action="save" enctype="multipart/form-data">

        <div class="row">
                <div class="form-group">
                    <label for="nome" class="col-lg-1 control-label"> Nome*: </label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="Digite o nome"
                               name="nome" onkeypress="return validateLetterInput(event);" required
                               oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                               oninput="setCustomValidity('')"
                               value="<?php
                               if (!empty($_POST['nome'])) {
                                   echo $_POST['nome'];
                               }
                               ?>"/>
                    </div>

                    <label for="cpf" class="col-lg-1 control-label"> CPF: </label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="Digite o cpf"
                               name="cpf" onkeypress="return validateNumberInput(event);" required
                               oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                               oninput="setCustomValidity('')"
                               value="<?php
                               if (!empty($_POST['cpf'])) {
                                   echo $_POST['cpf'];
                               }
                               ?>"/>
                    </div>

                    <label for="rg" class="col-lg-1 control-label"> RG: </label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="Digite o rg"
                               name="rg" onkeypress="return validateNumberInput(event);" required
                               oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                               oninput="setCustomValidity('')"
                               value="<?php
                               if (!empty($_POST['rg'])) {
                                   echo $_POST['rg'];
                               }
                               ?>"/>
                    </div>
            </div>
      </div>
      <div class="row">
            <div class="form-group">   

                    <label for="data_nascimento" class="col-lg-1 control-label"> Data de Nascimento: </label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="Digite a data de nascimento"
                               name="data_nascimento" onkeypress="return validateNumberInput(event);" required
                               oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                               oninput="setCustomValidity('')"
                               value="<?php
                               if (!empty($_POST['data_nascimento'])) {
                                   echo $_POST['data_nascimento'];
                               }
                               ?>"/>
                    </div>

                    <label for="naturalidade" class="col-lg-1 control-label"> Naturalidade: </label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" placeholder="Digite a naturalidade"
                               name="naturalidade" onkeypress="return validateLetterInput(event);" required
                               oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                               oninput="setCustomValidity('')"
                               value="<?php
                               if (!empty($_POST['naturalidade'])) {
                                   echo $_POST['naturalidade'];
                               }
                               ?>"/>
                    </div>

                    <label for="telefone" class="col-lg-1 control-label"> Telefone*: </label>
                    <div class="col-lg-3">
                          <input type="text" class="form-control phone phone1" placeholder="(ddd) Telefone de contato"
                                name="telefone" id="telefone" maxlength="25" required onkeypress="return validateNumberInput(event);"
                                oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                oninput="setCustomValidity('')"
                                value="<?php
                                if (!empty($_POST['telefone'])) {
                                    echo $_POST['telefone'];
                                }
                                ?>"/>
                    </div>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="form-group">
                    <label for="celular" class="col-lg-1 control-label"> Celular*: </label>
                    <div class="col-lg-3">
                          <input type="text" class="form-control phone phone1" placeholder="(ddd) Celular de contato"
                                name="celular" id="celular" maxlength="25" required onkeypress="return validateNumberInput(event);"
                                oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                oninput="setCustomValidity('')"
                                value="<?php
                                if (!empty($_POST['celular'])) {
                                    echo $_POST['celular'];
                                }
                                ?>"/>
                    </div>
                    
                    <label for="email" class="col-lg-1 control-label"> E-mail*: </label>
                    <div class="col-lg-3">
                        <input type="email" id="email" class="form-control" placeholder="Email"
                               name="email" required title ="Favor incluir '@' e '.' ."
                               oninvalid="this.setCustomValidity('Este campo requer um endereço de email.')"
                               oninput="setCustomValidity('')"
                               value="<?php
                               if (!empty($_POST['email'])) {
                                   echo $_POST['email'];
                               }
                               ?>"/>
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
                          <input type="text" class="form-control" placeholder="Digite a rua"
                                name="rua" onkeypress="return validateLetterInput(event);" required
                                oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                oninput="setCustomValidity('')"
                                value="<?php
                                if (!empty($_POST['rua'])) {
                                    echo $_POST['rua'];
                                }
                                ?>"/>
                      </div>

                      <label for="numero" class="col-lg-1 control-label"> Número: </label>
                      <div class="col-lg-1">
                          <input type="text" class="form-control" 
                                name="numero" onkeypress="return validateNumberInput(event);" required
                                oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                oninput="setCustomValidity('')"
                                value="<?php
                                if (!empty($_POST['numero'])) {
                                    echo $_POST['numero'];
                                }
                                ?>"/>
                      </div>

                      <label for="complemento" class="col-lg-1 control-label"> Complemento: </label>
                      <div class="col-lg-3">
                          <input type="text" class="form-control" 
                                name="complemento" onkeypress="return validateNumberInput(event);" required
                                oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                oninput="setCustomValidity('')"
                                value="<?php
                                if (!empty($_POST['complemento'])) {
                                    echo $_POST['complemento'];
                                }
                                ?>"/>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="form-group">
                    <label for="bairro" class="col-lg-1 control-label"> Bairro: </label>
                      <div class="col-lg-3">
                          <input type="text" class="form-control" placeholder="Digite o bairro"
                                name="bairro" onkeypress="return validateLetterInput(event);" required
                                oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                oninput="setCustomValidity('')"
                                value="<?php
                                if (!empty($_POST['bairro'])) {
                                    echo $_POST['bairro'];
                                }
                                ?>"/>
                      </div>

                      <label for="cidade" class="col-lg-1 control-label"> Cidade: </label>
                      <div class="col-lg-3">
                          <input type="text" class="form-control" placeholder="Digite a cidade"
                                name="cidade" onkeypress="return validateLetterInput(event);" required
                                oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                oninput="setCustomValidity('')"
                                value="<?php
                                if (!empty($_POST['cidade'])) {
                                    echo $_POST['cidade'];
                                }
                                ?>"/>
                      </div>

                      <label for="uf" class="col-lg-1 control-label"> UF: </label>
                      <div class="col-lg-2">
                          <input type="text" class="form-control" 
                                name="uf" onkeypress="return validateLetterInput(event);" required
                                oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                oninput="setCustomValidity('')"
                                value="<?php
                                if (!empty($_POST['uf'])) {
                                    echo $_POST['uf'];
                                }
                                ?>"/>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="form-group">
                      <label for="cep" class="col-lg-1 control-label"> CEP: </label>
                      <div class="col-lg-3">
                          <input type="text" class="form-control" 
                                name="cep" onkeypress="return validateNumberInput(event);" required
                                oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                oninput="setCustomValidity('')"
                                value="<?php
                                if (!empty($_POST['cep'])) {
                                    echo $_POST['cep'];
                                }
                                ?>"/>
                      </div>

                      <label for="trabalho" class="col-lg-1 control-label"> Trabalho: </label>
                      <div class="col-lg-3">
                          <input type="text" class="form-control" 
                                name="trabalho" onkeypress="return validateLetterInput(event);" required
                                oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                oninput="setCustomValidity('')"
                                value="<?php
                                if (!empty($_POST['trabalho'])) {
                                    echo $_POST['trabalho'];
                                }
                                ?>"/>
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
                            <input type="text" class="form-control" placeholder="Digite o nome do responsável"
                                name="nome_responsavel" onkeypress="return validateLetterInput(event);" required
                                oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                oninput="setCustomValidity('')"
                                value="<?php
                                if (!empty($_POST['nome_responsavel'])) {
                                    echo $_POST['nome_responsavel'];
                                }
                                ?>"/>
                        </div>
                        
                        <label for="telefone_responsavel" class="col-lg-1 control-label"> Telefone*: </label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control phone phone1" placeholder="(ddd) Telefone do responsável"
                                    name="telefone_responsavel" id="telefone_responsavel" maxlength="25" required onkeypress="return validateNumberInput(event);"
                                    oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                    oninput="setCustomValidity('')"
                                    value="<?php
                                    if (!empty($_POST['telefone_responsavel'])) {
                                        echo $_POST['telefone_responsavel'];
                                    }
                                    ?>"/>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group">
                        <label for="profissao_responsavel" class="col-lg-1 control-label"> Profissão: </label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" placeholder="Digite a profissão do responsável"
                                name="profissao_responsavel" onkeypress="return validateLetterInput(event);" required
                                oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                oninput="setCustomValidity('')"
                                value="<?php
                                if (!empty($_POST['profissao_responsavel'])) {
                                    echo $_POST['profissao_responsavel'];
                                }
                                ?>"/>
                        </div>

                        <label for="cpf_responsavel" class="col-lg-1 control-label"> CPF: </label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" 
                                  name="cpf_responsavel" onkeypress="return validateNumberInput(event);" required
                                  oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                                  oninput="setCustomValidity('')"
                                  value="<?php
                                  if (!empty($_POST['cpf_responsavel'])) {
                                      echo $_POST['cpf_responsavel'];
                                  }
                                  ?>"/>
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
    </div>
</div>