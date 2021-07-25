<div class = "container">
   <main>

      <?php echo validation_errors(); ?>
      <?php echo form_open_multipart('news/create'); ?>

      <div class="py-5 text-center">
         <h2>Checkout form</h2>
         <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
      </div>

      <div class="row">


         <div id = "select_type_container" class = "col-12 text-center">
            <h4 class="mb-3">General information about you space</h4>
            <div id = "div_type_select" class = "text-center">
               <label for="type_select_radio" class = "font-weight-bold">Can your space store a vehicle?</label><br>
               <div id="type_select" class="btn-group" data-toggle="buttons">
                  <input id = "type_select_radio_yes" class="btn-check" type="radio" name="type_select_radio" value="yes" onchange="handleYesNo();"/> Yes
                  <input id = "type_select_radio_no" class="btn-check" type="radio"  name="type_select_radio" value="no" onchange="handleYesNo();"/> No
               </div>
            </div>


            <div id = "div_type_no_select" class = "col-12 text-center">
               <label for="type_no_select" class = "font-weight-bold">Which best describes your storage?</label><br>
               <div id="type_select_no" class="text-center" data-toggle="buttons">
                  <label class="btn btn-default active">
                  <input type="radio" name="type_select_no" value="attic"/> Attic
                  </label>
                  <label class="btn btn-default">
                  <input type="radio"  name="type_select_no" value="basement"/> Basement
                  </label>
                  <label class="btn btn-default">
                  <input type="radio"  name="type_select_no" value="bedroom"/> Bedroom
                  </label>
                  <label class="btn btn-default">
                  <input type="radio"  name="type_select_no" value="garage"/> Garage
                  </label>
                  <label class="btn btn-default">
                  <input type="radio"  name="type_select_no" value="self_s_u"/> Self storage unit
                  </label>
                  <label class="btn btn-default">
                  <input type="radio"  name="type_select_no" value="shed"/> Shed
                  </label>
                  <label class="btn btn-default">
                  <input type="radio"  name="type_select_no" value="shipping_c"/> Shipping container
                  </label>
                  <label class="btn btn-default">
                  <input type="radio"  name="type_select_no" value="warehouse"/> Warehouse
                  </label>
               </div>
            </div>




            <div id = "div_location_select" class = "col-12 text-center">
               <label for="location_select" class = "font-weight-bold">Which best describes your space?</label><br>
               <div id="type_select_yes" class="btn-group" data-toggle="buttons">
                  <label class="btn btn-default active">
                  <input id = "location_select_radio_i" type="radio" name="type_select_yes" value="indoor" onchange="handleLocation();"/> Indoor
                  </label>
                  <label class="btn btn-default">
                  <input id = "location_select_radio_c" type="radio"  name="type_select_yes" value="cover" onchange="handleLocation();"/> Outdoor-covered
                  </label>
                  <label class="btn btn-default">
                  <input id = "location_select_radio_u" type="radio"  name="type_select_yes" value="uncover" onchange="handleLocation();"/> Outdoor-uncovered
                  </label>
               </div>
            </div>

            <div id = "div_indoor_select" class = "col-12 text-center">
               <label for="indoor_select" class = "font-weight-bold">Which best describes your indoor vehicle storage?</label><br>
               <div id="indoor_select" class="btn-group" data-toggle="buttons">
                  <label class="btn btn-default active">
                  <input type="radio" name="indoor_select" value="garage"/> Garage
                  </label>
                  <label class="btn btn-default">
                  <input type="radio"  name="indoor_select" value="self_storage"/> Self storage unit
                  </label>
                  <label class="btn btn-default">
                  <input type="radio"  name="indoor_select" value="shed"/> Shed
                  </label>
                  <label class="btn btn-default">
                  <input type="radio"  name="indoor_select" value="shipping"/> Shipping container
                  </label>
                  <label class="btn btn-default">
                  <input type="radio"  name="indoor_select" value="warehouse"/> Warehouse
                  </label>
               </div>
            </div>

            <div id = "div_cover_select" class = "col-12 text-center">
               <label for="cover_select" class = "font-weight-bold">Which best describes your covered outdoor vehicle storage?</label><br>
               <div id="cover_select" class="btn-group" data-toggle="buttons">
                  <label class="btn btn-default active">
                  <input type="radio" name="cover_select" value="carport"/> Carport
                  </label>
                  <label class="btn btn-default">
                  <input type="radio"  name="cover_select" value="parking_lot"/> Parking lot
                  </label>
               </div>
            </div>


            <div id = "div_uncover_select" class = "col-12 text-center">
               <label for="uncover_select" class = "font-weight-bold">Which best describes your uncovered outdoor vehicle storage?</label><br>
               <div id="uncover_select" class="btn-group" data-toggle="buttons">
                  <label class="btn btn-default active">
                  <input type="radio" name="uncover_select" value="driveway"/> Driveway
                  </label>
                  <label class="btn btn-default">
                  <input type="radio"  name="uncover_select" value="parking_lot"/> Parking lot
                  </label>
                  <label class="btn btn-default">
                  <input type="radio"  name="uncover_select" value="unpawed_lot"/> Unpawed lot
                  </label>
                  <label class="btn btn-default">
                  <input type="radio"  name="uncover_select" value="street_parking"/> Street parking
                  </label>
               </div>
            </div>
         </div>

         <div id = "" class = "col-12 text-center">
            <h4 class="mb-3">General information about you space</h4><br>
         </div>
         <div class="col-md-3">
            <label for="country">Country</label>
            <input class="form-control" type="text" name="country" /><br />
         </div>

         <div class="col-md-3">
             <label for="city">City</label>
            <input class="form-control" type="text" name="city" /><br />
         </div>

         <div class="col-md-3">
            <label for="paddress">postal address</label>
            <input class="form-control" type="text" name="paddress" /><br />
         </div>

         <div class="col-md-3">
            <label for="Address">Address</label>
            <input class="form-control" type="text" name="address" /><br />
         </div>


         <div id = "" class = "col-12 text-center">
            <h4 class="mb-3">Describe your space</h4><br>
         </div>
         <div id = "" class = "col-12 text-center">
         <label for="text">Description</label>
         <textarea class="form-control" name="text"></textarea>
         </div>


         <div id = "" class = "col-12 text-center">
            <h4 class="mb-3">How big is your space</h4><br>
         </div>
         <div class="col-md-5">
            <label for="length">Length</label>
            <input class="form-control" type="text" name="length" /><br />
         </div>

         <div class="col-md-4">
            <label for="width">Width</label>
            <input class="form-control" type="text" name="width" /><br />
         </div>

         <div class="col-md-3">
            <label for="height">Height</label>
            <input class="form-control" type="text" name="height" /><br />
         </div>
            
            
            
         </div>


         <div id = "" class = "col-12 text-center">
            <h4 class="mb-3">Set the price</h4><br>
         </div>
         <div id = "" class = "col-12 text-center">
         <label for="price">Price</label>
         <input type="number" name="price" /><br />
         </div>


         <div id = "" class = "col-12 text-center">
            <h4 class="mb-3">Visits</h4><br>
         </div>
         <div id = "" class = "col-12 text-center">
         <label for="need_owner">Accessible only with the owner</label>
         <input type="checkbox" name="need_owner" value="yes"/><br />
         <div id = "div_often_visit">
            <label for="often_visit">How often the renters can access their items?</label><br>
            <div id="often_visit" class="btn-group" data-toggle="buttons">
               <label class="btn btn-default active">
               <input id = "location_select_radio_i" type="radio" name="often_visit" value="daily"/> Daily
               </label>
               <label class="btn btn-default">
               <input id = "location_select_radio_c" type="radio"  name="often_visit" value="weekly"/> Weekly
               </label>
               <label class="btn btn-default">
               <input id = "location_select_radio_u" type="radio"  name="often_visit" value="monthly"/> Monthly
               </label>
            </div>
         </div>
         </div>

         <div id = "" class = "col-12 text-center">
            <div id = "div_day_visit">
               <label for="day_visit">What time of the day can renters access their items</label><br>
               <div id="day_visit" class="btn-group" data-toggle="buttons">
                  <label class="btn btn-default active">
                  <input id = "location_select_radio_i" type="radio" name="day_visit" value="daytime"/> Daytime(8am-8pm)
                  </label>
                  <label class="btn btn-default">
                  <input id = "location_select_radio_c" type="radio"  name="day_visit" value="evening"/> Evening(5pm-9pm)
                  </label>
                  <label class="btn btn-default">
                  <input id = "location_select_radio_u" type="radio"  name="day_visit" value="all_day"/> 24 hours a day
                  </label>
               </div>
            </div>
         </div>


         <div id = "" class = "col-12 text-center">
            <h4 class="mb-3">Features</h4><br>
         </div>

         <div id = "" class = "col-12 text-center">
            <label for="climate_controlled">Climate controlled</label>
            <input type="checkbox" name="climate_controlled" value="yes"/><br />
            <label for="smoke_free">Smoke free</label>
            <input type="checkbox" name="smoke_free" value="yes"/><br />
            <label for="smoke_detectors">Smoke detectors</label>
            <input type="checkbox" name="smoke_detectors" value="yes"/><br />
            <label for="private_entrance">Private Entrance</label>
            <input type="checkbox" name="private_entrance" value="yes"/><br />
            <label for="private_space">Private space</label>
            <input type="checkbox" name="private_space" value="yes"/><br />
            <label for="locked_area">Locked area</label>
            <input type="checkbox" name="locked_area" value="yes"/><br />
            <label for="pet_free">Pet free</label>
            <input type="checkbox" name="pet_free" value="yes"/><br />
            <label for="security_camera">Security Camera</label>
            <input type="checkbox" name="security_camera" value="yes"/><br />
            <label for="no_stairs">No stairs</label>
            <input type="checkbox" name="no_stairs" value="yes"/><br />
         </div>

         <div id = "" class = "col-12 text-center">
            <h4 class="mb-3">Features</h4><br>
         </div>
         <div id = "" class = "col-12 text-center">
            <input type="file" name="userfile" size="2000" />
         </div>
         <input type="submit" class="w-100 btn btn-primary btn-lg" name="submit" value="List your space" />
   </div>
   </main>
</div>
</div>
</div>
</form>



