<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Storage extends CI_Controller {

        var $data;
        protected  $menu_main_name = 'storage';
        protected  $menu_sub_index = 0;
        protected  $xz = 1;
                
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
            $this->data['header']  = $this->themelib->get_header('Хранилище','storage');
            $this->data['footer']  = $this->themelib->get_footer('flow,storage');
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
        
        /**
        *
        * Check if all the parts exist, and 
        * gather all the parts of the file together
        * @param string $dir - the temporary directory holding all the parts of the file
        * @param string $fileName - the original file name
        * @param string $chunkSize - each chunk size (in bytes)
        * @param string $totalSize - original file size (in bytes)
        */
        private function createFileFromChunks($temp_dir, $fileName, $chunkSize, $totalSize) {


            $total_files = 0;
            foreach(scandir($temp_dir) as $file) {
                 if (stripos($file, $fileName) !== false) {
                     $total_files++;
                 }
            }

            if ($total_files * $chunkSize >=  ($totalSize - $chunkSize + 1)) {
                $new_file_name = mktime().'_'.md5($fileName).".".substr($fileName, strrpos($fileName, '.')+1);
                if (($fp = fopen('../temp/'.$new_file_name, 'w')) !== false) {
                    for ($i=1; $i<=$total_files; $i++) {
                        fwrite($fp, file_get_contents($temp_dir.'/'.$fileName.'.part'.$i));
                    }
                    fclose($fp);
                } else {
                    return false;
                }
                if (rename($temp_dir, $temp_dir.'_UNUSED')) {
                    rmdir($temp_dir.'_UNUSED');
                } else {
                    rmdir($temp_dir);
                }
                echo $new_file_name;
            }

        }


        
        public function uploads()
        {


            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $temp_dir = '../temp/'.$_GET['flowIdentifier'];
                $chunk_file = $temp_dir.'/'.$_GET['flowFilename'].'.part'.$_GET['flowChunkNumber'];
                if (file_exists($chunk_file)) {
                    header("HTTP/1.0 200 Ok");
                } else
                {
                  header("HTTP/1.0 404 Not Found");
                }
            }

            if (!empty($_FILES)) foreach ($_FILES as $file) {
                if ($file['error'] != 0) {
                    continue;
                }
                $temp_dir = '../temp/'.$_POST['flowIdentifier'];
                $dest_file = $temp_dir.'/'.$_POST['flowFilename'].'.part'.$_POST['flowChunkNumber'];

                if (!is_dir($temp_dir)) {
                    mkdir($temp_dir, 0777, true);
                }
                if (!move_uploaded_file($file['tmp_name'], $dest_file)) {

                } else {
                    $this->createFileFromChunks($temp_dir, $_POST['flowFilename'],
                            $_POST['flowChunkSize'], $_POST['flowTotalSize']);
                    
                }
            }

        }
        
        
        public function save_file()
        {
            if ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' )
            {
                if($this->input->post('file') && $this->input->post('file_name'))
                {
                    
                }
                else
                {
                    echo -2;
                }
            }
            else
            {
                echo -1;
            }
        }
        
}
