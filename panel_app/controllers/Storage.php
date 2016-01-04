<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Storage extends CI_Controller {

        var $data;
        protected  $menu_main_name = 'storage';
        protected  $menu_sub_index = 0;
        
        function __construct() {
            parent::__construct();
            if(!$this->auth->is_logined())
            {
                redirect('/profile/login');
            }
            $this->data['menu_main_name'] = $this->menu_main_name;
            $this->data['menu_sub_index'] = $this->menu_sub_index;
            $this->load->model('storage_model');
            $this->load->helper('storage_helper');
            $this->data['header'] = $this->themelib->get_header('Хранилище','',  $this->data);
            $this->data['footer'] = $this->themelib->get_footer();
            
        }


        public function index()
	{
            $this->data['header']  = $this->themelib->get_header('Хранилище');
            $this->data['footer']  = $this->themelib->get_footer();
            $this->data['folders'] = $this->storage_model->get_folders_in_folder();
            $this->data['files']   = $this->storage_model->get_files_in_folder();
            $this->load->view('/storage/index',  $this->data);
	}
}
