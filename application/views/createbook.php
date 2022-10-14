<h2><?php //echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('book/saveBook'); ?>

    <label for="class">Class</label>
    <input type="text" name="class" /><br />

    <label for="text">Subject</label>
    <input type="text" name="subject" /><br />

    <input type="submit" name="submit" value="Create new Book" />

</form>