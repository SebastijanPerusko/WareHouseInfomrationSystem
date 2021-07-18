<?php 
class User_authentication extends CI_Controller{

public function __construct() {
    parent::__construct();

    $this->load->helper('url_helper');

    // Load form helper library
    $this->load->helper('form');

    // Load form validation library
    $this->load->library('form_validation');

    // Load session library
    $this->load->library('session');

    // Load database
    $this->load->model('login_database');
    
}

// Show login page
public function index() {
    $this->load->view('templates/header');
    $this->load->view('user_authentication/login_form');
    $this->load->view('templates/footer');
}

// Show registration page
public function show() {
    $this->load->view('templates/header');
    $this->load->view('user_authentication/registration_form');
    $this->load->view('templates/footer');
}

// Validate and store registration data in database
public function signup() {

    // Check validation for user input in SignUp form
    $this->form_validation->set_rules('name', 'Name', 'trim|required');
    $this->form_validation->set_rules('secondname', 'SecondName', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required');
    $this->form_validation->set_rules('tel', 'Tel', 'trim|required');
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');



    /*$this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('email_value', 'Email', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');*/

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('templates/header');
        $this->load->view('user_authentication/registration_form');
        $this->load->view('templates/footer');
    } else {
        $hash = $this->input->post('password');
        $password_hash = password_hash($hash, PASSWORD_DEFAULT);
        $data = array(
            'ime' => $this->input->post('name'),
            'priimek' => $this->input->post('secondname'),
            'email' => $this->input->post('email'),
            'tel' => $this->input->post('tel'),
            'username' => $this->input->post('username'),
            'geslo' => $password_hash
        );
        $result = $this->login_database->registration_insert($data);
        if ($result == TRUE) {
            $data['message_display'] = 'Registration Successfully !';
            $this->load->view('templates/header');
            $this->load->view('user_authentication/login_form', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header');
            $this->load->view('user_authentication/registration_form');
            $this->load->view('templates/footer');
        }
    }
}

public function admin(){

        if(isset($this->session->userdata['logged_in'])){
            $data['username'] = $this->session->userdata['logged_in']['username'];
            $data['email'] = $this->session->userdata['logged_in']['email'];

            $this->load->view('templates/header');
            $this->load->view('user_authentication/admin_page', $data);
            $this->load->view('templates/footer');
        }else{
            $data['message_display'] = 'Signin to view admin page!';
            $this->load->view('templates/header');
            $this->load->view('user_authentication/login_form', $data);
            $this->load->view('templates/footer');
        }
}

// Check for user login process
public function signin() {

    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    $data = array(
        'username' => $this->input->post('username'),
        'geslo' => $this->input->post('password')
    );
    $result = $this->login_database->login($data);
    if ($result == TRUE) {

        $username = $this->input->post('username');
        $result = $this->login_database->read_user_information($username);
        if ($result != false) {
            $session_data = array(
                'username' => $result[0]->username,
                'email' => $result[0]->email,
                'id_u' => $result[0]->id,
            );
            // Add user data in session
            $data = array('error_message' => 'Signin OK');
            $this->session->set_userdata('logged_in', $session_data);
            $this->load->view('templates/header',$data);
            $this->load->view('user_authentication/login_form',$data);
            $this->load->view('templates/footer');
        }
    } else {
        $data = array(
            'error_message' => 'Invalid Username or Password'
        );
        $this->load->view('templates/header');
        $this->load->view('user_authentication/login_form', $data);
        $this->load->view('templates/footer');
    }
}

// Logout from admin page
public function logout() {

    // Removing session data
    $sess_array = array(
        'username' => ''
    );
    $this->session->unset_userdata('logged_in', $sess_array);
    $data['message_display'] = 'Successfully Logout';
    $this->load->view('templates/header');
    $this->load->view('user_authentication/login_form', $data);
    $this->load->view('templates/footer');
}
}