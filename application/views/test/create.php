<?php
/**
 * Created by PhpStorm.
 * User: Brad
 * Date: 19/07/2018
 * Time: 2:43 PM
 */?>
<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('test/create'); ?>

<label for="title">Title</label>
<input type="input" name="title" /><br />

<label for="text">Text</label>
<textarea name="text"></textarea><br />

<input type="submit" name="submit" value="Create test item" />

</form>
