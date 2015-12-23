<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

        var $data;
        
        protected $url_permission  = array(
            'profile/login',
            'profile/try_login',
            'profile/forgot',
            'profile/send_forgot'
        );
                
        function __construct() {
            parent::__construct();
            if(!$this->auth->is_logined() && !in_array($this->uri->uri_string, $this->url_permission))
            {
                redirect('/profile/login');
            }
        }


        public function index()
	{
		$this->load->view('welcome_message');
	}
        
        public function login()
        {
            if($this->auth->is_logined())
            {
                redirect('/');
            }
            else
            {
                $this->data['error'] = $this->themelib->getSessionValue('error');
                $this->load->view('profile/login',  $this->data); 
                $this->profile_model->send_email();
            }
            
        }
        
        public function try_login()
        {
            if($this->auth->is_logined())
            {
                redirect('/');
            }
            else
            {
                if(!$this->input->post('email') || !$this->input->post('password'))
                {
                    $this->session->set_userdata('error','Заполните все поля.');
                    redirect('/profile/login');
                }
                else
                {
                    $user_info = $this->profile_model->getUserByEmailAndPassword($this->input->post('email'),$this->input->post('password'));
                    if($user_info->id)
                    {
                        $this->auth->user_login($user_info);
                        redirect('/');
                    }
                    else
                    {
                        $this->session->set_userdata('error','Пользователя с такими данными нет.');
                        redirect('/profile/login');
                    }
                }
            }
        }
        
        
        public function logout()
        {
            if($this->auth->is_logined())
            {
                $this->auth->user_logout();
                redirect('/profile/login');
            }
            else
            {
                redirect('/profile/login');
            }
        }
        
        
        public function forgot()
        {
            if($this->auth->is_logined())
            {
                redirect('/');
            }
            else
            {
                $this->data['error'] = $this->themelib->getSessionValue('error');
                $this->load->view('profile/forgot',  $this->data); 
            }
        }
        
        public function try_forgot()
        {
            if($this->auth->is_logined())
            {
                redirect('/');
            }
            else
            {
                if($this->input->post('email'))
                {
                    if($this->profile_model->check_user_by_email($this->input->post('email')))
                    {
                        //$this->db->
                    }
                    else
                    {
                        $this->session->set_userdata('error','Данный Email не зарегистрирован в системе.');
                        redirect('/profile/forgot');
                    }
                }
                else
                {
                    $this->session->set_userdata('error','Заполните все поля.');
                    redirect('/profile/forgot');
                }
                
            }
        }
        
        
}
