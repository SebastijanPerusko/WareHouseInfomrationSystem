<?php
class News_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }


        public function set_comment($slug = FALSE)
		{
			$this->load->helper('url');
			$my_date_time = date('Y-m-d H:i:s');
			$arr = $_SESSION['logged_in'];
			$data = array(
		    	'vsebina' => $this->input->post('comment'),
		    	'datumura' => $my_date_time,
		        'id_u' => $arr['id_u'],
		        'id_o' => $this->input->post('id_space')
		    );

		    $this->db->insert('komentar', $data);
        }

        public function set_vote($slug = FALSE)
		{
			$this->load->helper('url');
			$my_date_time = date('Y-m-d H:i:s');
			$arr = $_SESSION['logged_in'];
			$data = array(
		    	'vrednost' => intval($this->input->post('vote_space')),
		    	'datumura' => $my_date_time,
		        'id_u' => $arr['id_u'],
		        'id_o' => $this->input->post('id_space')
		    );

		    $this->db->insert('ocena', $data);
        }

        public function control_comment(){

        }

        public function control_user($user, $space){

        }

        public function get_news($slug = FALSE)
		{
	        if ($slug === FALSE)
	        {
	                $query = $this->db->select('*')
	        				->from('oglas')
	        				->join('lastnost', 'oglas.id = lastnost.id_o')
	        				->get();
	                return $query->result_array();
	        }

	        /*$query = $this->db->get_where('oglas', array('id' => $slug));*/
	        $query = $this->db->select('*')
	        				->from('oglas')
	        				->join('lastnost', 'oglas.id = lastnost.id_o')
	        				->where('oglas.id', $slug)
	        				->get();
	        return $query->row_array();
        }

        


        public function get_comment($num)
		{
			$query = $this->db->select('*')
							->select('komentar.id AS "id_ads"')
	        				->from('komentar')
	        				->join('uporabnik', 'komentar.id_u = uporabnik.id')
	        				->where('komentar.id_o', $num)
	        				->get();
	        /*$query = $this->db->get('komentar');*/
	        return $query->result_array();
        }


        public function find_group_news()
		{


			echo $_POST['start_price'];
			$query = $this->db->select('*')
	        				->from('oglas')
	        				->join('lastnost', 'oglas.id = lastnost.id_o');

	        if($_POST['type_storage'] == "veichle"){
				$query = $this->db->where('oglas.lokacija', "cover")
	        				->where('oglas.lokacija', "uncover");
			} else if($_POST['type_storage'] == "object") {
				$query = $this->db->where('oglas.lokacija', "indoor")
									->where('oglas.lokacija', "none");
			}

			if(!empty($_POST['city_name'])){
				$query = $this->db->where('oglas.mesto', $_POST['city_name']);
			}
			if(!empty($_POST['start_price'])){
				$query = $this->db->where('oglas.cena >=', intval($_POST['start_price']));
			}
			if(!empty($_POST['end_price'])){
				$query = $this->db->where('oglas.cena <=', intval($_POST['end_price']));
			}

	        $query = $this->db->get();

	        return $query->result_array();
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


		    return $last_id;

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


		public function set_reservation()
		{
		    $this->load->helper('url');

		    $arr = $_SESSION['logged_in'];



			//$_POST["title"] = $this->input->post('title')
		    $data = array(
		    	'datum_od' => $this->input->post('reserve_date'),
		    	'cas_rezervacije' => $this->input->post('how_long'),
		    	'stvari' => $this->input->post('description_reservation'),
		    	'opis' => $this->input->post('description_need'),
		        'status' => "pending",
		        'id_u' => $arr['id_u'],
		        'id_o' => $this->input->post('id_space')
		    );



		    $this->db->insert('rezervacija', $data);

		}

}