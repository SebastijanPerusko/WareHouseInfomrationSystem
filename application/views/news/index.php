<!--<h2><?php /*echo $title;*/ ?></h2>-->

<?php 

    /*echo "city_post ".$_SESSION['city_post']."<br>"; 
    echo "point_value ".$_SESSION['point_value']."<br>"; 
    echo "point_value_size ".$_SESSION['point_value_size']."<br>"; 
    echo "price_from ".$_SESSION['price_from']."<br>"; 
    echo "price_end ".$_SESSION['price_end']."<br>"; 
    echo "num_space ".$_SESSION['num_space']."<br>"; */


?>



<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">


      <div class="collapse navbar-collapse">
        <?php echo validation_errors(); ?>
        <?php 
        $attributes = array('id' => 'form_search_a');
        echo form_open('news/index', $attributes); 
        ?>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <input class="form-control" name = "city_name" type="text" placeholder="Select the city" 
            value="<?php if(isset($_SESSION['city_post'])){ echo $_SESSION['city_post']; } else { echo "";} ?>" 
            aria-label="Search">
          </li>

          <li class="nav-item text-center">
            <select class="form-select" name="type_storage" aria-label="Default select example">
              <option <?php if(isset($_SESSION['point_value']) && $_SESSION['point_value'] == "all"){ echo "selected"; } else if(!isset($point_value)) { echo "selected";} ?> value="all">All storages</option>
              <option <?php if(isset($_SESSION['point_value']) && $_SESSION['point_value'] == "veichle"){ echo "selected"; } ?> value="veichle">Veichle storage</option>
              <option <?php if(isset($_SESSION['point_value']) && $_SESSION['point_value'] == "object"){ echo "selected"; } ?> value="object">Object storage</option>
            </select>
          </li>


          <li class="nav-item text-center">
            <select class="form-select" name="size_storage">
              <option <?php if(isset($_SESSION['point_value_size']) && $_SESSION['point_value_size'] == "any_size"){ echo "selected"; } else if(!isset($point_value_size)) { echo "selected";} ?> value="any_size">All sizes</option>
              <option <?php if(isset($_SESSION['point_value_size']) && $_SESSION['point_value_size'] == "extra_small"){ echo "selected"; } ?> value="extra_small">Extra small - less than 5x5</option>
              <option <?php if(isset($_SESSION['point_value_size']) && $_SESSION['point_value_size'] == "small"){ echo "selected"; } ?> value="small">Small - from 5x5 to 10x10 </option>
              <option <?php if(isset($_SESSION['point_value_size']) && $_SESSION['point_value_size'] == "medium"){ echo "selected"; } ?> value="medium">Medium - from 10x10 to 15x15</option>
              <option <?php if(isset($_SESSION['point_value_size']) && $_SESSION['point_value_size'] == "large"){ echo "selected"; } ?> value="large">Large - from 15x15</option>
            </select>
          </li>
          



          <!--<li class="nav-item">
            <p>Price from</p>
          </li>-->
          <li class="nav-item">
            <input class="form-control col-lg-1" name = "start_price" type="text" placeholder = "Price from" value="<?php if(isset($_SESSION['price_from'])){ echo $_SESSION['price_from']; } else { echo "";} ?>" aria-label="Search">
          </li>
          <!--<li class="nav-item align-middle">
            <p> to </p>
          </li>-->
          <li class="nav-item">
            <input class="form-control col-lg-5" name = "end_price" type="text" placeholder = "Price to" value="<?php if(isset($_SESSION['price_end'])){ echo $_SESSION['price_end']; } else { echo "";} ?>" aria-label="Search">
          </li>
          <li class="nav-item">
            <button type="button" class="btn btn-primary">Primary</button>
          </li>
          <li class="nav-item">
            <input id = "form_search_b" type="submit" class="btn btn-primary" name="submit1" value="Find" />
          </li>
        </ul>

      </form>
    </div>
  </nav>
</div>




<div class="album py-5 bg-light">
  <div class="container">

<?php $num_iteration = 0;?>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
<?php foreach ($space as $space_item): ?>

      
        <div class="col">
          <a class = "space_ad" href="<?php echo site_url('news/view/'.$space_item['id_o']); ?>">
          <div class="card shadow-sm">
            <div class="container_image_index">
              <img class="rounded-lg mx-auto d-block" src="<?php echo base_url($space_item['pot_slika']);?>" width="100%" height="225" alt="...">
              <div class="text-over-image bottom-left_index rounded-pill"><h3 class=""><?php echo $space_item['sirina']."X".$space_item['dolzina']; ?></h3></div>
              <div class="text-over-image bottom-right_index rounded-pill"><h3 class=""><?php echo $space_item['cena']."/month"; ?></h3></div>
            </div>

            <div class="card-body bg-primary">
              <p class="card-text text-index-white font-weight-bold"><?php echo $space_item['dolzina']."x"; echo $space_item['sirina']." "; echo ucfirst(str_replace("_", " ", $space_item['opis_k']))." in ".$space_item['mesto'].", ".$space_item['drzava']; ?></p>
              
            </div>
          </div>
          </a>
        </div>


<?php endforeach; ?>
</div>


  <div class="col-12 text-decoration-none">
      <nav aria-label="Page navigation example">
      <ul class="pagination">
        <?php $times = intval($num_space / 12);
        if($num_space % 12 >= 1) {$times++;} 
        ?>

        <?php for($i = 0; $i < $times; $i++){ ?>
        <li class="page-item <?php if($current_page == ($i+1)){echo " active"; }  ?>"><a class="page-link" href="<?php echo site_url('news/index/'.($i+1)); ?>"><?php echo ($i+1); ?></a></li>
        <?php } ?>

      </ul>
    </nav>
  </div>


</div>

</div>




