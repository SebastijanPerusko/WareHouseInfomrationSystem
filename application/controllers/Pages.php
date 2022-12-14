<?php
class Pages extends CI_Controller {

        public function view($page = 'home')
        {
                $this->load->helper('url_helper');
        	if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        	{
                // Whoops, we don't have a page for that!
                show_404();
        	}

        	$data["title"] = ucfirst($page);
        	//echo $page;
        	$this->load->view('templates/header', $data);
        	$this->load->view('pages/' . $page);
        	$this->load->view('templates/footer');
        }
}

/*https://www.studenti.famnit.upr.si/~89191059/CodeIgniter/index.php/pages/view/about*/