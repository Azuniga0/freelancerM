<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Plataforma extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->helper('url','form');
  	 		$this->load->model('plataforma_model');
            $this->load->library('session');
        }

        public function index(){
            $data['title']='Code igniter tuto';
            $this->load->view("login.php");
        }

        function login_user(){
  
  $user_login=array(

  'username'=>$this->input->post('username'),
  'password'=>sha1($this->input->post('password'))
  //'password'=>($this->input->post('password'))
    );
    //print_r ($user_login);

    $data=$this->plataforma_model->login_user($user_login['username'],$user_login['password']);
      if($data)
      {
        $this->session->set_userdata('id_us',$data['id_us']);
        $this->session->set_userdata('username',$data['username']);
        $this->session->set_userdata('nombre_us',$data['nombre_us']); 

       $this->load->view("welcome_message.php");

      }
      else{
        $this->session->set_flashdata('error_msg', 'Ha ocurrido un error, intente de nuevo');
       $this->load->view("login.php");

      }

  }

        public function login_admin(){
            //'http://localhost:8080/freelancer/plataforma/login'
            $this->load->view("admin/login_admin.php");
        }

    }    
?>