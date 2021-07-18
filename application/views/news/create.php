<!--<h2><?php echo $title; ?></h2>-->

<?php echo validation_errors(); ?>

<?php echo form_open('news/create'); ?>

    <h2>General information</h2><br>

    <div id = "div_type_select">
    <label for="type_select">Can your space store a vehicle?</label><br>
    <div id="type_select" class="btn-group" data-toggle="buttons">
        <label class="btn btn-default">
            <input id = "type_select_radio_yes" type="radio" name="type_select_radio" value="yes" onchange="handleYesNo();"/> Yes
        </label>
        <label class="btn btn-default">
            <input id = "type_select_radio_no" type="radio"  name="type_select_radio" value="no" onchange="handleYesNo();"/> No
        </label>
    </div></div><br>

    <div hidden id = "div_type_no_select">
    <label for="type_no_select">Which best describes your storage?</label><br>
    <div id="type_select_no" class="btn-group" data-toggle="buttons">
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
    </div></div><br>

    <div hidden id = "div_location_select">
    <label for="location_select">Which best describes your space?</label><br>
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
    </div></div><br>


    <div hidden id = "div_indoor_select">
    <label for="indoor_select">Which best describes your indoor vehicle storage?</label><br>
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
    </div></div><br>

    <div hidden id = "div_cover_select">
    <label for="cover_select">Which best describes your covered outdoor vehicle storage?</label><br>
    <div id="cover_select" class="btn-group" data-toggle="buttons">
        <label class="btn btn-default active">
            <input type="radio" name="cover_select" value="carport"/> Carport
        </label>
        <label class="btn btn-default">
            <input type="radio"  name="cover_select" value="parking_lot"/> Parking lot
        </label>
    </div></div><br>

    <div hidden id = "div_uncover_select">
    <label for="uncover_select">Which best describes your uncovered outdoor vehicle storage?</label><br>
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
            <input type="radio"  name="uncover_select" value="street_parking"/> Parking lot
        </label>
    </div></div><br>


    <h2>What’s the address of your space?</h2><br>

    <label for="country">Country</label>
    <input type="text" name="country" /><br />

    <label for="city">City</label>
    <input type="text" name="city" /><br />

    <label for="paddress">postal address</label>
    <input type="number" name="paddress" /><br />

    <label for="Address">Address</label>
    <input type="text" name="address" /><br />

    <h2>Describe your space</h2><br>

    <label for="text">Description</label>
    <textarea name="text"></textarea><br />


    <h2>How big is your space?</h2><br>

    <label for="length">Length</label>
    <input type="text" name="length" /><br />

    <label for="width">Width</label>
    <input type="text" name="width" /><br />

    <label for="height">Height</label>
    <input type="text" name="height" /><br />

    <h2>Set the price</h2><br>

    <label for="price">Price</label>
    <input type="number" name="price" /><br />


    <h2>Visits</h2><br>

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
    </div></div><br>

    <div id = "div_day_visit">
    <label for="day_visit">What time of the day can renters access their items</label><br>
    <div id="day_visit" class="btn-group" data-toggle="buttons">
        <label class="btn btn-default active">
            <input id = "location_select_radio_i" type="radio" name="day_visit" value="daytime"/> Daytime(8am -8pm)
        </label>
        <label class="btn btn-default">
            <input id = "location_select_radio_c" type="radio"  name="day_visit" value="evening"/> Evening(5pm - 9pm)
        </label>
        <label class="btn btn-default">
        <input id = "location_select_radio_u" type="radio"  name="day_visit" value="all_day"/> 24 hours a day
        </label>
    </div></div><br>


    <h2>Features</h2>

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

    

    <input type="submit" name="submit" value="Create news item" />

</form>