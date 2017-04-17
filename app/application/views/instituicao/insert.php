<div class = "row">
    <?php require_once APPPATH . 'views/include/left_menu.php' ?>
    <div class="col-lg-10">
      <form method="post" action="save" enctype="multipart/form-data">
        <br>
        Nome:
        <input type="text" name="nome"><br><br>
        Telefone:
        <input type="text" name="telefone"><br><br>
        Celular:
        <input type="text" name="celular"><br><br>
        E-mail:
        <input type="text" name="email"><br><br>
        Vínculo:
        <input type="text" name="vinculo"><br><br>
        Nome do Responsável:
        <input type="text" name="nome_responsavel"><br><br>
        E-mail do Responsável:
        <input type="text" name="email_responsavel"><br><br>
          Telefone do Responsável:
        <input type="text" name="telefone_responsavel"><br><br>
        <input type="submit" value="Submit">
      </form>
    </div>
</div>

