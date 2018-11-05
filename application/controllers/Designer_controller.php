<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Designer_controller extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->helper('url','form');
  	 		$this->load->model('Designer_model');
            $this->load->library('session');
        }
        
        public function Slopes(){
            $data['data1'] = $this->Designer_model->getPendientes($_SESSION['id_usuario']);
            $this->load->view('General/header_on.php');
            $this->load->view('designer/slopes.php', $data);
            $this->load->view('designer/navbar_designer.php');
            $this->load->view('General/footer_on.php');
        }
        public function diary(){
            $this->load->view('General/header_on.php');
            $this->load->view('designer/diary.php');
            $this->load->view('designer/navbar_designer.php');
        }
        public function perfil(){
            $this->load->view('General/header_on.php');
            $this->load->view('designer/perfil.php');
            $this->load->view('designer/navbar_designer.php');
            $this->load->view('General/footer_on.php');
        }
        public function publication($id){
            $data ['publi'] = $this->Designer_model->getpublicacion($id);
            //  echo json_encode($data);
            $this->load->view('General/header_on.php');
            $this->load->view('Designer/publication.php', $data);
            $this->load->view('Designer/navbar_designer.php');
            $this->load->view('General/footer_on.php');
        }
        
        public function subirimgen($id){
            $data ['publi'] = $this->Designer_model->getpublicacion($id);
            
            
                $config['upload_path'] = 'assets/img/img_des';
                $config['allowed_types'] = '*';

                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if(! $this->upload->do_upload('archivo')){
                    $data ['error'] = "Error al subir la imagen";
                    $this->load->view('General/header_on.php');
                    $this->load->view('Designer/publication.php', $data);
                    $this->load->view('Designer/navbar_designer.php');
                    $this->load->view('General/footer_on.php');
                }else{
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                    //echo json_encode($uploadData['file_name']) ;
                    $this->Designer_model->subirimgen($picture, $id);
                    redirect('index.php/Designer_controller/publication/'.$id);
                }            
        }

    }    
?>