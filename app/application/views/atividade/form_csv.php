<div class = "row">
    <div class="col-lg-10">
		<?php echo $error;?>

        <?php echo form_open_multipart('AtividadeController/upload_csv');?>

		<input type="file" class="form-control" name="userfile" size="20" />

		<br /><br />
		<br /><br />
		<br /><br />

		<input type="submit" class="btn btn-primary" value="upload" />

		</form>
    </div>
</div>