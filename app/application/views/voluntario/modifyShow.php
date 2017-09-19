<script>
    function goBack() {
      window.history.back()
    }

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

    $(document).ready(function ($) {
        var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 00000-0000';
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
        $("#rg").mask("00.000.000-0");
        $("#cpf").mask("000.000.000-00");
        $("#cpf_responsavel").mask("000.000.000-00");
        $("#data_nascimento").mask("00/00/0000");

        $("#theForm").submit(function() {
            $(".phone").unmask();
            $("#cep").unmask();
            $("#rg").unmask();
            $("#cpf").unmask();
            $("#cpf_responsavel").unmask();
        });
    });

</script>

<style type="text/css">
  h4 {color: black; margin-left: all}
  label {color: black;}
  .container{margin: auto;width: 45%;}
  input[type=text]:focus { border: 2px solid #555;}
  input[type=email]:focus { border: 2px solid #555;}
</style>

<div class="container"><br>
  <h4><i class="fa fa-cog" aria-hidden="true"></i>  Inserir Novo Voluntario <i class="fa fa-cog" aria-hidden="true"></i></h4><br>
    <form method="post" id="theForm" action="<?=$action?>" enctype="multipart/form-data">
        <?php if (!empty($_POST['old_cpf']) || isset($voluntario)) 
            {
        ?>
                <input type="hidden" name="old_cpf" id="old_cpf" value="<?php
                          if (!empty($_POST['old_cpf']))
                                echo $_POST['old_cpf'];
                        else if(isset($voluntario))
                                echo $voluntario->getCpf();
                ?>"/>
        <?php    
            }
        ?>

    <div class="form-group">
          <label for="matricula" class="col-lg-1 control-label"> Matricula: </label><br><br>
          <input type="text" <?php if (isset($disabled)) echo "disabled";?> class="form-control" placeholder="Digite a matricula"
                  name="matricula" id="matricula" 
                  value="<?php
                              if (!empty($_POST['matricula'])) 
                                  echo $_POST['matricula'];
                            else if(isset($voluntario))
                                    echo $voluntario->getMatricula();
          ?>"/></div> <br>


    <div class="form-group">
        <label for="nome" class="col-lg-1">Nome*: </label><br><br>
        <input type="text" <?php if (isset($disabled)) echo "disabled";?> size="10" class="form-control" placeholder="Digite o nome do voluntario"
                  name="nome" onkeypress="return validateLetterInput(event);" required
                  oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                  oninput="setCustomValidity('')"
                  value="<?php
                          if (!empty($_POST['nome']))
                                echo $_POST['nome'];
                        else if(isset($voluntario))
                                echo $voluntario->getNome();
        ?>"/> </div>
    <div class="form-group">
        <label for="cpf" class="col-lg-1">CPF*: </label><br><br>
        <input type="text" <?php if (isset($disabled)) echo "disabled";?> class="form-control" placeholder="XXX.XXX.XXX-XX"
                  name="cpf" id="cpf" onkeypress="return validateNumberInput(event);" required
                  oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                  oninput="setCustomValidity('')"
                  value="<?php
                          if (!empty($_POST['cpf']))
                                  echo $_POST['cpf'];
                        else if(isset($voluntario))
                                echo $voluntario->getCpf();
         ?>"/> </div>

    <div class="form-group">
        <label for="rg" class="col-lg-1">RG*: </label><br><br>
        <input type="text" <?php if (isset($disabled)) echo "disabled";?> class="form-control" placeholder="XX.XXX.XXX-X"
                  name="rg" id="rg" onkeypress="return validateNumberInput(event);" required
                  oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                  oninput="setCustomValidity('')"
                  value="<?php
                            if (!empty($_POST['rg'])) 
                                  echo $_POST['rg'];
                        else if(isset($voluntario))
                                echo $voluntario->getRg();
          ?>"/> </div>

    <div class="form-group">   
        <label for="data_nascimento" class="col-lg-1"> Nascimento: </label><br><br>
        <input type="text" <?php if (isset($disabled)) echo "disabled";?> class="form-control" placeholder="DD/MM/AAAA"
                  name="data_nascimento" id="data_nascimento" onkeypress="return validateNumberInput(event);" required
                  oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                  oninput="setCustomValidity('')"
                  value="<?php
                              if (!empty($_POST['data_nascimento']))
                                  echo $_POST['data_nascimento'];
                            else if(isset($voluntario))
                                    echo $voluntario->getDataNascimento();
            ?>"/> </div>


    <div class="form-group">
        <label for="naturalidade" class="col-lg-1"> Naturalidade: </label> <br><br>
        <input type="text" <?php if (isset($disabled)) echo "disabled";?> class="form-control" placeholder="Digite a naturalidade"
                  name="naturalidade" onkeypress="return validateLetterInput(event);" required
                  oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                  oninput="setCustomValidity('')"
                  value="<?php
                              if (!empty($_POST['naturalidade'])) 
                                  echo $_POST['naturalidade'];
                            else if(isset($voluntario))
                                    echo $voluntario->getNaturalidade();
            ?>"/></div>

    <div class="form-group">               
        <label for="telefone" class="col-lg-1"> Telefone*: </label> <br><br>
        <input type="text" <?php if (isset($disabled)) echo "disabled";?> class="form-control phone phone1" placeholder="(XX) XXXX-XXXX"
                  name="telefone" id="telefone" maxlength="25" required onkeypress="return validateNumberInput(event);"
                  oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                  oninput="setCustomValidity('')"
                  value="<?php
                              if (!empty($_POST['telefone'])) 
                                  echo $_POST['telefone'];
                            else if(isset($voluntario))
                                    echo $voluntario->getTelefone();
              ?>"/></div>


    <div class="form-group">
        <label for="celular" class="col-lg-1 control-label"> Celular*: </label> <br><br>
        <input type="text" <?php if (isset($disabled)) echo "disabled";?> class="form-control phone phone1" placeholder="(XX) XXXXX-XXXX"
                  name="celular" id="celular" maxlength="25" required onkeypress="return validateNumberInput(event);"
                  oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                  oninput="setCustomValidity('')"
                  value="<?php
                              if (!empty($_POST['celular'])) 
                                  echo $_POST['celular'];
                            else if(isset($voluntario))
                                    echo $voluntario->getCelular();
              ?>"/></div>
                    

    <div class="form-group">
        <label for="email" class="col-lg-1 control-label"> Email*: </label> <br><br>
        <input type="email" <?php if (isset($disabled)) echo "disabled";?> id="email" class="form-control" placeholder="XXXXXX@gmail.com"
                  name="email" required title ="Favor incluir '@' e '.' ."
                  oninvalid="this.setCustomValidity('Este campo requer um endereço de email.')"
                  oninput="setCustomValidity('')"
                  value="<?php
                              if (!empty($_POST['email'])) {
                                  echo $_POST['email'];
                              }
                            else if(isset($voluntario))
                                    echo $voluntario->getEmail();
              ?>"/><script type="text/javascript"> window.onload = funcExistingEmail();</script> </div>                  


    <div class="form-group"> 
        <label for="rua" class="col-lg-1 control-label"> Rua: </label><br><br>
        <input type="text" <?php if (isset($disabled)) echo "disabled";?> class="form-control" placeholder="Digite a rua"
                  name="rua" onkeypress="return validateLetterInput(event);" required
                  oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                  oninput="setCustomValidity('')"
                  value="<?php
                              if (!empty($_POST['rua']))
                                  echo $_POST['rua'];
                            else if(isset($voluntario))
                                    echo $voluntario->getRua();
              ?>"/></div>

    <div class="form-group">
        <label for="numero" class="col-lg-1 control-label"> Número: </label><br><br>
        <input type="text" <?php if (isset($disabled)) echo "disabled";?> class="form-control" placeholder="Digite o numero da casa/apto"
                  name="numero" required
                  oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                  oninput="setCustomValidity('')"
                  value="<?php
                              if (!empty($_POST['numero'])) {
                                  echo $_POST['numero'];
                                }
                            else if(isset($voluntario))
                                    echo $voluntario->getNumero();
              ?>"/></div>

    <div class="form-group">
        <label for="complemento" class="col-lg-1 control-label"> Complemento: </label><br><br>
        <input type="text" <?php if (isset($disabled)) echo "disabled";?> class="form-control" placeholder="Digite o complemento"
                  name="complemento" required
                  oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                  oninput="setCustomValidity('')"
                  value="<?php
                              if (!empty($_POST['complemento'])) {
                                  echo $_POST['complemento'];
                                }
                            else if(isset($voluntario))
                                    echo $voluntario->getComplemento();
              ?>"/></div>


    <div class="form-group">
        <label for="bairro" class="col-lg-1 control-label"> Bairro: </label><br><br>
        <input type="text" <?php if (isset($disabled)) echo "disabled";?> class="form-control" placeholder="Digite o bairro"
                  name="bairro" onkeypress="return validateLetterInput(event);" required
                  oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                  oninput="setCustomValidity('')"
                  value="<?php
                              if (!empty($_POST['bairro'])) {
                                  echo $_POST['bairro'];
                                }
                            else if(isset($voluntario))
                                    echo $voluntario->getBairro();
                  ?>"/></div>

    <div class="form-group">
          <label for="cidade" class="col-lg-1 control-label"> Cidade: </label><br><br>
          <input type="text" <?php if (isset($disabled)) echo "disabled";?> class="form-control" placeholder="Digite a cidade"
                  name="cidade" onkeypress="return validateLetterInput(event);" required
                  oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                  oninput="setCustomValidity('')"
                  value="<?php
                              if (!empty($_POST['cidade'])) {
                                  echo $_POST['cidade'];
                                }
                            else if(isset($voluntario))
                                    echo $voluntario->getCidade();
                    ?>"/></div>

    <div class="form-group">
          <label for="uf" class="col-lg-2 control-label"> Estado*: </label> <br><br>
          <select  class="form-control endereco" id="uf" <?php if (isset($disabled)) echo "disabled";?> name="uf" required
                  oninvalid="this.setCustomValidity('Favor escolher um item da lista.')"
                  oninput="setCustomValidity('')">
                                <option value=""> -- Selecione um estado -- </option>
                                <option value="RJ" <?php if ( (!empty($_POST['uf']) && ($_POST['uf'] == "RJ")) || (isset($voluntario) && $voluntario->getUf() == "RJ")) 
                                                    echo "selected" ?>>RJ</option>
                                <option value="AC" <?php if ( (!empty($_POST['uf']) && ($_POST['uf'] == "AC")) || (isset($voluntario) && $voluntario->getUf() == "AC")) 
                                                    echo "selected" ?>>AC</option>
                                <option value="AL" <?php if ( (!empty($_POST['uf']) && ($_POST['uf'] == "AL")) || (isset($voluntario) && $voluntario->getUf() == "AL")) 
                                                    echo "selected" ?>>AL</option>
                                <option value="AM" <?php if ( (!empty($_POST['uf']) && ($_POST['uf'] == "AM")) || (isset($voluntario) && $voluntario->getUf() == "AM")) 
                                                    echo "selected" ?>>AM</option>
                                <option value="AP" <?php if ( (!empty($_POST['uf']) && ($_POST['uf'] == "AP")) || (isset($voluntario) && $voluntario->getUf() == "AP")) 
                                                    echo "selected" ?>>AP</option>
                                <option value="BA" <?php if ( (!empty($_POST['uf']) && ($_POST['uf'] == "BA")) || (isset($voluntario) && $voluntario->getUf() == "BA")) 
                                                    echo "selected" ?>>BA</option>
                                <option value="CE" <?php if ( (!empty($_POST['uf']) && ($_POST['uf'] == "CE")) || (isset($voluntario) && $voluntario->getUf() == "CE")) 
                                                    echo "selected" ?>>CE</option>
                                <option value="DF" <?php if ( (!empty($_POST['uf']) && ($_POST['uf'] == "DF")) || (isset($voluntario) && $voluntario->getUf() == "DF")) 
                                                    echo "selected" ?>>DF</option>
                                <option value="ES" <?php if ( (!empty($_POST['uf']) && ($_POST['uf'] == "ES")) || (isset($voluntario) && $voluntario->getUf() == "ES")) 
                                                    echo "selected" ?>>ES</option>
                                <option value="GO" <?php if ( (!empty($_POST['uf']) && ($_POST['uf'] == "GO")) || (isset($voluntario) && $voluntario->getUf() == "GO")) 
                                                    echo "selected" ?>>GO</option>
                                <option value="MA" <?php if ( (!empty($_POST['uf']) && ($_POST['uf'] == "MA")) || (isset($voluntario) && $voluntario->getUf() == "MA")) 
                                                    echo "selected" ?>>MA</option>
                                <option value="MG" <?php if ( (!empty($_POST['uf']) && ($_POST['uf'] == "MG")) || (isset($voluntario) && $voluntario->getUf() == "MG")) 
                                                    echo "selected" ?>>MG</option>
                                <option value="MS" <?php if ( (!empty($_POST['uf']) && ($_POST['uf'] == "MS")) || (isset($voluntario) && $voluntario->getUf() == "MS")) 
                                                    echo "selected" ?>>MS</option>
                                <option value="MT" <?php if ( (!empty($_POST['uf']) && ($_POST['uf'] == "MT")) || (isset($voluntario) && $voluntario->getUf() == "MT")) 
                                                    echo "selected" ?>>MT</option>
                                <option value="PA" <?php if ( (!empty($_POST['uf']) && ($_POST['uf'] == "PA")) || (isset($voluntario) && $voluntario->getUf() == "PA")) 
                                                    echo "selected" ?>>PA</option>
                                <option value="PB" <?php if ( (!empty($_POST['uf']) && ($_POST['uf'] == "PB")) || (isset($voluntario) && $voluntario->getUf() == "PB")) 
                                                    echo "selected" ?>>PB</option>
                                <option value="PE" <?php if ( (!empty($_POST['uf']) && ($_POST['uf'] == "PE")) || (isset($voluntario) && $voluntario->getUf() == "PE")) 
                                                    echo "selected" ?>>PE</option>
                                <option value="PI" <?php if ( (!empty($_POST['uf']) && ($_POST['uf'] == "PI")) || (isset($voluntario) && $voluntario->getUf() == "PI")) 
                                                    echo "selected" ?>>PI</option>
                                <option value="PR" <?php if ( (!empty($_POST['uf']) && ($_POST['uf'] == "PR")) || (isset($voluntario) && $voluntario->getUf() == "PR")) 
                                                    echo "selected" ?>>PR</option>
                                <option value="RN" <?php if ( (!empty($_POST['uf']) && ($_POST['uf'] == "RN")) || (isset($voluntario) && $voluntario->getUf() == "RN")) 
                                                    echo "selected" ?>>RN</option>
                                <option value="RO" <?php if ( (!empty($_POST['uf']) && ($_POST['uf'] == "RO")) || (isset($voluntario) && $voluntario->getUf() == "RO")) 
                                                    echo "selected" ?>>RO</option>
                                <option value="RR" <?php if ( (!empty($_POST['uf']) && ($_POST['uf'] == "RR")) || (isset($voluntario) && $voluntario->getUf() == "RR")) 
                                                    echo "selected" ?>>RR</option>
                                <option value="RS" <?php if ( (!empty($_POST['uf']) && ($_POST['uf'] == "RS")) || (isset($voluntario) && $voluntario->getUf() == "RS")) 
                                                    echo "selected" ?>>RS</option>
                                <option value="SC" <?php if ( (!empty($_POST['uf']) && ($_POST['uf'] == "SC")) || (isset($voluntario) && $voluntario->getUf() == "SC")) 
                                                    echo "selected" ?>>SC</option>
                                <option value="SE" <?php if ( (!empty($_POST['uf']) && ($_POST['uf'] == "SE")) || (isset($voluntario) && $voluntario->getUf() == "SE")) 
                                                    echo "selected" ?>>SE</option>
                                <option value="SP" <?php if ( (!empty($_POST['uf']) && ($_POST['uf'] == "SP")) || (isset($voluntario) && $voluntario->getUf() == "SP")) 
                                                    echo "selected" ?>>SP</option>
                                <option value="TO" <?php if ( (!empty($_POST['uf']) && ($_POST['uf'] == "TO")) || (isset($voluntario) && $voluntario->getUf() == "TO")) 
                                                    echo "selected" ?>>TO</option>
                            </select>
                        </div>

    <div class="form-group">
          <label for="cep" class="col-lg-1 control-label"> CEP: </label><br><br>
          <input type="text" class="form-control" placeholder="XXXXX-XXX" <?php if (isset($disabled)) echo "disabled";?>
                  name="cep" id="cep" onkeypress="return validateNumberInput(event);" required
                  oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                  oninput="setCustomValidity('')"
                  value="<?php
                              if (!empty($_POST['cep'])) 
                                  echo $_POST['cep'];
                            else if(isset($voluntario))
                                    echo $voluntario->getCep();
          ?>"/></div> 

    <div class="row">
      <div class="form-group">
        <div class="col-lg-1"></div>
        <input type="button" onclick="goBack()" class='btn btn-warning' value="Voltar"></a>
        <input class="btn btn-primary" type="submit" value="Salvar" <?php if (isset($disabled)) echo "disabled";?>> </div></div></form></div></div>
        