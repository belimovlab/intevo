<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

        var $data;
        
        protected $url_permission  = array(
            'profile/login',
            'profile/try_login',
            'profile/forgot',
            'profile/send_forgot',
            'profile/try_forgot',
            'profile/send_new_password',
            'profile/reset_password',
            'profile/save_new_password'
        );
                
        function __construct() {
            parent::__construct();
            if( $this->uri->segment(2) == 'reset_password')
            {
                $this->url_permission[] = $this->uri->uri_string;
            }
            if(!$this->auth->is_logined() && !in_array($this->uri->uri_string, $this->url_permission) )
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
                $this->data['success'] = $this->themelib->getSessionValue('success');
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
                        if($this->profile_model->set_new_password_by_email($this->input->post('email')))
                        {
                            $this->send_new_password($this->input->post('email'));
                            $this->session->set_userdata('success','На указанный Email отправлено письмо с инструкциями для восстановления доступа.');
                            redirect('/profile/forgot');
                        }
                        else
                        {
                            $this->session->set_userdata('error','Данный Email не зарегистрирован в системе.');
                            redirect('/profile/forgot');
                        }
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
        
        private function send_new_password($email)
        {
            $active_code  = $this->profile_model->get_active_code_by_email($email);
            if($active_code)
            {
                $this->data['active_code'] = $active_code;
                $this->data['email'] = $email;
                $content =  $this->load->view('/email_template/forgot',  $this->data,true);
                $this->profile_model->send_email($email, 'Восстановление пароля', $content);
                $this->session->set_userdata('success','На указанный Email отправлено письмо с инструкциями.');
                redirect('/profile/forgot');
            }
            else
            {
                return false;
            }
        }
        
        
        public function reset_password($email='',$active_code='')
        {
            if($email && $active_code)
            {
                $this->data['email'] = $email;
                $this->data['active_code'] = $active_code;        
                $this->data['error'] = $this->themelib->getSessionValue('error');
                $this->load->view('profile/reset_password',  $this->data); 
            }
            else
            {
                redirect('/profile/login');
            }
        }
        
        public function save_new_password()
        {
            if($this->auth->is_logined())
            {
                redirect('/');
            }
            else
            {
                if(!$this->input->post('password') || !$this->input->post('re_password') || !$this->input->post('password') != !$this->input->post('re_password'))
                {
                    $this->session->set_userdata('error','Заполните все поля.');
                    redirect('/profile/login');
                }
                else
                {
                    if(!$this->input->post('user_email') || !$this->input->post('user_active_code'))
                    {
                        $this->session->set_userdata('error','Неверные данные для восстановления пароля.');
                        redirect('/profile/login');
                    }
                    else
                    {

                        if($this->profile_model->get_active_code_by_email($this->input->post('user_email')) == $this->input->post('user_active_code'))
                        {
                            $this->profile_model->set_new_password_by_email_and_active_code($this->input->post('user_email'), $this->input->post('user_active_code'),  $this->input->post('password'));
                            
                            $user_info = $this->profile_model->getUserByEmailAndPassword($this->input->post('user_email'),$this->input->post('password'));
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
                        else
                        {
                            $this->session->set_userdata('error','Неверные данные для восстановления пароля.');
                            redirect('/profile/reset_password/'.$this->input->post('user_email').'/'.$this->input->post('user_active_code'));
                        }
                    }
                }
            }
        }
        
        
}
