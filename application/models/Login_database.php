<?php
class Login_database extends CI_model {
		public function __construct(){
	    $this->load->database();
	}
	// Insert registration data in database
	public function registration_insert($data) {

	    // Query to check whether username already exist or not
	    $condition = "username =" . "'" . $data['username'] . "'";
	    $this->db->select('*');
	    $this->db->from('uporabnik');
	    $this->db->where($condition);
	    $this->db->limit(1);
	    $query = $this->db->get();
	    if ($query->num_rows() == 0) {

	        // Query to insert data in database
	        $this->db->insert('uporabnik', $data);
	        if ($this->db->affected_rows() > 0) {
	            return true;
	        }
	    } else {
	        return false;
	    }
	}

	// Read data using username and password
	public function login($data) {

	    $condition = "username =" . "'" . $data['username'] . "'";
	    $this->db->select('*');
	    $this->db->from('uporabnik');
	    $this->db->where($condition);
	    $this->db->limit(1);
	    $query = $this->db->get();
	    $row = $query->row_array();
	    echo(password_verify($data['geslo'], $row['geslo']));

	    if (password_verify($data['geslo'], $row['geslo']) && $query->num_rows() == 1) {
	        return true;
	    } else {
	        return false;
	    }
	}



	public function change_password($data) {
		$this->db->set($data);
		$this->db->where('id', $this->session->userdata['logged_in']['id_u']);
		$this->db->update("uporabnik");
		return TRUE;
	}

	// Read data from database to show data in admin page
	public function read_user_information($username) {

	    $condition = "username =" . "'" . $username . "'";
	    $this->db->select('*');
	    $this->db->from('uporabnik');
	    $this->db->where($condition);
	    $this->db->limit(1);
	    $query = $this->db->get();

	    if ($query->num_rows() == 1) {
	        return $query->result();
	    } else {
	        return false;
	    }
	}

	public function get_user_reservation($num)
		{

	        $query = $this->db->select('*')
	        				->select('rezervacija.id AS "id_res"')
	        				->from('rezervacija')
	        				->join('oglas', 'oglas.id = rezervacija.id_o')
	        				->join('uporabnik', 'uporabnik.id = oglas.id_u')
	        				->where('rezervacija.id_u', $num)
	        				->get();
	        return $query->result_array();
        }

        public function get_other_reservation($num)
		{

	        /*$query = $this->db->get_where('oglas', array('id' => $slug));*/
	        $query = $this->db->select('*')
	        				->select('rezervacija.id AS "id_res"')
	        				->from('oglas')
	        				->join('rezervacija', 'oglas.id = rezervacija.id_o')
	        				->join('uporabnik', 'uporabnik.id = oglas.id_u')
	        				->where('oglas.id_u', $num)
	        				->get();
	        return $query->result_array();
        }

        public function get_user_space($num)
		{

	        /*$query = $this->db->get_where('oglas', array('id' => $slug));*/
	        $query = $this->db->select('*')
	        				->from('oglas')
	        				->where('oglas.id_u', $num)
	        				->get();
	        return $query->result_array();
        }

        public function get_user_inf($num)
		{

	        /*$query = $this->db->get_where('oglas', array('id' => $slug));*/
	        $query = $this->db->select('*')
	        				->from('uporabnik')
	        				->where('uporabnik.id', $num)
	        				->get();
	        return $query->row_array();
        }
        public function update_data_info($data)
		{

	        /*$query = $this->db->get_where('oglas', array('id' => $slug));*/
	        $this->db->set($data);
			$this->db->where('id', $this->session->userdata['logged_in']['id_u']);
			return $this->db->update("uporabnik");
        }

}