<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Themelib {

        protected $CI;
        protected  $data;


        public function __construct()
        {
            $this->CI =& get_instance();
        }

        public function getSessionValue($session_item_name)
        {
            $tmp_value = $this->CI->session->userdata($session_item_name);
            $this->CI->session->unset_userdata($session_item_name);
            return $tmp_value;
        }
        
}

/* End of file Auth.php */