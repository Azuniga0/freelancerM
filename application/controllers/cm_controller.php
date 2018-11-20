<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class cm_controller extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->helper('url','form');
  	 		$this->load->model('cm_model');
            $this->load->library('session');
        }

        public function home(){
            $this->load->view('General/header_on.php');
            $this->load->view('CommunityManager/navbar_cm.php');
            $this->load->view('CommunityManager/home_cm.php');
            $this->load->view('General/footer_on.php');
        }
        
        public function pendientes(){
            $data['pendientes'] = $this->cm_model->pedientes($_SESSION['id_usuario']);
            $data['pendientes2'] = $this->cm_model->pedientes2($_SESSION['id_usuario']);
            $this->load->view('General/header_on.php');
            $this->load->view('CommunityManager/navbar_cm.php');
            $this->load->view('CommunityManager/pedientes.php', $data);
            $this->load->view('General/footer_on.php');
        }

        public function camp(){
            $datos['data']=$this->cm_model->lista_camp("usuarios");
            $this->load->view('General/header_on.php');
            $this->load->view('CommunityManager/navbar_cm.php');
            $this->load->view('CommunityManager/camp.php',$datos);
            $this->load->view('General/footer_on.php');
        }

        public function publication($id){
            $data ['publi'] = $this->cm_model->getpublicacion($id);
            $data ['come'] = $this->cm_model->getcomentarios($id);
            //  echo json_encode($data);
            $this->load->view('General/header_on.php');
            $this->load->view('CommunityManager/publicaion.php', $data);
            $this->load->view('CommunityManager/navbar_cm.php');
            $this->load->view('General/footer_on.php');
        }

        public function aprobar($id){
            $this->cm_model->aprobar($id);
            $data['pendientes'] = $this->cm_model->pedientes($_SESSION['id_usuario']);
            $data['pendientes2'] = $this->cm_model->pedientes2($_SESSION['id_usuario']);
            $this->load->view('General/header_on.php');
            $this->load->view('CommunityManager/navbar_cm.php');
            $this->load->view('CommunityManager/pedientes.php', $data);
            $this->load->view('General/footer_on.php');
        }

        public function tarea($id){
            $data ['at'] = $this->cm_model->getAT($id);
            $this->load->view('General/header_on.php');
            $this->load->view('CommunityManager/tarea.php', $data);
            $this->load->view('CommunityManager/navbar_cm.php');
            $this->load->view('General/footer_on.php');
        }
    }
?>