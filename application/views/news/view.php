<!--<h2><?php /*echo $title;*/ ?></h2>-->


<div class="container py-3">
        <div class="container marketing">
                <?php $time_access;
                if($space_item['cas'] == 'all_day'){
                        $time_access = '24/7';
                } else if($space_item['cas'] == 'evening') {
                        $time_access = 'during the evening hours';
                } else {
                        $time_access = 'during the morning time';
                }

                if($space_item['lastnik_ogled'] == 'yes') {
                        $time_access = $time_access." and appointment required";
                }

                ?>

                <?php
                if (isset($warning)) {
                    echo "<h2 class='text-justify font-weight-bold text-warning'>";
                    echo $warning;
                    echo "</h2>";
                } ?>

                <div class="row featurette">
                      <div class="col-md-3 order-md-2">
                        <h2 class="featurette-heading"><?php echo $space_item['opis_k']." in ".$space_item['mesto']; ?><div class="text-muted">
                                <?php echo form_open('news/reserve/'.$space_item['id_o']); ?>
                                <input class="btn btn-primary" type="submit" name="submit" value="Reserve this space" />
                        </form></div></h2>
                        <p class="lead">
                                <?php echo "<h3 class='text-justify font-weight-bold'>Size: </h3><h3 class='text-justify font-weight-bold text-info'>".$space_item['dolzina']." x ".$space_item['sirina']."</h3>"; ?>
                                <?php if($space_item['visina'] > 0) {
                                        echo "<h3 class='text-justify font-weight-bold'>Height: </h3><h3 class='text-justify font-weight-bold text-info'>".$space_item['visina']."</h3>";
                                }
                                ?>
                                <?php echo "<h3 class='text-justify font-weight-bold'>Storage Type: </h3><h3 class='text-justify font-weight-bold text-info'>".$space_item['opis_k']."</h3>"; ?>
                                <?php echo "<h3 class='text-justify font-weight-bold'>Access: </h3><h3 class='text-justify font-weight-bold text-info'>You can access this space ".$space_item['gostota']." ".$time_access."</h3>"; ?>

                        </p>
                </div>
                <div class="col-md-9 order-md-1">
                        <img class="rounded-lg mx-auto d-block img-fluid" src="<?php echo base_url($space_item['pot_slika']);?>" width="100%" height="225" alt="...">

                </div>
        </div>
        <hr class="featurette-divider">
        <h2 class='text-justify font-weight-bold'>General information</h2>

        <table class="table text-center">
          <tbody>
            <tr>
              <td><?php echo "<h4 class='text-justify font-weight-bold'>Country: </h4><h4 class='text-justify font-weight-bold text-info'>".$space_item['drzava']."</h4>"; ?></td>
              <td><?php echo "<h4 class='text-justify font-weight-bold'>City: </h4><h4 class='text-justify font-weight-bold text-info'>".$space_item['p_stevilka'].", ".$space_item['mesto']."</h4>"; ?></td>
              <td><?php echo "<h4 class='text-justify font-weight-bold'>Address: </h4><h4 class='text-justify font-weight-bold text-info'>".$space_item['naslov']."</h4>"; ?></td>
      </tr>
</tbody>
</table>

<hr class="featurette-divider">
<h2 class='text-justify font-weight-bold'>Features</h2>
<table class="table text-center">
  <tbody>
    <tr>
        <td><?php 
        if($space_item['vozilo'] == 'yes'){
                echo "<h4 class='text-justify font-weight-bold text-info'>This storage can store veichles. </h4>"; 
        } else if ($space_item['vozilo'] == 'no'){
                echo "<h4 class='text-justify font-weight-bold'>This storage can't store veichles. </h4>"; 
        }

        ?></td>
    </tr>

<tr>
        <td><?php 
        if($space_item['lokacija'] != 'none'){
                echo "<h4 class='text-justify font-weight-bold text-info'>".$space_item['lokacija']."</h4>"; 
        }?></td>
        <td><?php 
                echo "<h4 class='text-justify font-weight-bold text-info'>".$space_item['opis_k']."</h4>"; ?>
                        
                </td>

</tr>

<tr>
        <td><?php 
        if($space_item['climate_controlled'] == '1'){
                echo "<h4 class='text-justify font-weight-bold text-info'>Climate controlled</h4>"; 
        }?></td>
        <td><?php 
        if($space_item['smoke_free'] == '1'){
                echo "<h4 class='text-justify font-weight-bold text-info'>Smoke free</h4>"; 
        }?></td>
        <td><?php 
        if($space_item['smoke_detectors'] == '1'){
                echo "<h4 class='text-justify font-weight-bold text-info'>Smoke detektors</h4>"; 
        }?></td>
        <td><?php 
        if($space_item['climate_controlled'] == '1'){
                echo "<h4 class='text-justify font-weight-bold text-info'>Climate controlled</h4>"; 
        }?></td>
        <td><?php 
        if($space_item['private_entrance'] == '1'){
                echo "<h4 class='text-justify font-weight-bold text-info'>Private entrance</h4>"; 
        }?></td>
        <td><?php 
        if($space_item['private_space'] == '1'){
                echo "<h4 class='text-justify font-weight-bold text-info'>Private space</h4>"; 
        }?></td>
        <td><?php 
        if($space_item['locked_area'] == '1'){
                echo "<h4 class='text-justify font-weight-bold text-info'>Locked area</h4>"; 
        }?></td>
        <td><?php 
        if($space_item['pet_free'] == '1'){
                echo "<h4 class='text-justify font-weight-bold text-info'>Pet free</h4>"; 
        }?></td>
        <td><?php 
        if($space_item['security_camera'] == '1'){
                echo "<h4 class='text-justify font-weight-bold text-info'>Security camera</h4>"; 
        }?></td>
        <td><?php 
        if($space_item['no_stairs'] == '1'){
                echo "<h4 class='text-justify font-weight-bold text-info'>No strairs</h4>"; 
        }?></td>
        

</tr>
</tbody>
</table>

<table class="table text-center">
          <tbody>
            <tr>
              <td><?php echo "<h5 class='text-justify font-weight-bold'>Description: </h4><h4 class='text-justify font-weight-bold text-info'>".$space_item['opis']."</h5>"; ?></td>
            </tr>
</tbody>
</table>

<hr class="featurette-divider">
<h2 class='text-justify font-weight-bold'>Vote this <?php echo $space_item['opis_k']; ?></h2>





<?php 
                /*$arr = $_SESSION['logged_in']; 
                if($space_item['id_u'] == $arr['id_u']){
                        echo "<p><a href=".site_url('news/edit/'.$space_item['id']).">Edit article</a></p>";
                        echo "<p><a onclick=".'"return confirm(&quot Are you sure you want to delete?&quot);"'." href=".site_url('news/delete/'.$space_item['id']).">Delete article</a></p>";
                }*/
                ?>


                <?php echo validation_errors(); ?>


                <?php echo form_open('news/vote'); ?>
                <input type="hidden" name="id_space" value=<?php echo $space_item['id_o']; ?>>
                <div id = "div_vote_space">
                        <div id="vote_space" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default">
                                        <input id = "location_select_radio_i" type="radio" name="vote_space" value="1"/> 1
                                </label>
                                <label class="btn btn-default">
                                        <input id = "location_select_radio_c" type="radio"  name="vote_space" value="2"/> 2
                                </label>
                                <label class="btn btn-default">
                                        <input id = "location_select_radio_u" type="radio"  name="vote_space" value="3"/> 3
                                </label>
                                <label class="btn btn-default">
                                        <input id = "location_select_radio_i" type="radio" name="vote_space" value="4"/> 4
                                </label>
                                <label class="btn btn-default">
                                        <input id = "location_select_radio_c" type="radio"  name="vote_space" value="5"/> 5
                                </label>
                        </div><input class="btn btn-primary" type="submit" name="submit" value="Vote" />
                </div><br>
        </form>

        
<hr class="featurette-divider">
<h2 class='text-justify font-weight-bold'>Comments</h2>

<?php echo form_open('news/comment'); ?>

<label for="comment">Post a comment</label>
<input class="form-control" type="textarea" name="comment" rows="4" /><br />
<input type="hidden" name="id_space" value=<?php echo $space_item['id_o']; ?>>
<input class = 'comment_button d-inline btn btn-primary text-decoration-none' type="submit" name="submit" value="Publish comment" />
</form>

<div class="row">
<?php foreach ($comment as $comment_item): ?>

        <div class="col-lg-4">
                <?php echo form_open("news/edit_comment"); ?>
                        <input type="hidden" name="id_ad_c" value="<?php echo $comment_item['id_o']; ?>">
                        <div id = "<?php echo "comment_div".$comment_item['id_ads']; ?>">
                        <h3 id="<?php echo "comment_title".$comment_item['id_ads']; ?>"><?php echo $comment_item['vsebina']; ?></h3>
                        </div>
                        <p id="<?php echo "comment_text".$comment_item['id_ads']; ?>"><?php echo $comment_item['username'].", ".$comment_item['datumura']; ?></p>
                </form>
                
        

        <?php 
        if(isset($_SESSION['logged_in'])){
               $arr = $_SESSION['logged_in']; 
               if($comment_item['id_u'] == $arr['id_u']){
                echo "<button onclick='comment_edit(".$comment_item['id_ads'].")' class = 'comment_button d-inline btn btn-secondary text-decoration-none'>Edit comment</button>";
                echo "<p class = 'comment_button d-inline btn btn-secondary text-decoration-none'><a onclick=".'"return confirm(&quot Are you sure you want to delete?&quot);"'." href=".site_url('news/delete_comment/'.$comment_item['id_ads']).">Delete comment</a></p>";
        } 
}
?>
</div>

<?php endforeach; ?>
</div>
</div>



