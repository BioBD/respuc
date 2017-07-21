<script> function goBack() { window.history.back() } </script>
<style type="text/css"> h4 {color: black; margin-left: all} .container{margin: auto;width: 40%;} </style>

<br><br><h4><i class="fa fa-download" aria-hidden="true"></i> Importar tabela CSV <i class="fa fa-download" aria-hidden="true"></i></h4><br>
<div class="container">
    <div class="col-lg-12">
		<?php echo $error;?>
        <?php echo form_open_multipart('InstituicaoController/upload_csv');?>
		<input type="file" class="form-control" name="userfile" /><br>
		<input type="button" onclick="goBack()" class='btn btn-warning' value="Voltar"></a>
		<input type="submit" class="btn btn-primary" value="Enviar" />
		</form>
    </div>
</div>