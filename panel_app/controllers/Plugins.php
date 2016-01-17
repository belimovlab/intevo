<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plugins extends CI_Controller {

        var $data;
        protected  $menu_main_name = 'plugins';
        protected  $menu_sub_index = 0;
        
        function __construct() {
            parent::__construct();
            if(!$this->auth->is_logined())
            {
                $this->auth->set_redirect_url();
                redirect('/profile/login');
                
            }
            $this->data['menu_main_name'] = $this->menu_main_name;
            $this->data['menu_sub_index'] = $this->menu_sub_index;
            $this->data['header'] = $this->themelib->get_header('Рабочий стол','',  $this->data);
            $this->data['footer'] = $this->themelib->get_footer();
        }


        public function index()
	{
            $this->data['header'] = $this->themelib->get_header('Плагины');
            $this->data['footer'] = $this->themelib->get_footer('storage');
            $this->load->view('plugins/index',  $this->data);
	}
        
        public function page_1()
	{
            if ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' )
            {
                $this->data['header'] = '';
                $this->data['footer'] = '';
                $this->load->view('plugins/page_1',  $this->data);
            }
            else
            {
                $this->data['header'] = $this->themelib->get_header('Плагины');
                $this->data['footer'] = $this->themelib->get_footer('plugins');
                $this->load->view('plugins/page_1',  $this->data);
            }
	}
        
        public function page_2()
	{
            if ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' )
            {
                $this->data['header'] = '';
                $this->data['footer'] = '';
                $this->load->view('plugins/page_2',  $this->data);
            }
            else
            {
                $this->data['header'] = $this->themelib->get_header('Плагины');
                $this->data['footer'] = $this->themelib->get_footer('plugins');
                $this->load->view('plugins/page_2',  $this->data);
            }
	}
        
        public function page_3()
	{
            if ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' )
            {
                $this->data['header'] = '';
                $this->data['footer'] = '';
                $this->load->view('plugins/page_3',  $this->data);
            }
            else
            {
                $this->data['header'] = $this->themelib->get_header('Плагины');
                $this->data['footer'] = $this->themelib->get_footer('plugins');
                $this->load->view('plugins/page_3',  $this->data);
            }
	}
        
        public function page_4()
	{
            if ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' )
            {
                $this->data['header'] = '';
                $this->data['footer'] = '';
                $this->load->view('plugins/page_4',  $this->data);
            }
            else
            {
                $this->data['header'] = $this->themelib->get_header('Плагины');
                $this->data['footer'] = $this->themelib->get_footer('plugins');
                $this->load->view('plugins/page_4',  $this->data);
            }
	}
}
