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
        
        public function send_email()
        {
            
            $to  = "sbelimov@gmail.com" ; 

            $subject = "Тестовое письмо"; 

            $message = ' 
            <html> 
                <head> 
                    <title>Проверка письма</title> 
                </head> 
                <body> 
                    <p>Тестовое сообщение</p> 
                </body> 
            </html>'; 

            $headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
            $headers .= "From: Svyatoslav Belimov <sbelimov@gmail.com>\r\n"; 
            $headers .= "Bcc: sbelimov@gmail.com>\r\n"; 

            echo mail($to, $subject, $message, $headers); 
        }

}