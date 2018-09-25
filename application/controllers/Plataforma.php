<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Plataforma extends CI_Controller{

        public function __construct(){
            parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('plataforma_model');
            $this->load->library('session');
        }

        public function index(){
            $this->load->view('login');
        }

        public function login(){
            //$this->load->view('');
        }

    }    
?>