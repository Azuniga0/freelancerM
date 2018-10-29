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
            $this->load->view("header.php");
            $this->load->view("login.php");
            $this->load->view("footer.php");
        }

        function login_user(){  
            $user_login=array(
                'username'=>$this->input->post('username'),
                'password'=>sha1($this->input->post('password'))
            );
            //print_r ($user_login);

            $data=$this->plataforma_model->login_user($user_login['username'],$user_login['password']);
            if($data){
                $this->session->set_userdata('id_usuario',$data['id_usuario']);
                $this->session->set_userdata('username',$data['username']);
                $this->session->set_userdata('rol',$data['rol']); 
                $this->session->set_userdata('n_tipo_usuario',$data['n_tipo_usuario']); 

                switch ($data['rol']) {
                    case '1':
                        $this->load->view('Admin/header_admin.php');
                        $this->load->view('Admin/navbar_admin.php');
                        $this->load->view('Admin/home_admin.php');
                        $this->load->view('Admin/footer_admin.php');
                    break;
                    case '2':
                        $this->load->view('CommunityManager/home_cm.php');                        
                    break;
                    case '3':
                        $this->load->view('General/header_on.php');
                        $this->load->view('GeneradorContenido/navbar_gc.php');
                        $this->load->view('GeneradorContenido/slopes.php');
                        $this->load->view('General/footer_on.php');
                    break;
                    case '4':
                        $this->load->view('General/header_on.php');
                        $this->load->view('designer/navbar_designer.php');
                        $this->load->view('designer/slopes.php');
                        $this->load->view('General/footer_on.php');
                    break;                   
                    default:
                        //$this->load->view('header.php');
                        $this->load->view('login.php');
                        //$this->load->view('footer.php');
                    break;
                }

            }else{
                $this->session->set_flashdata('error_msg', 'Ha ocurrido un error, intente de nuevo');
                $this->load->view("header.php");
                $this->load->view("login.php");
                $this->load->view("footer.php");
            }
        }

        public function salir(){
            $this->session->sess_destroy();
            redirect('index.php/plataforma/index', 'refresh');
        }
        

    }    
?>