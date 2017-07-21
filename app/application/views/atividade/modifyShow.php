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

<style type="text/css">
  h4 {color: black; margin-left: all}
  label {color: black;}
  .container{margin: auto;width: 45%;}
  input[type=text]:focus { border: 2px solid #555;}
  input[type=email]:focus { border: 2px solid #555;}
</style>

<div class="container"><br>
  <h4><i class="fa fa-cog" aria-hidden="true"></i>  Inserir Nova Atividade <i class="fa fa-cog" aria-hidden="true"></i></h4><br>
    <form method="post" id="theForm" action="<?=$action?>" enctype="multipart/form-data">
      <div class="form-group">
        <?php if (isset($atividade)) 
            {
        ?>
                <input type="hidden" name="old_nome" id="old_nome" value="<?=$atividade->getNome()?>">
        <?php    
            }
        ?>
        <label for="nome" class="col-lg-1">Nome*: </label><br><br>
        <input type="text" size="10" <?php if (isset($disabled)) echo "disabled";?> class="form-control" placeholder="Digite o nome da atividade"
                  name="nome" onkeypress="return validateLetterInput(event);" required
                  oninvalid="this.setCustomValidity('Este campo não pode ficar vazio.')"
                  oninput="setCustomValidity('')"
                  value="<?php
                          if (!empty($_POST['nome']))
                                echo $_POST['nome'];
                          else if(isset($atividade))
                                echo $atividade->getNome();

        ?>"/> </div>

    <div class="row">
      <div class="form-group">
        <div class="col-lg-1"></div>
        <input type="button" onclick="goBack()" class='btn btn-warning' value="Voltar"></a>
        <input class="btn btn-primary" type="submit" <?php if (isset($disabled)) echo "disabled";?> value="Salvar"> 
        </div>
    </div>
    </form>

      <br><br>
      <br><br>
        <?php if (isset($pessoas))
        {
        ?>

		<table class="table table-bordered table-striped table-min-td-size" style="max-width: 100%;" id="sortable-table">
							<tr>
								<th style="    text-align:center;    vertical-align:middle;" colspan="4">Participantes da atividade</th>
							</tr>
							<tr>
                                <th>Nome</th>
                                <th>Tipo</th>
                                <th>Remover</th>
							</tr>
							<tbody id="tablebody">
								<?php foreach ($pessoas as $pessoa) { ?> 
									<tr>
                                        <?php if($pessoa->tipo === "aluno") 
                                        {?>

										<td>
											<a href='<?=$this->config->item('base_link')?>AlunoController/get?cpf=<?=urlencode($pessoa->cpf)?>'>
												<?=$pessoa->nome?> </a> 
										</td>

                                        <?php
                                        }else {?>

										<td>
											<a href='<?=$this->config->item('base_link')?>AprendizController/get?cpf=<?=urlencode($pessoa->cpf)?>'>
												<?=$pessoa->nome?> </a> 
										</td>


                                        <?php
                                        }
                                        ?>
										<td><?php echo $pessoa->tipo?></td>
                                        <td><a href="<?php 
                                        echo $this->config->item('base_link').'AtividadeController/removePerson?tipo='.$pessoa->tipo.'&cpf='.$pessoa->cpf.'&atividade='.$atividade->getNome(); 
                                        ?>">
                                            <input onclick="return confirm('Tem certeza que deseja remover a pessoa de CPF <?= $pessoa->cpf?> dessa atividade ?')" class="btn btn-danger" type="button" value="Deletar"></a></td>								
									</tr>
								<?php } ?>
							</tbody>
			</table>
        <?php 
        }
        ?>


    </div>
    </div>