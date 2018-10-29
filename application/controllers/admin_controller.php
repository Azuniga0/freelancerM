<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Admin_controller extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->helper('url','form');
  	 		$this->load->model('admin_model');
            $this->load->library('session');
        }
        
        //Carga la vista home del admin
        public function home(){
            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/home_admin.php');
            $this->load->view('General/footer_on.php');
        }
        
        //Carga la vista que contiene la lista de empleados
        public function empleados(){
            $datos['data']=$this->admin_model->get_data("usuarios");
            $datos['data2']=$this->admin_model->get_data2("usuarios");
            $datos['data3']=$this->admin_model->get_data3("usuarios");

            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/empleados.php',$datos);
            $this->load->view('General/footer_on.php');
        }
        
        //Carga la vista que contiene la lista de empresas
        public function clientes(){
            $datos['data']=$this->admin_model->c_act("usuarios");
            $datos['data2']=$this->admin_model->c_inac("usuarios");
            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/clientes.php',$datos);
            $this->load->view('General/footer_on.php');
        }
        
        //carga la vista que contiene la lista de campañas
        public function camp(){
            $datos['data']=$this->admin_model->get_act_camp("usuarios");
            $datos['data2']=$this->admin_model->get_inact_camp("usuarios");
            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/camp.php',$datos);
            $this->load->view('General/footer_on.php');
        }
        
        //Carga la vista del perfil del administrador
        public function perfil(){
            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/perfil.php');
            $this->load->view('General/footer_on.php');
        }

        //Carga el formulario para un nuevo empleado
        public function vista_nuevo_empleado(){
            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/nuevo_empleado.php');
            $this->load->view('General/footer_on.php');
        }

        //Carga el formulario para una nueva empresa
        public function vista_nuevo_cliente(){
            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/nuevo_cliente.php');
            $this->load->view('General/footer_on.php');
        }

        //Carga el formulario para una nueva campaña
        public function vista_nueva_camp(){
            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/nueva_camp.php');
            $this->load->view('General/footer_on.php');
        } 
        
        //Toma los datos del formulario de empleado y los envia al modelo para la inserción
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
            //$this->load->view('Admin/nuevo_empleado.php');
            redirect('index.php/admin_controller/vista_nuevo_empleado', 'refresh');  
        }

        //Toma los datos del formulario de empresa y los envia al modelo para inserción
        public function nueva_empresa(){
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
                    $picture = 'empresa.jpg';
                }
            }else{
                $picture = 'empresa.jpg';
            }
            
            $id=$_SESSION['id_usuario'];
            $usuario=array(
                'nombre'=>$this->input->post('nombre'),
                'rfc'=>$this->input->post('rfc'),
                'direccion'=>$this->input->post('direccion'),   
                'username'=>$this->input->post('username'),
                'password'=>sha1($this->input->post('password')),         
                'rol'=>('5'),
                'id_estado_us'=>('1'),
                'estado_rep'=>$this->input->post('estado_rep'),       
                'cp'=>$this->input->post('cp'),
                'correo'=>$this->input->post('correo'),
                'telefono'=>$this->input->post('telefono'),
                'imagen'=>$picture,
                'fecha_alta'=>($fecha),
                'creador'=>($id),
            );
            $usuario_c=array(
                'nombre_cliente'=>$this->input->post('nombre'),
                'rfc'=>$this->input->post('rfc'),
                'direccion'=>$this->input->post('direccion'),   
                'username'=>$this->input->post('username'),
                'password'=>sha1($this->input->post('password')),         
                'rol'=>('5'),
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
            $insertUserData = $this->admin_model->nueva_empresa($usuario,$usuario_c);
            
            //Storing insertion status message.
            if($insertUserData){
                $this->session->set_flashdata('success_msg', 'El usuario ha sido añadido con éxito');
            }else{
                $this->session->set_flashdata('error_msg', 'Ha ocurrido un error, intenta de nuevo');
            }
            }
            //Form for adding user data
            //$this->load->view('Admin/nuevo_empleado.php');            

            redirect('index.php/admin_controller/vista_nuevo_cliente', 'refresh');     
        }

        //Toma los datos del formulario de campaña y los envia al modelo para inserción
        public function nueva_camp(){

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
                    $picture = 'camp.jpg';
                }
            }else{
                $picture = 'camp.jpg';
            }

            $id=$_SESSION['id_usuario'];
            $camp=array(
            'id_cliente'=>$this->input->post('id_cliente'),
            'id_community'=>$this->input->post('id_community'),
            'nombre_camp'=>$this->input->post('nombre'),   
            'objetivo'=>$this->input->post('objetivo'),
            'fecha_creacion'=>$this->input->post('fecha_creacion'),         
            'fecha_termino'=>$this->input->post('fecha_termino'),
            'imagen_camp'=>($picture),
            'id_estado_c'=>('1')
            );

            $this->admin_model->nueva_camp($camp);
            redirect('index.php/admin_controller/camp', 'refresh');
        }

        
    }    
?>