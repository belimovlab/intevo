<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

        var $data;
    
        function __construct() {
            parent::__construct();
            if(!$this->auth->is_logined())
            {
                redirect('/profile/login');
            }
        }


        public function index()
	{
		$this->load->view('welcome_message');
	}
}
