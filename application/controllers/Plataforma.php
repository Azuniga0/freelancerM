<?php
    class Plataforma extends CI_Controller{

        public function __construct(){
            parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('plataforma_model');
            $this->load->library('session');
        }

    }    
?>