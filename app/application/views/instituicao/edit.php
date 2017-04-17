<div class = "row">
    <?php require_once APPPATH . 'views/include/left_menu.php' ?>
    <div class="col-lg-10">
      <form method="post" action="update" enctype="multipart/form-data">
        <br>
        Nome:
        <input type="hidden" name="old_nome" value="<?php echo $instituicao->getNome()?>"><br><br>
        <input type="text" name="nome" value="<?php echo $instituicao->getNome()?>"><br><br>
        Telefone:
        <input type="text" name="telefone" value="<?php echo $instituicao->getTelefone()?>"><br><br>
        Celular:
        <input type="text" name="celular" value="<?php echo $instituicao->getCelular()?>"><br><br>
        E-mail:
        <input type="text" name="email" value="<?php echo $instituicao->getEmail()?>"><br><br>
        Vínculo:
        <input type="text" name="vinculo" value="<?php echo $instituicao->getVinculo()?>"><br><br>
        Nome do Responsável:
        <input type="text" name="nome_responsavel" value="<?php echo $instituicao->getNomeResponsavel()?>"><br><br>
        E-mail do Responsável:
        <input type="text" name="email_responsavel" value="<?php echo $instituicao->getEmailResponsavel()?>"><br><br>
          Telefone do Responsável:
        <input type="text" name="telefone_responsavel" value="<?php echo $instituicao->getTelefoneResponsavel()?>"><br><br>
        <input type="submit" value="Submit">
      </form>
    </div>
</div>






