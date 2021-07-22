<!--<h2><?php echo $title; ?></h2>-->


<div class="container py-3">
<?php echo validation_errors(); ?>

<?php echo form_open('news/create_reservation'); ?>

    <h2>General information</h2><br>


    <label for="reserve_date">When would you like to move in?</label>
    <input type="date" id="reserve_date" name="reserve_date">

    <div id = "div_how_long">
    <label for="type_no_select">How long do you want the space?</label><br>
    <div id="how_long" class="btn-group" data-toggle="buttons">
        <label class="btn btn-default active">
            <input type="radio" name="how_long" value="month"/> One month or less
        </label>
        <label class="btn btn-default">
            <input type="radio"  name="how_long" value="few_month"/> Few month
        </label>
        <label class="btn btn-default">
            <input type="radio"  name="how_long" value="year"/> One year or less
        </label>
        <label class="btn btn-default">
            <input type="radio"  name="how_long" value="few_year"/> Few years
        </label>
        <label class="btn btn-default">
            <input type="radio"  name="how_long" value="indefinetly"/> Indefinetly
        </label>
    </div></div><br>

    <label for="description_reservation">What are you going to store?</label>
    <input type="textarea" id="description_reservation" name="description_reservation">

    <label for="description_need">Tell about your storage needs.</label>
    <input type="textarea" id="description_need" name="description_need">

    <input type="hidden" name="id_space" value=<?php if(isset($num_r))echo $num_r; ?>>

    <input type="submit" name="submit" value="Confirm reservation" />

</form>
</div>