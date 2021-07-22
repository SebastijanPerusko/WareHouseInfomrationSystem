<!--<h2><?php /*echo $title;*/ ?></h2>-->

<div class="container py-3">


        <h3><?php echo $space_item['opis_k']." in ".$space_item['mesto']; ?></h3>
        <div class="main">
                <?php echo "Size: ".$space_item['dolzina']." x ".$space_item['sirina']."<br>"; ?>
                <?php echo "Storage Type: ".$space_item['opis_k']."<br>"; ?>
                <?php echo "Access: ".$space_item['gostota']."<br>"; ?>
                <?php echo "Hours: ".$space_item['cas']."<br>"; ?>
                <?php echo "Description: ".$space_item['opis']."<br>"; ?>
                <?php echo "Description: ".$space_item['climate_controlled']."<br>"; ?>
        </div>

        



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
                <label for="vote_space">Vote this <?php echo $space_item['opis_k']; ?></label><br>
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
        </div><input type="submit" name="submit" value="Create news item" />
        </div><br>
        </form>

        <?php echo form_open('news/reserve/'.$space_item['id_o']); ?>
                <input type="submit" name="submit" value="Reserve this space" />
        </form>


        <?php echo form_open('news/comment'); ?>

        <label for="comment">Post a comment</label>
            <input type="textarea" name="comment" /><br />
            <input type="hidden" name="id_space" value=<?php echo $space_item['id_o']; ?>>
            <input type="submit" name="submit" value="Create news item" />
        </form>



        $comment_id = 0;

        <?php foreach ($comment as $comment_item): ?>

        <h3><?php echo $comment_item['vsebina']; ?></h3>
        <div class="main">
                <?php echo $comment_item['username'].$comment_item['datumura']; ?>
        </div>

        <?php 
                if(isset($_SESSION['logged_in'])){
                       $arr = $_SESSION['logged_in']; 
                        if($comment_item['id_u'] == $arr['id_u']){
                                echo "<p><a href=".site_url('news/edit_comment/'.$comment_item['id']).">Edit comment</a></p>";
                                echo "<p><a onclick=".'"return confirm(&quot Are you sure you want to delete?&quot);"'." href=".site_url('news/delete_comment/'.$comment_item['id_ads']).">Delete comment</a></p>";
                        } 
                }
                
        ?>

        <?php endforeach; ?>

</div>

