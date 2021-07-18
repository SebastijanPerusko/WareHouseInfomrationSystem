	<?php
	class News extends CI_Controller {

	        public function __construct()
	        {
	                parent::__construct();
	                $this->load->model('news_model');
	                $this->load->helper('url_helper');
	                $this->load->helper('form');
                	$this->load->library('session');

	        }

	        public function index()
	        {
	                $data['oglas'] = $this->news_model->get_news();

	                $data["title"] = "News";
	                $this->load->view('templates/header', $data);
	                /*var_dump($data["news"]);*/
	                $this->load->view('news/index', $data);
	                $this->load->view('templates/footer');

	                
	        }

	        public function view($num = NULL)
	        {
	                $data['news_item'] = $this->news_model->get_news($num);

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
			    $this->form_validation->set_rules('type', 'Type', 'required');
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
				    	//var_dump($GLOBALS);
			        $lastAdded = $this->news_model->set_news();
			        echo $lastAdded;

			        $this->load->view('news/success');
			        echo "Exit";
			        echo $lastAdded;
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

	}

	/*https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/news/create*/

	/*https://www.studenti.famnit.upr.si/~klen/CodeIgniter/index.php/news/delete/news-title-1*/


	/*https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/news/index/*/

	/*https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/news/view/news_title_1/*/

	/*https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/view/news/news_title_1*/

