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
  <h4><i class="fa fa-cog" aria-hidden="true"></i>  Inserir Novo Funcionario <i class="fa fa-cog" aria-hidden="true"></i></h4><br>
    <form method="post" id="theForm" action="<?=$action?>" enctype="multipart/form-data">
        <?php if (!empty($_POST['old_cpf']) || isset($funcionario)) 
            {
        ?>
                <input type="hidden" name="old_cpf" id="old_cpf" value="<?php
                          if (!empty($_POST['old_cpf']))
                                echo $_POST['old_cpf'];
                        else if(isset($funcionario))
                                echo $funcionario->getCpf();
                ?>"/>
        <?php    
            }
        ?>
      <div class="form-group">
        <label for="nome" class="col-lg-1">Nome*: </label><br><br>
        <input type="text" <?php if (isset($disabled)) echo "disabled";?> size="10" class="form-control" placeholder="Digite o nome do funcionario"
                  name="nome" onkeypress="return validateLetterInput(event);" required
                  oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                  oninput="setCustomValidity('')"
                  value="<?php
                          if (!empty($_POST['nome']))
                                echo $_POST['nome'];
                        else if(isset($funcionario))
                                echo $funcionario->getNome();
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
                        else if(isset($funcionario))
                                echo $funcionario->getCpf();
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
                        else if(isset($funcionario))
                                echo $funcionario->getRg();
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
                            else if(isset($funcionario))
                                    echo $funcionario->getDataNascimento();
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
                            else if(isset($funcionario))
                                    echo $funcionario->getNaturalidade();
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
                            else if(isset($funcionario))
                                    echo $funcionario->getTelefone();
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
                            else if(isset($funcionario))
                                    echo $funcionario->getCelular();
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
                            else if(isset($funcionario))
                                    echo $funcionario->getEmail();
              ?>"/><script type="text/javascript"> window.onload = funcExistingEmail();</script> </div>                  


    <div class="form-group"> 
        <label for="funcao" class="col-lg-1 control-label"> Funçao: </label><br><br>
        <input type="text" <?php if (isset($disabled)) echo "disabled";?> class="form-control" placeholder="Digite a funçao"
                  name="funcao" onkeypress="return validateLetterInput(event);" required
                  oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                  oninput="setCustomValidity('')"
                  value="<?php
                              if (!empty($_POST['funcao']))
                                  echo $_POST['funcao'];
                            else if(isset($funcionario))
                                    echo $funcionario->getFuncao();
              ?>"/></div>


    <div class="row">
      <div class="form-group">
        <div class="col-lg-1"></div>
        <input type="button" onclick="goBack()" class='btn btn-warning' value="Voltar"></a>
        <input class="btn btn-primary" type="submit" value="Salvar" <?php if (isset($disabled)) echo "disabled";?>> </div></div></form></div></div>
        