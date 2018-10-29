<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class GC_controller extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->helper('url','form');
  	 		$this->load->model('GC_model','mupload');
            $this->load->library('session');
        }
        
        public function Slopes(){
            $data['data1'] = $this->GC_model->getPendientes();
            $this->load->view('General/header_on.php');
            $this->load->view('GeneradorContenido/slopes.php', $data);
            $this->load->view('GeneradorContenido/navbar_GC.php');
            $this->load->view('General/footer_on.php');
        }
        public function diary(){
            $this->load->view('General/header_on.php');
            $this->load->view('GeneradorContenido/diary.php');
            $this->load->view('GeneradorContenido/navbar_GC.php');
        }
        public function perfil(){
            $this->load->view('General/header_on.php');
            $this->load->view('GeneradorContenido/perfil.php');
            $this->load->view('GeneradorContenido/navbar_GC.php');
            $this->load->view('General/footer_on.php');
        }
        public function publication(){
            $this->load->view('General/header_on.php');
            $this->load->view('GeneradorContenido/publication.php');
            $this->load->view('GeneradorContenido/navbar_GC.php');
            $this->load->view('General/footer_on.php');
        }
        
        public function subirimgen($id)
        {
            $config['upload_path'] = './assets/img/img_des';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';

            $this->load->library('upload', $config);
		

		if ( ! $this->upload->do_upload('img'))
		{
            $data['error'] = $this->upload->display_errors();
            $this->load->view('General/header_on.php');
            $this->load->view('GeneradorContenido/publication.php',$data);
            $this->load->view('GeneradorContenido/navbar_GC.php');
            $this->load->view('General/footer_on.php');
		}
		else
		{
            $img_info = $this->upload->data();
            
		}
        }

    }    
?>