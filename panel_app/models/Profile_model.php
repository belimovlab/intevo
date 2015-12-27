<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Profile_model extends CI_Model {

        public $title;
        public $content;
        public $date;

        public function __construct()
        {
                parent::__construct();
        }

        public function get_last_ten_entries()
        {
                $query = $this->db->get('entries', 10);
                return $query->result();
        }

        public function getUserByEmailAndPassword($email='',$password='')
        {
            if($email == '' || $password == '')
            {
                return false;
            }
            else
            {
                $tmp_info =  $this->db->get_where('profile',array(
                    'email'=>$email,
                    'password'=>md5(ENCRYPTION_KEY.$password)
                    ))->row();
                if($tmp_info->id)
                {
                    return $tmp_info;
                }
                else
                {
                    return false;
                }
            }
        }
        
        public function send_email($to,$subject,$content,$from='')
        {
            $from_email = $from ? $from : $this->session->userdata('system_info')->from_email;
            $headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
            $headers .= "From: Администрация сервиса <".$from.">\r\n"; 
            $headers .= "Bcc: <".$from.">\r\n"; 
            mail($to, $subject, $content, $headers); 
        }

        public function check_user_by_email($email)
        {
            return $this->db->get_where('profile',array('email'=>$email))->row()->id ? true : false;
        }
        
        
        public function set_new_password_by_email($email)
        {
            $user_info = $this->db->get_where('profile',array('email'=>$email))->row();
            if(!$user_info->id)
            {
                return false;
            }
            else
            {
                $new_active_code = md5(ENCRYPTION_KEY.mktime());
                $this->db->update('profile',array(
                    'active_code'=>$new_active_code
                ),array(
                    'email'=>$user_info->email
                ));
                return true;
            }
        }
        
        public function get_active_code_by_email($email)
        {
            $active_code = $this->db->get_where('profile',array('email'=>$email))->row()->active_code;
            return $active_code ? $active_code : false;
        }
        
        public function set_new_password_by_email_and_active_code($email,$active_code,$password)
        {
            $this->db->update('profile',array(
                'active_code'=>'',
                'password'=>md5(ENCRYPTION_KEY.$password)
            ),array(
                'email'=>$email
            ));
        }
        
}