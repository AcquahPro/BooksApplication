<h2><?php //echo $title; ?></h2>

<?php echo validation_errors();
    $action = 'book/edit'.'/'. $bookForEdit[0]['bookId'];
 ?>

<?php echo form_open($action); ?>

    <label for="class">Class</label>
    <input type="text" name="class" value="<?php echo $bookForEdit[0]['class']; ?>"/><br />

    <label for="text">Subject</label>
    <input type="text" name="subject" value="<?php echo $bookForEdit[0]['subject']; ?>"/><br />

    <input type="submit" name="submit" value="Update Book" />

</form>