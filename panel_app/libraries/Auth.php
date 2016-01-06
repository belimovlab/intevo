<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Auth {

        protected $CI;
        protected  $data;


        public function __construct()
        {
            $this->CI =& get_instance();
        }

        public function is_logined()
        {
            return $this->CI->session->userdata('user_logined') ? true : false;
        }
        
        public function user_login($user_info)
        {
            $this->CI->session->set_userdata('user_info',$user_info);
            $this->CI->session->set_userdata('user_logined','1');
            $this->CI->session->set_userdata('system_info',  $this->CI->db->get('system')->row());
        }
        
        public function user_logout()
        {
            $this->CI->session->unset_userdata('user_info');
            $this->CI->session->unset_userdata('user_logined');
        }
        
        
        public function set_redirect_url()
        {
            $this->CI->session->set_userdata('redirected_url',$this->CI->uri->uri_string());
        }
}

/* End of file Auth.php */