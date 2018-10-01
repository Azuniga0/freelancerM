<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Admin_controller extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->helper('url','form');
  	 		$this->load->model('admin_model');
            $this->load->library('session');
        }
        
        public function home(){
            $this->load->view('Admin/header_admin.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/home_admin.php');
            $this->load->view('Admin/footer_admin.php');
        }
        
        public function empleados(){
            $this->load->view('Admin/header_admin.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/empleados.php');
            $this->load->view('Admin/footer_admin.php');
        }
        
        public function clientes(){
            $this->load->view('Admin/header_admin.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/clientes.php');
            $this->load->view('Admin/footer_admin.php');
        }
        
        public function camp(){
            $this->load->view('Admin/header_admin.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/camp.php');
            $this->load->view('Admin/footer_admin.php');
        }
        
        public function perfil(){
            $this->load->view('Admin/header_admin.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/perfil.php');
            $this->load->view('Admin/footer_admin.php');
        }

    }    
?>