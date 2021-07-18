function handleYesNo() { 
    if(document.getElementById("type_select_radio_no").checked == true){
      document.getElementById("div_type_no_select").hidden = false;
      document.getElementById("div_location_select").hidden = true;
      document.getElementById("div_indoor_select").hidden = true;
      document.getElementById("div_cover_select").hidden = true;
      document.getElementById("div_uncover_select").hidden = true;
    } else {
      document.getElementById("div_type_no_select").hidden = true;
      document.getElementById("div_location_select").hidden = false;
      document.getElementById("div_indoor_select").hidden = true;
      document.getElementById("div_cover_select").hidden = true;
      document.getElementById("div_uncover_select").hidden = true;
    }
}

function handleLocation() { 
    if(document.getElementById("location_select_radio_i").checked == true){
      document.getElementById("div_indoor_select").hidden = false;
      document.getElementById("div_cover_select").hidden = true;
      document.getElementById("div_uncover_select").hidden = true;
    } else if(document.getElementById("location_select_radio_c").checked == true){
      document.getElementById("div_indoor_select").hidden = true;
      document.getElementById("div_cover_select").hidden = false;
      document.getElementById("div_uncover_select").hidden = true;
    } else if(document.getElementById("location_select_radio_u").checked == true){
      document.getElementById("div_indoor_select").hidden = true;
      document.getElementById("div_cover_select").hidden = true;
      document.getElementById("div_uncover_select").hidden = false;
    }
}