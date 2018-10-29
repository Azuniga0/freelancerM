<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class sadmin_controller extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->helper('url','form');
  	 		$this->load->model('sadmin_model');
            $this->load->library('session');
        }
        
        //Carga la vista home del admin
        public function home(){
            $this->load->view('General/header_on.php');
            $this->load->view('SuperAdmin/navbar_sadmin.php');
            $this->load->view('SuperAdmin/home_sadmin.php');
            $this->load->view('General/footer_on.php');
        }
        
        //Carga la vista que contiene la lista de empleados
        public function administradores(){
            $datos['data']=$this->sadmin_model->get_data("usuarios");
            $datos['data2']=$this->sadmin_model->get_data2("usuarios");
            $datos['data3']=$this->sadmin_model->get_data3("usuarios");

            $this->load->view('General/header_on.php');
            $this->load->view('SuperAdmin/navbar_sadmin.php');
            $this->load->view('SuperAdmin/sa_empleados.php',$datos);
            $this->load->view('General/footer_on.php');
        }
                
        //Carga la vista del perfil del administrador
        public function perfil(){
            $this->load->view('General/header_on.php');
            $this->load->view('SuperAdmin/navbar_sadmin.php');
            $this->load->view('SuperAdmin/sa_perfil.php');
            $this->load->view('General/footer_on.php');
        }

        //Carga el formulario para un nuevo empleado
        public function vista_nuevo_sa_empleado(){
            $this->load->view('General/header_on.php');
            $this->load->view('SuperAdmin/navbar_sadmin.php');
            $this->load->view('SuperAdmin/nuevo_sa_empleado.php');
            $this->load->view('General/footer_on.php');
        }

        //Carga el formulario para un existente empleado
        public function vista_existente_sa_empleado(){
            $this->load->view('General/header_on.php');
            $this->load->view('SuperAdmin/navbar_sadmin.php');
            $this->load->view('SuperAdmin/existente_sa_empleado.php');
            $this->load->view('General/footer_on.php');
        }
        
        //Toma los datos del formulario de empleado y los envia al modelo para la inserción
        function add(){
            $id=$_SESSION['id_usuario'];

            $fecha=date("Y/m/d") ;
            if($this->input->post('register')){
            
            //Check whether user upload picture
            if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = 'img/perfiles/';
                $config['allowed_types'] = '*';
                $config['file_name'] = $_FILES['picture']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = 'user.jpg';
                }
            }else{
                $picture = 'user.jpg';
            }
            
            $id=$_SESSION['id_usuario'];
            $usuario=array(
                'nombre'=>$this->input->post('nombre'),
                'rfc'=>$this->input->post('rfc'),
                'direccion'=>$this->input->post('direccion'),   
                'username'=>$this->input->post('username'),
                'password'=>sha1($this->input->post('password')),         
                'rol'=>$this->input->post('tipo_usuario'),
                'id_estado_us'=>('1'),
                'estado_rep'=>$this->input->post('estado_rep'),       
                'cp'=>$this->input->post('cp'),
                'correo'=>$this->input->post('correo'),
                'telefono'=>$this->input->post('telefono'),
                'imagen'=>$picture,
                'fecha_alta'=>($fecha),
                'creador'=>($id),
            );
            
            //Pass user data to model
            $insertUserData = $this->admin_model->nuevo_empleado($usuario);
            
            //Storing insertion status message.
            if($insertUserData){
                $this->session->set_flashdata('success_msg', 'El usuario ha sido añadido con éxito');
            }else{
                $this->session->set_flashdata('error_msg', 'Ha ocurrido un error, intenta de nuevo');
            }
            }
            //Form for adding user data
            //$this->load->view('SuperAdmin/nuevo_sa_empleado.php');
            redirect('index.php/sadmin_controller/vista_nuevo_sa_empleado', 'refresh');  
        }


}
     
?>