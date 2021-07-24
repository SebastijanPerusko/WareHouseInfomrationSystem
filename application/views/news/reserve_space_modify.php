<!--<h2><?php echo $title; ?></h2>-->


<div class="container py-3">
<?php echo validation_errors(); ?>

<?php echo form_open('news/edit_reservation'); ?>


    <h2>General information</h2><br>
    <?php echo $comment['datum_od']; ?>


    <label for="reserve_date">When would you like to move in?</label>
    <input type="date" id="reserve_date" name="reserve_date" value = "<?php echo $comment['datum_od']; ?>">

    <div id = "div_how_long">
    <label for="type_no_select">How long do you want the space?</label><br>
    <div id="how_long" class="btn-group" data-toggle="buttons">
        <label class="btn btn-default active">
            <input <?php if($comment['cas_rezervacije'] == "month"){ echo "checked";} ?> type="radio" name="how_long" value="month"/> One month or less
        </label>
        <label class="btn btn-default">
            <input <?php if($comment['cas_rezervacije'] == "few_month"){ echo "checked";} ?> type="radio"  name="how_long" value="few_month"/> Few month
        </label>
        <label class="btn btn-default">
            <input <?php if($comment['cas_rezervacije'] == "year"){ echo "checked";} ?> type="radio"  name="how_long" value="year"/> One year or less
        </label>
        <label class="btn btn-default">
            <input <?php if($comment['cas_rezervacije'] == "few_year"){ echo "checked";} ?> type="radio"  name="how_long" value="few_year"/> Few years
        </label>
        <label class="btn btn-default">
            <input <?php if($comment['cas_rezervacije'] == "indefinetly"){ echo "checked";} ?> type="radio"  name="how_long" value="indefinetly"/> Indefinetly
        </label>
    </div></div><br>

    <label for="description_reservation">What are you going to store?</label>
    <input type="textarea" id="description_reservation" name="description_reservation" value = "<?php echo $comment['stvari']; ?>">

    <label for="description_need">Tell about your storage needs.</label>
    <input type="textarea" id="description_need" name="description_need" value = "<?php echo $comment['opis']; ?>">

    <input type="hidden" name="id_space" value="<?php echo $comment['id']; ?>">

    <input type="submit" name="submit" value="Confirm reservation" />

</form>
</div>