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
        $("#theForm").submit(function() {
            $(".phone").unmask();
            $("#cep").unmask();
            $("#cpf").unmask();
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
  <h4><i class="fa fa-cog" aria-hidden="true"></i>  Inserir Nova Instituição <i class="fa fa-cog" aria-hidden="true"></i></h4><br>
    <form method="post" id="theForm" action="<?=$action?>" enctype="multipart/form-data">
      <div class="form-group">
        <label for="nome" class="col-lg-1">Nome*: </label><br><br>
        <input type="text" <?php if (isset($disabled)) echo "disabled";?> size="10" class="form-control" placeholder="Digite o nome da instituição"
                  name="nome" onkeypress="return validateLetterInput(event);" required
                  oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                  oninput="setCustomValidity('')"
                  value="<?php
                          if (!empty($_POST['nome']))
                                echo $_POST['nome'];
                            else if (isset($instituicao))
                                echo $instituicao->getNome();
        ?>"/> </div>

    <div class="form-group">               
        <label for="telefone"  class="col-lg-1"> Telefone*: </label> <br><br>
        <input type="text" <?php if (isset($disabled)) echo "disabled";?>  class="form-control phone phone1" placeholder="(XX) XXXX-XXXX"
                  name="telefone" id="telefone" maxlength="25" required onkeypress="return validateNumberInput(event);"
                  oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                  oninput="setCustomValidity('')"
                  value="<?php
                              if (!empty($_POST['telefone'])) 
                                  echo $_POST['telefone'];
                            else if (isset($instituicao))
                                echo $instituicao->getTelefone();
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
                            else if (isset($instituicao))
                                echo $instituicao->getCelular();
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
                            else if (isset($instituicao))
                                echo $instituicao->getEmail();
              ?>"/> </div>                  

    <div class="form-group">
        <label for="vinculo" class="col-lg-1 control-label"> Vínculo: </label> <br><br>
        <input type="text" <?php if (isset($disabled)) echo "disabled";?> class="form-control" placeholder="Digite o vínculo"
                  name="vinculo" id="vinculo" maxlength="25" required
                  oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                  oninput="setCustomValidity('')"
                  value="<?php
                              if (!empty($_POST['vinculo'])) 
                                  echo $_POST['vinculo'];
                            else if (isset($instituicao))
                                echo $instituicao->getVinculo();
              ?>"/></div>

  <h4><i class="fa fa-cog" aria-hidden="true"></i>  Dados do Responável <i class="fa fa-cog" aria-hidden="true"></i></h4><br>
      <div class="form-group">
          <label for="nome_responsavel" class="col-lg-1 control-label"> Nome: </label><br><br>
          <input type="text" <?php if (isset($disabled)) echo "disabled";?> class="form-control" placeholder="Digite o nome do responsável"
                  name="nome_responsavel" onkeypress="return validateLetterInput(event);" required
                  oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                  oninput="setCustomValidity('')"
                  value="<?php
                              if (!empty($_POST['nome_responsavel'])) 
                                  echo $_POST['nome_responsavel'];
                            else if (isset($instituicao))
                                echo $instituicao->getNomeResponsavel();
          ?>"/> </div>


      <div class="form-group">    
          <label for="telefone_responsavel" class="col-lg-1 control-label"> Telefone*: </label><br><br>
          <input type="text" <?php if (isset($disabled)) echo "disabled";?> class="form-control phone phone1" placeholder="(XX) XXXX-XXXX"
                  name="telefone_responsavel" id="telefone_responsavel" maxlength="25" required onkeypress="return validateNumberInput(event);"
                  oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                  oninput="setCustomValidity('')"
                  value="<?php
                                if (!empty($_POST['telefone_responsavel'])) 
                                    echo $_POST['telefone_responsavel'];
                            else if (isset($instituicao))
                                echo $instituicao->getTelefoneResponsavel();
          ?>"/></div>

    <div class="form-group">
        <label for="email_responsavel" class="col-lg-1 control-label"> Email*: </label> <br><br>
        <input type="email_responsavel" <?php if (isset($disabled)) echo "disabled";?> id="email_responsavel" class="form-control" placeholder="XXXXXX@gmail.com"
                  name="email_responsavel" required title ="Favor incluir '@' e '.' ."
                  oninvalid="this.setCustomValidity('Este campo requer um endereço de email.')"
                  oninput="setCustomValidity('')"
                  value="<?php
                              if (!empty($_POST['email_responsavel'])) {
                                  echo $_POST['email_responsavel'];
                               }
                            else if (isset($instituicao))
                                echo $instituicao->getEmailResponsavel();
              ?>"/>         

    <div class="row">
      <div class="form-group">
        <div class="col-lg-1"></div>
        <input type="button" onclick="goBack()" class='btn btn-warning' value="Voltar"></a>
        <input class="btn btn-primary" <?php if (isset($disabled)) echo "disabled";?> type="submit" value="Salvar"> </div></div></form></div></div>