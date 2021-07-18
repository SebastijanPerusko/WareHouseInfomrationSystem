<?php
class News_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_news($slug = FALSE)
		{
	        if ($slug === FALSE)
	        {
	                $query = $this->db->get('oglas');
	                return $query->result_array();
	        }

	        $query = $this->db->get_where('news', array('slug' => $slug));
	        return $query->row_array();
        }


        public function set_news()
		{
		    $this->load->helper('url');

		    $slug = url_title($this->input->post('title'), 'dash', TRUE);
		    $arr = $_SESSION['logged_in'];
		    $location;
		    $description_s;
		    $owner_need_v;
		    $c_c;
		    $s_f;
		    $s_d;
		    $p_e;
		    $p_s;
		    $l_a;
		    $p_f;
		    $s_c;
		    $n_s;




		    if(isset($_POST['type_select_radio']) && $_POST['type_select_radio'] == 'yes') {
		    	if(isset($_POST['type_select_yes'])) {
		    		$location = $_POST['type_select_yes'];
		    	}
		    	if(isset($_POST['indoor_select'])) {
		    		$description_s = $_POST['indoor_select'];
		    	}
		    	if(isset($_POST['cover_select'])) {
		    		$description_s = $_POST['cover_select'];
		    	}
		    	if(isset($_POST['uncover_select'])) {
		    		$description_s = $_POST['uncover_select'];
		    	}
			} else {
				$location = "none";
				if(isset($_POST['type_select_no'])) {
		    		$description_s = $_POST['type_select_no'];
		    	}
			}


			if(isset($_POST['need_owner']) && 
   				$_POST['need_owner'] == 'yes') 
			{
				$owner_need_v = "yes";
			} else {
				$owner_need_v = "no";
			}



			//$_POST["title"] = $this->input->post('title')
		    $data = array(
		    	'vozilo' => $this->input->post('type_select_radio'),
		    	'lokacija' => $location,
		    	'opis_k' => $description_s,
		    	'opis' => $this->input->post('text'),
		        'cena' => $this->input->post('price'),
		        'drzava' => $this->input->post('country'),
		        'mesto' => $this->input->post('city'),
		        'p_stevilka' => $this->input->post('paddress'),
		        'naslov' => $this->input->post('address'),
		        'dolzina' => $this->input->post('length'),
		        'sirina' => $this->input->post('width'),
		        'visina' => $this->input->post('height'),
		        'lastnik_ogled' => $owner_need_v,
		        'gostota' => $this->input->post('often_visit'),
		        'cas' => $this->input->post('day_visit'),
		        'id_u' => $arr['id_u']
		    );



		    $this->db->insert('oglas', $data);

		    $this->db->insert_id();
		    $last_id = $this->db->insert_id();

		    if(isset($_POST['climate_controlled']) && 
   				$_POST['climate_controlled'] == 'yes') 
			{
				$c_c = 1;
			} else {
				$c_c = 0;
			}

			if(isset($_POST['private_space']) && 
   				$_POST['private_space'] == 'yes') 
			{
				$s_f = 1;
			} else {
				$s_f = 0;
			}

			if(isset($_POST['smoke_free']) && 
   				$_POST['smoke_free'] == 'yes') 
			{
				$s_d = 1;
			} else {
				$s_d = 0;
			}

			if(isset($_POST['smoke_detectors']) && 
   				$_POST['smoke_detectors'] == 'yes') 
			{
				$p_e = 1;
			} else {
				$p_e = 0;
			}

			if(isset($_POST['private_entrance']) && 
   				$_POST['private_entrance'] == 'yes') 
			{
				$p_s = 1;
			} else {
				$p_s = 0;
			}

			if(isset($_POST['locked_area']) && 
   				$_POST['locked_area'] == 'yes') 
			{
				$l_a = 1;
			} else {
				$l_a = 0;
			}

			if(isset($_POST['pet_free']) && 
   				$_POST['pet_free'] == 'yes') 
			{
				$p_f = 1;
			} else {
				$p_f = 0;
			}

			if(isset($_POST['security_camera']) && 
   				$_POST['security_camera'] == 'yes') 
			{
				$s_c = 1;
			} else {
				$s_c = 0;
			}

			if(isset($_POST['no_stairs']) && 
   				$_POST['no_stairs'] == 'yes') 
			{
				$n_s = 1;
			} else {
				$n_s = 0;
			}

			$data2 = array(
		    	'climate_controlled' => $c_c,
		    	'smoke_free' => $s_f,
		    	'smoke_detectors' => $s_d,
		    	'private_entrance' => $p_e,
		        'private_space' => $p_s,
		        'locked_area' => $l_a,
		        'pet_free' => $p_f,
		        'security_camera' => $s_c,
		        'no_stairs' => $n_s,
		        'id_o' => $last_id
		    );

		    $this->db->insert('lastnost', $data2);

		}

		public function delete_news($slug){
			$this->db->where("slug", $slug);
			$this->db->delete("news");
		}

		public function update_news($data, $slug){
			echo($data["title"].'\n');
			echo($data["text"]);
			$this->db->set($data);
			$this->db->where("slug", $slug);
			$this->db->update("news");
		}

}