<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class GC_controller extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->helper('url','form');
  	 		$this->load->model('GC_model');
  	 		// $this->load->library('mupload');    
            $this->load->library('session');
            $this->Slopes();
        }
        
        public function Slopes(){
            $data['data1'] = $this->GC_model->getPendientes($_SESSION['id_usuario']);
            $data['data2'] = $this->GC_model->getPendientes2($_SESSION['id_usuario']);
            // echo json_encode($data);
            $this->load->view('General/header_on.php');
            $this->load->view('GeneradorContenido/slopes.php', $data);
            $this->load->view('GeneradorContenido/navbar_GC.php');
            $this->load->view('General/footer_on.php');
        }
        public function diary(){
            //$data['dataC'] = $this->GC_model->getPublicaciones();
            //echo json_encode($r);
            $this->load->view('General/header_on.php');
            $this->load->view('GeneradorContenido/diary.php');
            $this->load->view('GeneradorContenido/navbar_GC.php');
        }
        public function perfil(){
            $this->load->view('General/header_on.php');
            $this->load->view('GeneradorContenido/perfil.php');
            $this->load->view('GeneradorContenido/navbar_gc.php');
            $this->load->view('General/footer_on.php');
        }
        public function publication($id){
            $data ['publi'] = $this->GC_model->getpublicacion($id);
            $data ['come'] = $this->GC_model->getcomentarios($id);
            //  echo json_encode($data);
            $this->load->view('General/header_on.php');
            $this->load->view('GeneradorContenido/publication.php', $data);
            $this->load->view('GeneradorContenido/navbar_GC.php');
            $this->load->view('General/footer_on.php');
        }

        public function tareaRealizada($id)
        {
            $this->GC_model->TR($id);
            $data['data1'] = $this->GC_model->getPendientes($_SESSION['id_usuario']);
            $data['data2'] = $this->GC_model->getPendientes2($_SESSION['id_usuario']);            
            $this->load->view('General/header_on.php');
            $this->load->view('GeneradorContenido/slopes.php', $data);
            $this->load->view('GeneradorContenido/navbar_GC.php');
            $this->load->view('General/footer_on.php');
        }
        
        public function comentar($id){
            $data ['publi'] = $this->GC_model->getpublicacion($id);
            $data ['come'] = $this->GC_model->getcomentarios($id);
            if($this->input->post('comentario')){
            $comen = array(
                'id_usuario' => $_SESSION['id_usuario'],
                'id_publicacion' => $id,
                'contenido'=>$this->input->post('comentario'),
                'fecha' => date("Y/m/d"),
            );
            $this->GC_model->comentar($comen);
                redirect('index.php/GC_controller/publication/'.$id);
            }else{
                $data ['error1'] = "no hay comentario";
                $this->load->view('General/header_on.php');
                $this->load->view('GeneradorContenido/publication.php', $data);
                $this->load->view('GeneradorContenido/navbar_GC.php');
                $this->load->view('General/footer_on.php');
            }
        }

        public function subircontenido($id){
            $data ['publi'] = $this->GC_model->getpublicacion($id);            
            $data ['come'] = $this->GC_model->getcomentarios($id);  
            $con=$this->input->post('contenido');
            $this->GC_model->subircontenido($con, $id);
            redirect('index.php/GC_controller/publication/'.$id);
        }
        public function subirimg($id){
            $data ['publi'] = $this->GC_model->getpublicacion($id);            
            $data ['come'] = $this->GC_model->getcomentarios($id);         
            
            $config['upload_path'] = 'assets/img/img_des';
            $config['allowed_types'] = '*';
            
            
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if(! $this->upload->do_upload('archivo')){
                $data ['error2'] = "Error al subir la imagen";
                // echo json_encode($this->upload);
                $this->load->view('General/header_on.php');
                $this->load->view('GeneradorContenido/publication.php', $data);
                $this->load->view('GeneradorContenido/navbar_GC.php');
                $this->load->view('General/footer_on.php');
            }else{
                $uploadData = $this->upload->data();
                $picture = $uploadData['file_name'];
                //echo json_encode($uploadData['file_name']) ;
                $this->GC_model->subirimg($picture, $id);
                redirect('index.php/GC_controller/publication/'.$id);
            }               
        }

    }    
?>