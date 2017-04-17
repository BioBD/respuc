<div class = "row">
    <?php require_once APPPATH . 'views/include/left_menu.php' ?>
    <div class="col-lg-10">
		<?php echo $error;?>

		<?php echo form_open_multipart('InstituicaoController/upload_csv');?>

		<input type="file" name="userfile" size="20" />

		<br /><br />

		<input type="submit" value="upload" />

		</form>
    </div>
</div>






