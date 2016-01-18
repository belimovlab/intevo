<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Storage_model extends CI_Model {

        

        public function __construct()
        {
                parent::__construct();
        }

        public function get_folders_in_folder($parent_folder_id='')
        {
            return  $this->db->order_by('name')->get_where('storage',array(
                        'is_folder'=>1,
                        'parent_folder'=>$parent_folder_id
                    ))->result();
        }
        
        public function get_files_in_folder($parent_folder_id='')
        {
            return  $this->db->order_by('name')->get_where('storage',array(
                        'is_folder'=>0,
                        'parent_folder'=>$parent_folder_id
                    ))->result();
        }
        
        
        public function add_new_folder($name,$parent_folder='')
        {
            $this->db->insert('storage',array(
                'id'=>'',
                'name'=>  $name,
                'is_folder'=>1,
                'parent_folder'=>$parent_folder,
                'create_date'=>date('Y-m-d H:i:s')
            ));
        }
        
        public function get_folder_info($folder_id)
        {
            return $this->db->get_where('storage',array(
                'id'=>$folder_id
            ))->row();
        }
        
        
        public function save_file_into_db($file,$file_name,$folder_id='')
        {
            $folder_id = $folder_id && $folder_id != 'undefined' ? $folder_id : '';
            $this->db->insert('storage',array(
                'id'=>'',
                'name'=>  $file_name,
                'is_folder'=>0,
                'parent_folder'=>$folder_id,
                'create_date'=>date('Y-m-d H:i:s'),
                'size'=>  filesize('../temp/'.$file),
                'url'=>'/temp/'.$file,
                'myme_type'=>  mime_content_type('../temp/'.$file)
            ));
        }
}