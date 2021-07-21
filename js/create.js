function handleYesNo() { 
    if(document.getElementById("type_select_radio_no").checked == true){
      document.getElementById("div_type_no_select").style.display = "block";
      document.getElementById("div_location_select").style.display = "none";
      document.getElementById("div_indoor_select").style.display = "none";
      document.getElementById("div_cover_select").style.display = "none";
      document.getElementById("div_uncover_select").style.display = "none";

      
      document.getElementById("div_location_select").checked = false;
      document.getElementById("div_indoor_select").checked = false;
      document.getElementById("div_cover_select").checked = false;
      document.getElementById("div_uncover_select").checked = false;
      document.getElementById("div_indoor_select").style.display = false;
      document.getElementById("div_cover_select").style.display = false;
      document.getElementById("div_uncover_select").style.display = false;
    } else {
      document.getElementById("div_type_no_select").style.display = "none";
      document.getElementById("div_location_select").style.display = "block";
      document.getElementById("div_indoor_select").style.display = "none";
      document.getElementById("div_cover_select").style.display = "none";
      document.getElementById("div_uncover_select").style.display = "none";

      document.getElementById("div_type_no_select").checked = false;
      document.getElementById("div_indoor_select").checked = false;
      document.getElementById("div_cover_select").checked = false;
      document.getElementById("div_uncover_select").checked = false;
      document.getElementById("div_indoor_select").style.display = false;
      document.getElementById("div_cover_select").style.display = false;
      document.getElementById("div_uncover_select").style.display = false;
    }
}

function handleLocation() { 
    if(document.getElementById("location_select_radio_i").checked == true){
      document.getElementById("div_indoor_select").style.display = "block";
      document.getElementById("div_cover_select").style.display = "none";
      document.getElementById("div_uncover_select").style.display = "none";
    } else if(document.getElementById("location_select_radio_c").checked == true){
      document.getElementById("div_indoor_select").style.display = "none";
      document.getElementById("div_cover_select").style.display = "block";
      document.getElementById("div_uncover_select").style.display = "none";
    } else if(document.getElementById("location_select_radio_u").checked == true){
      document.getElementById("div_indoor_select").style.display = "none";
      document.getElementById("div_cover_select").style.display = "none";
      document.getElementById("div_uncover_select").style.display = "block";
    }
}