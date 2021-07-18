<!--<h2><?php echo $title; ?></h2>-->

<?php echo validation_errors(); ?>

<?php echo form_open('news/create'); ?>

    <h2>General information</h2>

    <label for="vehicle">Can your space store a vehicle?</label>
    <select name="type">
        <option>Yes</option>
        <option>No</option>
    </select><br />

    <label for="location">Which best describes your space?</label>
    <select name="location">
        <option value="indoor">Indoor</option>
        <option value="covered">Outdoor-covered</option>
        <option value="uncovered">Outdoor-uncovered</option>
    </select><br />

    <div id="color-switch" class="btn-group" data-toggle="buttons">
        <label class="btn btn-default active">
            <input type="radio" name="indoor" value="indoor"/> Indoor
        </label>
        <label class="btn btn-default">
            <input type="radio"  name="cover" value="cover"/> Outdoor-covered
        </label>
        <label class="btn btn-default">
        <input type="radio"  name="uncover" value="uncover"/> Outdoor-uncovered
        </label>
    </div>

    <label for="type">Which best describes your storage?</label>
    <select name="type">
        <option value="indoor">Indoor</option>
        <option value="covered">Outdoor-covered</option>
        <option value="uncovered">Outdoor-uncovered</option>
    </select><br />





    <label for="text">Description</label>
    <textarea name="text"></textarea><br />

    <label for="price">Price</label>
    <input type="number" name="price" /><br />

    

    <label for="country">Country</label>
    <input type="text" name="country" /><br />

    <label for="city">City</label>
    <input type="text" name="city" /><br />

    <label for="paddress">postal address</label>
    <input type="number" name="paddress" /><br />

    <label for="Address">Address</label>
    <input type="text" name="address" /><br />

    <h2>Proprieties</h2>

    <label for="length">Length</label>
    <input type="text" name="length" /><br />

    <label for="width">Width</label>
    <input type="text" name="width" /><br />

    <label for="height">Height</label>
    <input type="text" name="height" /><br />

    

    

    <label for="undercover">Outdoor - Undercover</label>
    <input type="checkbox" name="undercover" value="yes"/><br />

    <label for="indoor">Indoor</label>
    <input type="checkbox" name="indoor" value="yes"/><br />

    <label for="outdoor">Outdoor - Covered</label>
    <input type="checkbox" name="outdoor" value="yes"/><br />

    <h2>Which best describes your space?</h2>


    <label for="storage_unit">Storage Unit</label>
    <input type="checkbox" name="storage_unit" value="yes"/><br />

    <label for="storage_cage">Storage Cage</label>
    <input type="checkbox" name="inside" value="yes"/><br />

    <label for="garage">Garage</label>
    <input type="checkbox" name="garage" value="yes"/><br />

    <label for="shed">Shed</label>
    <input type="checkbox" name="shed" value="yes"/><br />

    <label for="warehouse">Warehouse</label>
    <input type="checkbox" name="warehouse" value="yes"/><br />

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

    <label for="need_owner">Accessible only with the owner</label>
    <input type="checkbox" name="need_owner" value="yes"/><br />

    <label for="need_owner">Accessible only with the owner</label>
    <input type="checkbox" name="need_owner" value="yes"/><br />

    <input type="submit" name="submit" value="Create news item" />

</form>