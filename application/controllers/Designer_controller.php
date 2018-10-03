<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Designer_controller extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->helper('url','form');
  	 		$this->load->model('designer_model');
            $this->load->library('session');
        }
        
        public function Slopes(){
            $this->load->view('General/header_on.php');
            $this->load->view('designer/slopes.php');
            $this->load->view('designer/navbar_designer.php');
            $this->load->view('General/footer_on.php');
        }
        

    }    
?>