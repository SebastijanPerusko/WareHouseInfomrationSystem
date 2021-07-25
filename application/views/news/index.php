<!--<h2><?php /*echo $title;*/ ?></h2>-->

<?php echo $num_space; ?>
<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light rounded" aria-label="Eleventh navbar example">
    <div class="container-fluid">


      <div class="collapse navbar-collapse" id="navbarsExample09">
        <?php echo validation_errors(); ?>
        <?php echo form_open('news/index'); ?>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <input class="form-control col-lg-5" name = "city_name" type="text" 
            value="<?php if(isset($city_post)){ echo $city_post; } else { echo "";} ?>" 
            aria-label="Search">
          </li>
          <li class="nav-item text-center">
            <label class="btn btn-default">
              <input <?php if(isset($point_value) && $point_value == "all"){ echo "checked"; } else if(!isset($point_value)) { echo "checked";} ?> checked type="radio" name="type_storage" value="all"/> All storage
            </label>
            <label class="btn btn-default">
              <input <?php if(isset($point_value) && $point_value == "veichle"){ echo "checked"; } ?> type="radio"  name="type_storage" value="veichle"/> Veichle storage
            </label>
            <label class="btn btn-default">
              <input <?php if(isset($point_value) && $point_value == "object"){ echo "checked"; } ?> type="radio"  name="type_storage" value="object"/> Object storage
            </label>
          </li>
          <li class="nav-item">
            <p>Price</p>
          </li>
          <li class="nav-item">
            <input class="form-control col-lg-5" name = "start_price" type="text" value="<?php if(isset($price_from)){ echo $price_from; } else { echo "";} ?>" aria-label="Search">
          </li>
          <li class="nav-item align-middle">
            <p> to </p>
          </li>
          <li class="nav-item">
            <input class="form-control col-lg-5" name = "end_price" type="text" value="<?php if(isset($price_end)){ echo $price_end; } else { echo "";} ?>" aria-label="Search">
          </li>
          <li class="nav-item">
            <input type="submit" class="w-100 btn btn-primary btn-lg" name="submit" value="Find" />
          </li>
        </ul>

      </form>
    </div>
  </nav>
</div>




<div class="album py-5">
  <div class="container">

<?php $num_iteration = 0;?>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
<?php foreach ($space as $space_item): ?>

      
        <div class="col-4">
          <a class = "space_ad" href="<?php echo site_url('news/view/'.$space_item['id_o']); ?>">
          <div class="card shadow-sm">
            <img class="rounded-lg mx-auto d-block" src="<?php echo base_url($space_item['pot_slika']);?>" width="100%" height="225" alt="...">

            <div class="card-body">
              <p class="card-text"><?php echo $space_item['dolzina']."x"; echo $space_item['sirina']." "; echo ucfirst(str_replace("_", " ", $space_item['opis_k']))." in ".$space_item['mesto'].", ".$space_item['drzava']; ?></p>
              
            </div>
          </div>
          </a>
        </div>
      
      <hr class="featurette-divider">



<?php endforeach; ?>
</div>


  <div class="col-12 text-decoration-none">
      <nav aria-label="Page navigation example">
      <ul class="pagination">
        <?php $times = intval($num_space / 9);
        if($num_space % 9 >= 1) {$times++;} ?>
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <?php for($i = 0; $i < $times; $i++){ ?>
        <li class="page-item"><a class="page-link" href="<?php echo site_url('news/index/'.($i+1)); ?>"><?php echo ($i+1); ?></a></li>
        <?php } ?>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </nav>
  </div>


</div>

</div>
