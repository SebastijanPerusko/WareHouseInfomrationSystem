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

			//$_POST["title"] = $this->input->post('title')
		    $data = array(
		    	'opis' => $this->input->post('text'),
		        'cena' => $this->input->post('price'),
		        'tip' => $this->input->post('type'),
		        'drzava' => $this->input->post('country'),
		        'mesto' => $this->input->post('city'),
		        'p_stevilka' => $this->input->post('paddress'),
		        'naslov' => $this->input->post('address'),
		        'dolzina' => $this->input->post('length'),
		        'sirina' => $this->input->post('width'),
		        'visina' => $this->input->post('height'),
		        'id_u' => $arr['id_u']
		    );

		    $this->db->insert('oglas', $data);

		    $this->db->insert_id();
		    $last_id = $this->db->insert_id();

		    if(isset($_POST['climate_controlled']) && 
   				$_POST['climate_controlled'] == 'yes') 
			{
				$data2 = array('ime' => "climate_controlled",
								'id_o' => $this->db->insert_id());
    			$this->db->insert('lastnost', $data2);
			}

			if(isset($_POST['private_space']) && 
   				$_POST['private_space'] == 'yes') 
			{
				$data2 = array('ime' => "private_space",
								'id_o' => $last_id);
    			$this->db->insert('lastnost', $data2);
			}

			if(isset($_POST['smoke_free']) && 
   				$_POST['smoke_free'] == 'yes') 
			{
				$data2 = array('ime' => "smoke_free",
								'id_o' => $last_id);
    			$this->db->insert('lastnost', $data2);
			}

			if(isset($_POST['smoke_detectors']) && 
   				$_POST['smoke_detectors'] == 'yes') 
			{
				$data2 = array('ime' => "smoke_detectors",
								'id_o' => $last_id);
    			$this->db->insert('lastnost', $data2);
			}

			if(isset($_POST['private_entrance']) && 
   				$_POST['private_entrance'] == 'yes') 
			{
				$data2 = array('ime' => "private_entrance",
								'id_o' => $last_id);
    			$this->db->insert('lastnost', $data2);
			}

			if(isset($_POST['locked_area']) && 
   				$_POST['locked_area'] == 'yes') 
			{
				$data2 = array('ime' => "locked_area",
								'id_o' => $last_id);
    			$this->db->insert('lastnost', $data2);
			}

			if(isset($_POST['pet_free']) && 
   				$_POST['pet_free'] == 'yes') 
			{
				$data2 = array('ime' => "private_entrance",
								'id_o' => $last_id);
    			$this->db->insert('lastnost', $data2);
			}

			if(isset($_POST['security_camera']) && 
   				$_POST['security_camera'] == 'yes') 
			{
				$data2 = array('ime' => "security_camera",
								'id_o' => $last_id);
    			$this->db->insert('lastnost', $data2);
			}

			if(isset($_POST['no_stairs']) && 
   				$_POST['no_stairs'] == 'yes') 
			{
				$data2 = array('ime' => "no_stairs",
								'id_o' => $last_id);
    			$this->db->insert('lastnost', $data2);
			}

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