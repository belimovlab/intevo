<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Storage_model extends CI_Model {

        

        public function __construct()
        {
                parent::__construct();
        }

        public function get_folders_in_folder($parent_folder_id='')
        {
            return  $this->db->get_where('storage',array(
                        'is_folder'=>1,
                        'parent_folder'=>$parent_folder_id
                    ))->result();
        }
        
        public function get_files_in_folder($parent_folder_id='')
        {
            return  $this->db->get_where('storage',array(
                        'is_folder'=>0,
                        'parent_folder'=>$parent_folder_id
                    ))->result();
        }
}