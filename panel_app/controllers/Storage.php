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
                $this->auth->set_redirect_url();
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
        
        
        public function add_folder($parent_folder='')
        {
            $this->data['header']  = $this->themelib->get_header('Добавить новую папку');
            $this->data['footer']  = $this->themelib->get_footer();
            $this->data['parent_folder'] = $parent_folder;
            $this->load->view('/storage/add_folder',  $this->data);
        }
        
        
        public function save_folder()
        {
            if(!$this->input->post('folder_name'))
            {
                $this->session->set_userdata('error','Введите название папки');
                redirect('/storage/add_folder/'.$this->input->post('parent_folder'));
            }
            else
            {
                $this->storage_model->add_new_folder($this->input->post('folder_name'),  $this->input->post('parent_folder'));
                if($this->input->post('parent_folder'))
                {
                    redirect('/storage/folder/'.$this->input->post('parent_folder'));
                }
                else
                {
                    redirect('/storage/');
                }
                
            }
        }
        
        public function folder($folder_id='')
        {
            if(is_numeric($folder_id))
            {
                $this->data['folder_info'] = $folder_id ? $this->storage_model->get_folder_info($folder_id) : null;
            
                if($this->data['folder_info']->id)
                {
                    $this->data['header']  = $this->themelib->get_header('Хранилище');
                    $this->data['footer']  = $this->themelib->get_footer();
                    $this->data['folders'] = $this->storage_model->get_folders_in_folder($folder_id);
                    $this->data['files']   = $this->storage_model->get_files_in_folder($folder_id);
                    $this->data['parent_id'] = $folder_id;
                    $this->load->view('/storage/folder',  $this->data);
                }
                else
                {
                    $this->data['header']  = $this->themelib->get_header('Ошибка доступа к папке');
                    $this->data['footer']  = $this->themelib->get_footer();
                    $this->load->view('/storage/folder_not_exists',  $this->data);
                }
            }
            else
            {
                $this->data['header']  = $this->themelib->get_header('Ошибка доступа к папке');
                $this->data['footer']  = $this->themelib->get_footer();
                $this->load->view('/storage/folder_not_exists',  $this->data);
            }

        }
        
}
