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

	                if ($this->form_validation->run() === FALSE)
				    {
				    	if($num_page == NULL){
				    		$data['space'] = $this->news_model->get_news(FALSE, 1);
				    	} else {
				    		$data['space'] = $this->news_model->get_news(FALSE, $num_page);
				    	}
				        $data['num_space'] = $this->news_model->get_num_space();

				        echo count($data['space'])."num_space";

		                /*$data["title"] = "News";*/
		                $this->load->view('templates/header', $data);
		                /*var_dump($data["news"]);*/
		                $this->load->view('news/index', $data);
		                $this->load->view('templates/footer');

				    }
				    else
				    {
				    	if($num_page == NULL){
				    		$data['space'] = $this->news_model->find_group_news(1);
				    	} else {
				    		$data['space'] = $this->news_model->find_group_news($num_page);
				    	}
				        /*$data['space'] = $this->news_model->find_group_news();*/
				        $data['city_post'] = $this->input->post('city_name');
				        $data['point_value'] = $this->input->post('type_storage');
				        $data['price_from'] = $this->input->post('start_price');
				        $data['price_end'] = $this->input->post('end_price');
				        $data['num_space'] = $this->news_model->get_num_space_form();

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
			        $this->load->view('news/success');
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
			        $this->load->view('news/success');
			    }


	        }

	        public function view($num = NULL)
	        {
	                $data['space_item'] = $this->news_model->get_news($num, NULL);
	                $data['comment'] = $this->news_model->get_comment($num, NULL);

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
			        $this->load->view('templates/header', $data);
			        $this->load->view('news/create');
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
			        $this->load->view('news/success');
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

	                $data["title"] = "News";
	                $this->news_model->delete_news($slug);
	                /*var_dump($data["news_item"]);*/
	                $this->load->view('templates/header', $data);
	                /*var_dump($data["news"]);*/
	                $this->load->view('news/success');
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
	                /*var_dump($data["news_item"]);*/
	                $this->load->view('templates/header', $data);
	                /*var_dump($data["news"]);*/
	                $this->load->view('news/success');
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
			        $this->load->view('news/success');
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
			        $this->load->view('templates/header');
			        $this->load->view('news/create');
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

	}

	/*https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/news/create*/

	/*https://www.studenti.famnit.upr.si/~klen/CodeIgniter/index.php/news/delete/news-title-1*/


	/*https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/news/index/*/

	/*https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/news/view/news_title_1/*/

	/*https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/view/news/news_title_1*/

