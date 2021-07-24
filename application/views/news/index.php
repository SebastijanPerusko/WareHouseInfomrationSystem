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
      </div>
    </nav>






<div class="container py-3">

<?php $num_iteration = 0;?>

<div class='row row-cols-1 row-cols-md-3 mb-3 text-center'>
<?php foreach ($space as $space_item): ?>

        <div class="col-4 text-decoration-none">
        <a class = "space_ad" href="<?php echo site_url('news/view/'.$space_item['id_o']); ?>">
        <div class="border-primary card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3 text-white bg-primary border-primary">
            <h5 class="my-0 fw-normal"> <?php echo $space_item['dolzina']."x"; echo $space_item['sirina']." "; echo ucfirst(str_replace("_", " ", $space_item['opis_k']))." in ".$space_item['mesto'].", ".$space_item['drzava']; ?></h5>
          </div>
          <div class="card-body">
            <h4 class="card-title "><?php echo $space_item['cena'] ?>/month</small></h4>
            <h4 class="card-title ">Features:</small></h4>
            <ul class="list-unstyled mt-3 mb-4">
              <li>
                <?php
                        if($space_item['climate_controlled'] == 1){
                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-thermometer-snow" viewBox="0 0 16 16">
                                  <path d="M5 12.5a1.5 1.5 0 1 1-2-1.415V9.5a.5.5 0 0 1 1 0v1.585A1.5 1.5 0 0 1 5 12.5z"/>
                                  <path d="M1 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0V2.5zM3.5 1A1.5 1.5 0 0 0 2 2.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0L5 10.486V2.5A1.5 1.5 0 0 0 3.5 1zm5 1a.5.5 0 0 1 .5.5v1.293l.646-.647a.5.5 0 0 1 .708.708L9 5.207v1.927l1.669-.963.495-1.85a.5.5 0 1 1 .966.26l-.237.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.884.237a.5.5 0 1 1-.26.966l-1.848-.495L9.5 8l1.669.963 1.849-.495a.5.5 0 1 1 .258.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.237.883a.5.5 0 1 1-.966.258L10.67 9.83 9 8.866v1.927l1.354 1.353a.5.5 0 0 1-.708.708L9 12.207V13.5a.5.5 0 0 1-1 0v-11a.5.5 0 0 1 .5-.5z"/>
                                </svg>';
                        }
                ?>
              </li>
            </ul>
          </div>
        </div>
        </a>
      </div>
      <hr class="featurette-divider">



<?php endforeach; ?>

  <div class="col-12 text-decoration-none">
      <nav aria-label="Page navigation example">
      <ul class="pagination">
        <?php $times = intval($num_space / 9);
        if($num_space % 9 >= 1) {$times++;} echo $times; $i; ?>
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