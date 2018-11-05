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

        public function camp(){
            $datos['data']=$this->cm_model->lista_camp("usuarios");
            $this->load->view('General/header_on.php');
            $this->load->view('CommunityManager/navbar_cm.php');
            $this->load->view('CommunityManager/camp.php',$datos);
            $this->load->view('General/footer_on.php');
        }
    }
?>