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
                        $time_access = $time_access." "."<span class = 'fw-bold'>and an appointment is required before visiting the space.</span>";
                }

                ?>

                <?php
                if (isset($warning)) {
                    echo "<h2 class='text-justify font-weight-bold text-danger'>";
                    echo $warning;
                    echo "</h2>";
                } ?>
 
                <?php 
                      $name_space_first;
                      if($space_item['opis_k'] == 'self_s_u' || $space_item['opis_k'] == 'self_storage'){
                        $name_space_first = 'Self storage unit';
                      } else if ($space_item['opis_k'] == 'shipping_c' || $space_item['opis_k'] == 'shipping'){
                        $name_space_first = 'Shipping container';
                      } else {
                        $name_space_first = ucfirst(str_replace("_", " ", $space_item['opis_k']));
                      }
                ?>

                <div class="row featurette">
                      <div class="col-md-3 order-md-2">
                        <h2 class="featurette-heading display-5 fw-bold"><?php echo $name_space_first." in ".$space_item['mesto']; ?><div class="text-muted">
                                <?php echo form_open('news/reserve/'.$space_item['id_o']); ?>
                                <input class="w-100 btn btn-primary border border-danger" type="submit" name="submit" value="Reserve this space" />
                        </form></div></h2>
                        <p class="lead">
                                <?php

                                echo "<div class='card_padding_feature text-center'><div class='p-3 text-white bg-primary rounded-3'><h5>".$space_item['cena']."&euro;/month</h5></div></div>";

                                if($vote_ad_avg['vote_avg'] != NULL){
                                        echo "<div class='card_padding_feature text-center'><div class='p-3 text-white bg-primary rounded-3'><h5>Rating: ".substr($vote_ad_avg['vote_avg'], 0, 3)."</h5></div></div>";
                                }
                                ?>

                                <?php 
                                echo "<div class='card_padding_feature text-center'><div class='p-3 text-white bg-primary rounded-3'>";

                                echo "<h5>Size: ".$space_item['dolzina']." x ".$space_item['sirina']."m"."</h5>";

                                echo "</div></div>"; ?>


                                <?php

                                if($space_item['visina'] > 0){
                                        echo "<div class='card_padding_feature text-center'><div class='p-3 text-white bg-primary rounded-3'><h5>Height: ".$space_item['visina']."</h5></div></div>";
                                }

                                echo "<div class='card_padding_feature text-center'><div class='p-3 text-white bg-primary rounded-3'><h5>Storage Type: ".$space_item['opis_k']."</h5></div></div>";

                                echo "<div class='card_padding_feature text-center'><div class='p-3 text-white bg-primary rounded-3'><h5>You can access this space ".$space_item['gostota']." ".$time_access."</h5></div></div>";

                                ?>

                        </p>
                </div>
                <div class="col-md-9 order-md-1">
                        <img class="rounded-lg mx-auto d-block img-fluid" src="<?php echo base_url($space_item['pot_slika']);?>" width="100%" height="225" alt="...">

                </div>
        </div>
        <hr class="featurette-divider">
        <h2 class='text-justify display-5 fw-bold'>General information</h2>

        <table class="table text-center">
          <tbody>
            <tr>
              <td><?php echo "<h4 class='text-justify font-weight-bold'>Country: </h4><h4 class='text-justify font-weight-bold text-primary'>".$space_item['drzava']."</h4>"; ?></td>
              <td><?php echo "<h4 class='text-justify font-weight-bold'>City: </h4><h4 class='text-justify font-weight-bold text-primary'>".$space_item['p_stevilka'].", ".$space_item['mesto']."</h4>"; ?></td>
              <td><?php echo "<h4 class='text-justify font-weight-bold'>Address: </h4><h4 class='text-justify font-weight-bold text-primary'>".$space_item['naslov']."</h4>"; ?></td>
      </tr>
</tbody>
</table>



<hr class="featurette-divider">
<div class="container py-4">
<h2 class='text-justify display-5 fw-bold'>Features</h2>
<div class="row align-items-md-stretch">

        <?php 
        if($space_item['vozilo'] == 'yes'){
                echo "<div class='card_padding_feature col-md-3'><div class='h-100 p-5 text-white bg-primary rounded-3'><h2>This storage can store veichles</h2></div></div>"; 
        } else if ($space_item['vozilo'] == 'no'){
                echo "<div class='card_padding_feature col-md-3'><div class='h-100 p-5 text-white bg-primary rounded-3'><h2>This storage can't store veichles</h2></div></div>"; 
        }

        if($space_item['lokacija'] != 'none'){
                echo "<div class='card_padding_feature col-md-3 text-center'><div class='h-100 p-5 text-white bg-primary rounded-3'><h2>".$space_item['lokacija']."</h2></div></div>"; 
        }
        echo "<div class='card_padding_feature col-md-3 text-center'><div class='h-100 p-5 text-white bg-primary rounded-3'><h2>".$space_item['opis_k']."</h2></div></div>"; 
        if($space_item['climate_controlled'] == '1'){
                echo "<div class='card_padding_feature col-md-3 text-center'><div class='h-100 p-5 text-white bg-primary rounded-3'><h2>Climate controlled</h2></div></div>"; 
        }
        if($space_item['smoke_free'] == '1'){
                echo "<div class='card_padding_feature col-md-3 text-center'><div class='h-100 p-5 text-white bg-primary rounded-3'><h2>Smoke free</h2></div></div>"; 
        }
        if($space_item['smoke_detectors'] == '1'){
                echo "<div class='card_padding_feature col-md-3 text-center'><div class='h-100 p-5 text-white bg-primary rounded-3'><h2>Smoke detectors</h2></div></div>"; 
        }
        if($space_item['private_entrance'] == '1'){
                echo "<div class='card_padding_feature col-md-3 text-center'><div class='h-100 p-5 text-white bg-primary rounded-3'><h2>Private entrance</h2></div></div>"; 
        }
        if($space_item['private_space'] == '1'){
                echo "<div class='card_padding_feature col-md-3 text-center'><div class='h-100 p-5 text-white bg-primary rounded-3'><h2>Private space</h2></div></div>"; 
        }
        if($space_item['locked_area'] == '1'){
                echo "<div class='card_padding_feature col-md-3 text-center'><div class='h-100 p-5 text-white bg-primary rounded-3'><h2>Loked area</h2></div></div>"; 
        }
        if($space_item['pet_free'] == '1'){
                echo "<div class='card_padding_feature col-md-3 text-center'><div class='h-100 p-5 text-white bg-primary rounded-3'><h2>Pet free</h2></div></div>"; 
        }
        if($space_item['security_camera'] == '1'){
                echo "<div class='card_padding_feature col-md-3 text-center'><div class='h-100 p-5 text-white bg-primary rounded-3'><h2>Security camera</h2></div></div>"; 
        }
        if($space_item['no_stairs'] == '1'){
                echo "<div class='card_padding_feature col-md-3 text-center'><div class='h-100 p-5 text-white bg-primary rounded-3'><h2>No strairs</h2></div></div>"; 
        }
        ?>


<div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Description</h1>
        <p class="col-md-8 fs-4"><?php echo $space_item['opis']; ?></p>
      </div>
    </div>


<hr class="featurette-divider">
<h2 class='text-justify display-5 fw-bold'>Rate this <?php echo $space_item['opis_k']; ?></h2>





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
                                        <input <?php if($vote_ad['vrednost'] == "1"){ echo "checked"; } ?> id = "location_select_radio_i" type="radio" name="vote_space" value="1"/> 1
                                </label>
                                <label class="btn btn-default">
                                        <input <?php if($vote_ad['vrednost'] == "2"){ echo "checked"; } ?> id = "location_select_radio_c" type="radio"  name="vote_space" value="2"/> 2
                                </label>
                                <label class="btn btn-default">
                                        <input <?php if($vote_ad['vrednost'] == "3"){ echo "checked"; } ?> id = "location_select_radio_u" type="radio"  name="vote_space" value="3"/> 3
                                </label>
                                <label class="btn btn-default">
                                        <input <?php if($vote_ad['vrednost'] == "4"){ echo "checked"; } ?> id = "location_select_radio_i" type="radio" name="vote_space" value="4"/> 4
                                </label>
                                <label class="btn btn-default">
                                        <input <?php if($vote_ad['vrednost'] == "5"){ echo "checked"; } ?> id = "location_select_radio_c" type="radio"  name="vote_space" value="5"/> 5
                                </label>
                        </div><input class="btn btn-primary" type="submit" name="submit" value="Vote" />
                </div><br>
        </form>
        <?php
        if(isset($_SESSION['logged_in'])){
               $arr = $_SESSION['logged_in']; 
               if($vote_ad['id_u'] == $arr['id_u']){
                        echo "<p class = 'comment_button d-inline btn btn-lg btn-outline-primary text-decoration-none'><a onclick=".'"return confirm(&quot Are you sure you want to delete?&quot);"'." href=".site_url('news/delete_vote/'.$vote_ad['id']).">Delete vote</a></p>";
                }
        } 

        ?>

        
<hr class="featurette-divider">
<h2 class='text-justify display-5 fw-bold'>Comments</h2>

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
                echo "<button onclick='comment_edit(".$comment_item['id_ads'].")' class = 'comment_button d-inline btn btn-lg btn-outline-primary text-decoration-none'>Edit comment</button>";
                echo "<p class = 'comment_button d-inline btn btn-lg btn-outline-primary text-decoration-none'><a onclick=".'"return confirm(&quot Are you sure you want to delete?&quot);"'." href=".site_url('news/delete_comment/'.$comment_item['id_ads']).">Delete comment</a></p>";
        } 
}
?>
</div>

<?php endforeach; ?>
</div>
</div>



