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

function comment_edit(num){
  var content = document.getElementById("comment_title"+num).textContent;
  var php_code_comment = '<?php echo form_open("news/edit_comment"); ?>';
  /*document.getElementById("comment_div"+num).innerHTML = 
  '<?php echo form_open("news/edit_comment"); ?><input type="hidden" name="id_comment" value="'+num+'"><input type="textarea" name="comment" value="'+content+'" /><br /><input type="submit" name="submit" value="Modify comment" /></form>';*/
  document.getElementById("comment_div"+num).innerHTML =
  '<input type="hidden" name="id_comment" value="'+num+'"><input type="textarea" name="comment" value="'+content+'" /><br /><input type="submit" name="submit" value="Modify comment" />';  
}

function submit_search(){
  document.getElementById('form_search_a').submit();
}

