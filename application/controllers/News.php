	<?php
	class News extends CI_Controller {


	        public function __construct()
	        {
	                parent::__construct();
	                $this->load->helper(array('form', 'url'));
	                $this->load->model('news_model');
	                $this->load->helper('url_helper');
	                $this->load->helper('form');
                	$this->load->library('session');
                	$this->load->helper('url');
                	

	        }

	        public function index($num_page = NULL)
	        {
	                 $this->load->helper('form');
			    	$this->load->library('form_validation');
			    	
			    	$this->form_validation->set_rules('type_storage', 'type_storage', 'required');
			    	$this->form_validation->set_rules('size_storage', 'size_storage', 'required');

	                if ($this->form_validation->run() === FALSE)
				    {
				    	if($num_page == NULL){
				    		$data['space'] = $this->news_model->find_group_news(1);
				    	} else {
				    		$data['space'] = $this->news_model->find_group_news($num_page);
				    	}
				    	if($num_page != NULL){ 
				        	$data['current_page'] = $num_page; 	
				        } else {
				        	$data['current_page'] = 1; 
				        }
				        $data['num_space'] = $this->news_model->get_num_space_form();

		                /*$data["title"] = "News";*/
		                $this->load->view('templates/header', $data);
		                /*var_dump($data["news"]);*/
		                $this->load->view('news/index', $data);
		                $this->load->view('templates/footer');

				    }
				    else
				    {
				    	$data['city_post'] = $this->input->post('city_name');
				        $_SESSION['city_post'] = $this->input->post('city_name');
				        $data['point_value'] = $this->input->post('type_storage');
				        $_SESSION['point_value'] = $this->input->post('type_storage');
				        $data['point_value_size'] = $this->input->post('size_storage');
				        $_SESSION['point_value_size'] = $this->input->post('size_storage');
				        $data['price_from'] = $this->input->post('start_price');
				        $_SESSION['price_from'] = $this->input->post('start_price');
				        $data['price_end'] = $this->input->post('end_price');
				        $_SESSION['price_end'] = $this->input->post('end_price');
				        $data['num_space'] = $this->news_model->get_num_space_form();
				        if($num_page != NULL){
				        	$data['current_page'] = $num_page; 
				        } else {
				        	$data['current_page'] = 1; 
				        }
				        $_SESSION['num_space'] = $this->news_model->get_num_space_form();
				    	if($num_page == NULL){
				    		$data['space'] = $this->news_model->find_group_news(1);
				    	} else {
				    		$data['space'] = $this->news_model->find_group_news($num_page);
				    	}
				        /*$data['space'] = $this->news_model->find_group_news();*/
				        

		                /*var_dump($data["news_item"]);*/
		                $this->load->view('templates/header', $data);
		                /*var_dump($data["news"]);*/
		                $this->load->view('news/index', $data);
		                $this->load->view('templates/footer');
				    }

	                
	        }

	        public function reserve($num = NULL)
	        {
	        		$data["num_r"] = $num;	
	                $this->load->view('templates/header', $data);
	                /*var_dump($data["news"]);*/
	                $this->load->view('news/reserve_space', $data);
	                $this->load->view('templates/footer');

	                
	        }

	        public function view_reserve($num = NULL)
	        {

	                $data["opis"] = "News";
	                /*var_dump($data["news_item"]);*/
	                $this->load->view('templates/header', $data);
	                /*var_dump($data["news"]);*/
	                $this->load->view('news/view', $data);
	                $this->load->view('templates/footer');
	        }

	        public function comment(){
	        	if(!isset($this->session->userdata['logged_in'])){
					$data['message_display'] = 'Signin to view this page!';
				    $this->load->view('templates/header');
				    $this->load->view('user_authentication/login_form', $data);
				    $this->load->view('templates/footer');
				    return;
				}

				$this->load->helper('form');
			    $this->load->library('form_validation');


			    $this->form_validation->set_rules('comment', 'Comment', 'required');


			    if ($this->form_validation->run() === FALSE)
			    {
			        $this->load->view('templates/header', $data);
			        $this->load->view('news/view');
			        $this->load->view('templates/footer');

			    }
			    else
			    {
			        $lastAdded = $this->news_model->set_comment();
			        $data['space_item'] = $this->news_model->get_news($this->input->post('id_space'), NULL);
	                $data['comment'] = $this->news_model->get_comment($this->input->post('id_space'), NULL);
	                $data['vote_ad'] = $this->news_model->get_vote($lastAdded, NULL);
	                $data['vote_ad_avg'] = $this->news_model->get_avg_vote($num, NULL);
	                $data["opis"] = "News";
	                /*var_dump($data["news_item"]);*/
	                $this->load->view('templates/header', $data);
	                /*var_dump($data["news"]);*/
	                $this->load->view('news/view', $data);
	                $this->load->view('templates/footer');
			    }


	        }

	        public function vote(){

	        	$data["title"] = "News";
	        	if(!isset($this->session->userdata['logged_in'])){
					$data['message_display'] = 'Signin to view this page!';
				    $this->load->view('templates/header');
				    $this->load->view('user_authentication/login_form', $data);
				    $this->load->view('templates/footer');
				    return;
				}

				$this->load->helper('form');
			    $this->load->library('form_validation');


			    $this->form_validation->set_rules('vote', 'Vote', 'required');


			    if ($this->form_validation->run() === TRUE)
			    {
			        $this->load->view('templates/header', $data);
			        $this->load->view('news/view');
			        $this->load->view('templates/footer');

			    }
			    else
			    {
			        $lastAdded = $this->news_model->set_vote();

			        $data['space_item'] = $this->news_model->get_news($lastAdded, NULL);
	                $data['comment'] = $this->news_model->get_comment($lastAdded, NULL);
	                $data['vote_ad'] = $this->news_model->get_vote($lastAdded, NULL);
	                $data['vote_ad_avg'] = $this->news_model->get_avg_vote($lastAdded, NULL);

	                $data["opis"] = "News";
	                /*var_dump($data["news_item"]);*/
	                $this->load->view('templates/header', $data);
	                /*var_dump($data["news"]);*/
	                $this->load->view('news/view', $data);
	                $this->load->view('templates/footer');
			    }


	        }

	        public function view($num = NULL)
	        {
	                $data['space_item'] = $this->news_model->get_news($num, NULL);
	                $data['comment'] = $this->news_model->get_comment($num, NULL);
	                $data['vote_ad'] = $this->news_model->get_vote($num, NULL);
	                $data['vote_ad_avg'] = $this->news_model->get_avg_vote($num, NULL);

	                $data["opis"] = "News";
	                /*var_dump($data["news_item"]);*/
	                $this->load->view('templates/header', $data);
	                /*var_dump($data["news"]);*/
	                $this->load->view('news/view', $data);
	                $this->load->view('templates/footer');
	        }

	        public function create()
			{
				if(!isset($this->session->userdata['logged_in'])){
					$data['message_display'] = 'Signin to view this page!';
				    $this->load->view('templates/header');
				    $this->load->view('user_authentication/login_form', $data);
				    $this->load->view('templates/footer');
				    return;
				}

			    $this->load->helper('form');
			    $this->load->library('form_validation');

			    $data['title'] = 'Create a news item';

			    /*$this->form_validation->set_rules('title', 'Title', 'required');
			    $this->form_validation->set_rules('text', 'Text', 'required');*/

			    $this->form_validation->set_rules('text', 'Text', 'required');
			    $this->form_validation->set_rules('price', 'Price', 'required');
			    $this->form_validation->set_rules('country', 'Country', 'required');
			    $this->form_validation->set_rules('city', 'City', 'required');
			    $this->form_validation->set_rules('paddress', 'Paddress', 'required');
			    $this->form_validation->set_rules('address', 'Address', 'required');


			    if ($this->form_validation->run() === FALSE)
			    {
			        $this->load->view('templates/header', $data);
			        $this->load->view('news/create');
			        $this->load->view('templates/footer');

			    }
			    else
			    {
				    $config['upload_path']          = './uploads/';
	                $config['allowed_types']        = 'gif|jpg|png';
	                $config['max_size']             = 2000;
	                $config['max_width']            = 4096;
	                $config['max_height']           = 2160;

	                $this->load->library('upload', $config);

	                $path_img = '';
	                if ( ! $this->upload->do_upload('userfile'))
	                {
	                        $error = array('error' => $this->upload->display_errors());

                        	$this->load->view('upload_form', $error);
	                }
	                else
	                {
	                        $data = array('upload_data' => $this->upload->data());

                        	/*$this->load->view('upload_success', $data);*/
                        	$path_img = $data['upload_data']['full_path'];
                        	$path_img = substr($path_img, 50);
	                }



			        $lastAdded = $this->news_model->set_news($path_img);

			        $find = 'news/create/'.strval($lastAdded);
			        $data['space_item'] = $this->news_model->get_news($lastAdded, NULL);
	                $data['comment'] = $this->news_model->get_comment($lastAdded, NULL);
	                $data['vote_ad'] = $this->news_model->get_vote($lastAdded, NULL);
	                $data['vote_ad_avg'] = $this->news_model->get_avg_vote($lastAdded, NULL);
	                $data['warning'] = "Your ad is now public, if you want to change the information presented or delete this ad you can do it via the profile page.";

	                $data["opis"] = "News";
	                /*var_dump($data["news_item"]);*/
	                $this->load->view('templates/header', $data);
	                /*var_dump($data["news"]);*/
	                $this->load->view('news/view', $data);
	                $this->load->view('templates/footer');
			    }
			}

			/*public function set_reservation($num){
	                $data['comment'] = $this->news_model->get_reservation($num);

	                $data["opis"] = "News";
	                $this->load->view('templates/header', $data);
	                $this->load->view('news/reserve_space_modify', $data);
	                $this->load->view('templates/footer');
			}*/


			public function create_reservation()
			{
				if(!isset($this->session->userdata['logged_in'])){
					$data['message_display'] = 'Signin to view this page!';
				    $this->load->view('templates/header');
				    $this->load->view('user_authentication/login_form', $data);
				    $this->load->view('templates/footer');
				    return;
				}

			    $this->load->helper('form');
			    $this->load->library('form_validation');

			    $data['title'] = 'Create a news item';

			    /*$this->form_validation->set_rules('title', 'Title', 'required');
			    $this->form_validation->set_rules('text', 'Text', 'required');*/

			    $this->form_validation->set_rules('reserve_date', 'reserve_date', 'required');
			    $this->form_validation->set_rules('how_long', 'how_long', 'required');
			    $this->form_validation->set_rules('description_reservation', 'description_reservation', 'required');
			    $this->form_validation->set_rules('description_need', 'description_need', 'required');


			    if ($this->form_validation->run() === FALSE)
			    {
			        $this->load->view('templates/header', $data);
			        $this->load->view('news/reserve_space');
			        $this->load->view('templates/footer');

			    }
			    else
			    {
			        $lastAdded = $this->news_model->set_reservation();
			        $data['username'] = $this->session->userdata['logged_in']['username'];
			        $data['email'] = $this->session->userdata['logged_in']['email'];
			        $data['id_u'] = $this->session->userdata['logged_in']['id_u'];
			        $data['warning'] = "You have successfully posted your vote. ";


			        /*reservation of the user*/
			        $data['user_reservation'] = $this->news_model->get_user_reservation($data['id_u']);
			        /*reservation of the other users for the space of this user*/
			        $data['other_reservation'] = $this->news_model->get_other_reservation($data['id_u']);
			        /*published spaces of the user*/
			        $data['user_space'] = $this->news_model->get_user_space($data['id_u']);

			        $this->load->view('templates/header');
			        $this->load->view('user_authentication/admin_page', $data);
			        $this->load->view('templates/footer');
			    }
			}

			public function delete($slug = NULL)
	        {
		        	if(!isset($this->session->userdata['logged_in'])){
						$data['message_display'] = 'Signin to view this page!';
					    $this->load->view('templates/header');
					    $this->load->view('user_authentication/login_form', $data);
					    $this->load->view('templates/footer');
						return;
					}

	                $this->news_model->delete_news($slug);
	                /*var_dump($data["news_item"]);*/
	               	$data['username'] = $this->session->userdata['logged_in']['username'];
			        $data['email'] = $this->session->userdata['logged_in']['email'];
			        $data['id_u'] = $this->session->userdata['logged_in']['id_u'];
			        $data['warning'] = "Your ad is now deleted.";


			        /*reservation of the user*/
			        $data['user_reservation'] = $this->news_model->get_user_reservation($data['id_u']);
			        /*reservation of the other users for the space of this user*/
			        $data['other_reservation'] = $this->news_model->get_other_reservation($data['id_u']);
			        /*published spaces of the user*/
			        $data['user_space'] = $this->news_model->get_user_space($data['id_u']);

			        $this->load->view('templates/header');
			        $this->load->view('user_authentication/admin_page', $data);
			        $this->load->view('templates/footer');
	        }


	        public function delete_reservation($slug = NULL)
	        {
		        	if(!isset($this->session->userdata['logged_in'])){
						$data['message_display'] = 'Signin to view this page!';
					    $this->load->view('templates/header');
					    $this->load->view('user_authentication/login_form', $data);
					    $this->load->view('templates/footer');
						return;
					}

	                $data["title"] = "News";
	                $this->news_model->delete_reservation($slug);



	                $data['username'] = $this->session->userdata['logged_in']['username'];
			        $data['email'] = $this->session->userdata['logged_in']['email'];
			        $data['id_u'] = $this->session->userdata['logged_in']['id_u'];
			        $data['warning'] = "You have deleted the reservation.";


			        /*reservation of the user*/
			        $data['user_reservation'] = $this->news_model->get_user_reservation($data['id_u']);
			        /*reservation of the other users for the space of this user*/
			        $data['other_reservation'] = $this->news_model->get_other_reservation($data['id_u']);
			        /*published spaces of the user*/
			        $data['user_space'] = $this->news_model->get_user_space($data['id_u']);

			        $this->load->view('templates/header');
			        $this->load->view('user_authentication/admin_page', $data);
			        $this->load->view('templates/footer');
	        }

	        public function delete_comment($slug = NULL)
	        {
		        	if(!isset($this->session->userdata['logged_in'])){
						$data['message_display'] = 'Signin to view this page!';
					    $this->load->view('templates/header');
					    $this->load->view('user_authentication/login_form', $data);
					    $this->load->view('templates/footer');
						return;
					}

					$num_comment = $this->news_model->delete_comment_num($slug);
	                $this->news_model->delete_comment($slug);
	                /*var_dump($data["news_item"]);*/
	                $data['space_item'] = $this->news_model->get_news($num_comment, NULL);
	                $data['comment'] = $this->news_model->get_comment($num_comment, NULL);
	                $data['vote_ad'] = $this->news_model->get_vote($num_comment, NULL);
	                $data['vote_ad_avg'] = $this->news_model->get_avg_vote($num, NULL);
	                $data['warning'] = "Your comment has been deleted.";

	                $data["opis"] = "News";
	                /*var_dump($data["news_item"]);*/
	                $this->load->view('templates/header', $data);
	                /*var_dump($data["news"]);*/
	                $this->load->view('news/view', $data);
	                $this->load->view('templates/footer');
	        }


	        public function delete_vote($slug = NULL)
	        {
		        	if(!isset($this->session->userdata['logged_in'])){
						$data['message_display'] = 'Signin to view this page!';
					    $this->load->view('templates/header');
					    $this->load->view('user_authentication/login_form', $data);
					    $this->load->view('templates/footer');
						return;
					}

					$num_comment = $this->news_model->delete_vote_num($slug);
	                $this->news_model->delete_vote($slug);
	                /*var_dump($data["news_item"]);*/
	                $data['space_item'] = $this->news_model->get_news($num_comment, NULL);
	                $data['comment'] = $this->news_model->get_comment($num_comment, NULL);
	                $data['vote_ad'] = $this->news_model->get_vote($num_comment, NULL);
	                $data['vote_ad_avg'] = $this->news_model->get_avg_vote($num, NULL);
	                $data['warning'] = "Your comment has been deleted.";

	                $data["opis"] = "News";
	                /*var_dump($data["news_item"]);*/
	                $this->load->view('templates/header', $data);
	                /*var_dump($data["news"]);*/
	                $this->load->view('news/view', $data);
	                $this->load->view('templates/footer');
	        }

	        public function edit($opis = NULL)
			{

				if(!isset($this->session->userdata['logged_in'])){
					$data['message_display'] = 'Signin to view this page!';
				    $this->load->view('templates/header');
				    $this->load->view('user_authentication/login_form', $data);
				    $this->load->view('templates/footer');
				    return;
				}

			    $this->load->helper('form');
			    $this->load->library('form_validation');

			    $data['news_item'] = $this->news_model->get_news($opis);

			    $data['opis'] = 'Update a news item';

			    $this->form_validation->set_rules('title', 'Title', 'required');
			    $this->form_validation->set_rules('text', 'Text', 'required');

			    if ($this->form_validation->run() === FALSE)
			    {
			        $this->load->view('templates/header', $data);
			        $this->load->view('news/edit', $data);
			        $this->load->view('templates/footer');

			    }
			    else
			    {
				    //var_dump($GLOBALS);
				    $d["tip"] = $this->input->post('tip');
				    $d["opis"] = $this->input->post('opis');
			        $this->news_model->update_news($d, $opis);
			        $this->load->view('news/success');
			    }
			}


			public function edit_reservation($num = NULL)
			{

				if(!isset($this->session->userdata['logged_in'])){
					$data['message_display'] = 'Signin to view this page!';
				    $this->load->view('templates/header');
				    $this->load->view('user_authentication/login_form', $data);
				    $this->load->view('templates/footer');
				    return;
				}

				$this->load->helper('form');
			    $this->load->library('form_validation');

				if($num == NULL && ($this->form_validation->run() == FALSE)){
					$this->form_validation->set_rules('reserve_date', 'reserve_date', 'required');
				    $this->form_validation->set_rules('how_long', 'how_long', 'required');
				    $this->form_validation->set_rules('description_reservation', 'description_reservation', 'required');
				    $this->form_validation->set_rules('description_need', 'description_need', 'required');
					$this->news_model->update_reservation();

			        $data['username'] = $this->session->userdata['logged_in']['username'];
			        $data['email'] = $this->session->userdata['logged_in']['email'];
			        $data['id_u'] = $this->session->userdata['logged_in']['id_u'];
			        $data['warning'] = "You have edited the reservation.";


			        /*reservation of the user*/
			        $data['user_reservation'] = $this->news_model->get_user_reservation($data['id_u']);
			        /*reservation of the other users for the space of this user*/
			        $data['other_reservation'] = $this->news_model->get_other_reservation($data['id_u']);
			        /*published spaces of the user*/
			        $data['user_space'] = $this->news_model->get_user_space($data['id_u']);

			        $this->load->view('templates/header');
			        $this->load->view('user_authentication/admin_page', $data);
			        $this->load->view('templates/footer');

				} else if($num == NULL){
					echo $this->form_validation->run() == TRUE;
					echo "ushaud";
					$this->load->view('news/success');
				} else {
					$data['comment'] = $this->news_model->get_reservation($num);

	                $data["opis"] = "News";
	                /*var_dump($data["news_item"]);*/
	                $this->load->view('templates/header', $data);
	                /*var_dump($data["news"]);*/
	                $this->load->view('news/reserve_space_modify', $data);
	                $this->load->view('templates/footer');
				}

			}



			public function accept_reservation($num = NULL)
			{

				if(!isset($this->session->userdata['logged_in'])){
					$data['message_display'] = 'Signin to view this page!';
				    $this->load->view('templates/header');
				    $this->load->view('user_authentication/login_form', $data);
				    $this->load->view('templates/footer');
				    return;
				}

				$this->load->helper('form');
			    $this->load->library('form_validation');

			    $this->news_model->accept_reservation_model($num);

			    	$data['username'] = $this->session->userdata['logged_in']['username'];
			        $data['email'] = $this->session->userdata['logged_in']['email'];
			        $data['id_u'] = $this->session->userdata['logged_in']['id_u'];
			        $data['warning'] = "You have accepted the reservation.";


			        /*reservation of the user*/
			        $data['user_reservation'] = $this->news_model->get_user_reservation($data['id_u']);
			        /*reservation of the other users for the space of this user*/
			        $data['other_reservation'] = $this->news_model->get_other_reservation($data['id_u']);
			        /*published spaces of the user*/
			        $data['user_space'] = $this->news_model->get_user_space($data['id_u']);

			        $this->load->view('templates/header');
			        $this->load->view('user_authentication/admin_page', $data);
			        $this->load->view('templates/footer');

			}

			public function decline_reservation($num = NULL)
			{

				if(!isset($this->session->userdata['logged_in'])){
					$data['message_display'] = 'Signin to view this page!';
				    $this->load->view('templates/header');
				    $this->load->view('user_authentication/login_form', $data);
				    $this->load->view('templates/footer');
				    return;
				}

				$this->load->helper('form');
			    $this->load->library('form_validation');

			    $this->news_model->decline_reservation_model($num);

			    $data['username'] = $this->session->userdata['logged_in']['username'];
			        $data['email'] = $this->session->userdata['logged_in']['email'];
			        $data['id_u'] = $this->session->userdata['logged_in']['id_u'];
			        $data['warning'] = "You have declined the reservation.";


			        /*reservation of the user*/
			        $data['user_reservation'] = $this->news_model->get_user_reservation($data['id_u']);
			        /*reservation of the other users for the space of this user*/
			        $data['other_reservation'] = $this->news_model->get_other_reservation($data['id_u']);
			        /*published spaces of the user*/
			        $data['user_space'] = $this->news_model->get_user_space($data['id_u']);

			        $this->load->view('templates/header');
			        $this->load->view('user_authentication/admin_page', $data);
			        $this->load->view('templates/footer');

			}



			public function edit_space($num = NULL)
			{

				if(!isset($this->session->userdata['logged_in'])){
					$data['message_display'] = 'Signin to view this page!';
				    $this->load->view('templates/header');
				    $this->load->view('user_authentication/login_form', $data);
				    $this->load->view('templates/footer');
				    return;
				}

				$this->load->helper('form');
			    $this->load->library('form_validation');

				if($num == NULL && ($this->form_validation->run() == FALSE)){
					$this->form_validation->set_rules('text', 'Text', 'required');
				    $this->form_validation->set_rules('price', 'Price', 'required');
				    $this->form_validation->set_rules('country', 'Country', 'required');
				    $this->form_validation->set_rules('city', 'City', 'required');
				    $this->form_validation->set_rules('paddress', 'Paddress', 'required');
				    $this->form_validation->set_rules('address', 'Address', 'required');


				    $path_img = '';
				    if(isset($_FILES['userfile'])){
				    	echo "Enter";
				    	$config['upload_path']          = './uploads/';
		                $config['allowed_types']        = 'gif|jpg|png';
		                $config['max_size']             = 2000;
		                $config['max_width']            = 4096;
		                $config['max_height']           = 2160;

		                $this->load->library('upload', $config);

		                if ( ! $this->upload->do_upload('userfile'))
		                {
		                        $error = array('error' => $this->upload->display_errors());

	                        	$this->load->view('upload_form', $error);
		                }
		                else
		                {
		                        $data = array('upload_data' => $this->upload->data());

	                        	/*$this->load->view('upload_success', $data);*/
	                        	$path_img = $data['upload_data']['full_path'];
	                        	$path_img = substr($path_img, 50);
		                }
				    }

				    $lastAdded = $this->news_model->update_news($path_img);

			        $find = 'news/create/'.strval($lastAdded);

			        $data['space_item'] = $this->news_model->get_news($this->input->post('id_space'), NULL);
	                $data['comment'] = $this->news_model->get_comment($this->input->post('id_space'), NULL);

	                $data["opis"] = "News";
	                /*var_dump($data["news_item"]);*/
	                $this->load->view('templates/header', $data);
	                /*var_dump($data["news"]);*/
	                $this->load->view('news/view', $data);
	                $this->load->view('templates/footer');
				} else if($num == NULL){
					echo $this->form_validation->run() == TRUE;
					echo "ushaud";
					$this->load->view('news/success');
				} else {
					$data['space'] = $this->news_model->get_news($num);

		            $this->load->view('templates/header', $data);
		            $this->load->view('news/modify_space', $data);
		            $this->load->view('templates/footer');
				}

			}



			public function edit_comment($num = NULL)
			{

				if(!isset($this->session->userdata['logged_in'])){
					$data['message_display'] = 'Signin to view this page!';
				    $this->load->view('templates/header');
				    $this->load->view('user_authentication/login_form', $data);
				    $this->load->view('templates/footer');
				    return;
				}

			    $this->load->helper('form');
			    $this->load->library('form_validation');


				$this->form_validation->set_rules('id_comment', 'id_comment', 'required');
			    $this->form_validation->set_rules('comment', 'comment', 'required');

			    if ($this->form_validation->run() === FALSE)
			    {
			        $this->load->view('templates/header', $data);
			        $this->load->view('news/edit', $data);
			        $this->load->view('templates/footer');

			    }
			    else
			    {
			        $this->news_model->update_comment();

			        $data['space_item'] = $this->news_model->get_news($this->input->post('id_ad_c'), NULL);
	                $data['comment'] = $this->news_model->get_comment($this->input->post('id_ad_c'), NULL);
	                $data['vote_ad'] = $this->news_model->get_vote($this->input->post('id_ad_c'), NULL);
	                $data['vote_ad_avg'] = $this->news_model->get_avg_vote($num, NULL);
	                $data['warning'] = "Your comment has been edited.";

	                $data["opis"] = "News";
	                /*var_dump($data["news_item"]);*/
	                $this->load->view('templates/header', $data);
	                /*var_dump($data["news"]);*/
	                $this->load->view('news/view', $data);
	                $this->load->view('templates/footer');
			    }
			}

	}

	/*https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/news/create*/

	/*https://www.studenti.famnit.upr.si/~klen/CodeIgniter/index.php/news/delete/news-title-1*/


	/*https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/news/index/*/

	/*https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/news/view/news_title_1/*/

	/*https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/view/news/news_title_1*/

