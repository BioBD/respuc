<?php echo $error;?>

<?php echo form_open_multipart('EventoController/upload_csv');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>
