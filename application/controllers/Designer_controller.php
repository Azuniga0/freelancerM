<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Designer_controller extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->helper('url','form');
  	 		$this->load->model('designer_model');
            $this->load->library('session');
        }
        
        public function home(){
            $this->load->view('designer/header_designer.php');
            $this->load->view('designer/navbar_designer.php');
            $this->load->view('designer/home_designer.php');
            $this->load->view('designer/footer_designer.php');
        }
        
        public function empleados(){
            $this->load->view('designer/header_designer.php');
            $this->load->view('designer/navbar_designer.php');
            $this->load->view('designer/empleados.php');
            $this->load->view('designer/footer_designer.php');
        }
        
        public function clientes(){
            $this->load->view('designer/header_designer.php');
            $this->load->view('designer/navbar_designer.php');
            $this->load->view('designer/clientes.php');
            $this->load->view('designer/footer_designer.php');
        }
        
        public function camp(){
            $this->load->view('designer/header_designer.php');
            $this->load->view('designer/navbar_designer.php');
            $this->load->view('designer/camp.php');
            $this->load->view('designer/footer_designer.php');
        }
        
        public function perfil(){
            $this->load->view('designer/header_designer.php');
            $this->load->view('designer/navbar_designer.php');
            $this->load->view('designer/perfil.php');
            $this->load->view('designer/footer_designer.php');
        }

    }    
?>