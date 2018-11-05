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
        //Carga la vista que contiene la lista de empleados
        public function empleados(){
            $datos['data']=$this->admin_model->get_data("usuarios");
            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/empleados.php',$datos);
            $this->load->view('General/footer_on.php');
        }
        
        //Carga la vista que contiene la lista de empresas
        public function empresas(){
            $datos['data']=$this->admin_model->empresas("usuarios");
            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/empresas.php',$datos);
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
        public function vista_nueva_empresa(){
            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/nueva_empresa.php');
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
        function add(){
            $id=$_SESSION['id_usuario'];

            $fecha=date("Y/m/d") ;
            if($this->input->post('register')){
            
            $path = '';
            switch ($this->input->post('tipo_usuario')) {
                case '2':
                    $path = 'img/perfiles/cm/';
                break;
                case '3':
                    $path = 'img/perfiles/designer/';
                break;
                case '4':
                    $path = 'img/perfiles/gc/';
                break;                
                default:
                    # code...
                break;
            }
            //Check whether user upload picture
            if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = $path;
                //$config['upload_path'] = 'img/perfiles/admins/';
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
                'username'=>$this->input->post('username'),
                'password'=>sha1($this->input->post('password')),                       
                'pass_decrypt'=>$this->input->post('password'),           
                'rol'=>$this->input->post('tipo_usuario'),
                'imagen'=>$picture,
                'creador'=>($id),
                'fecha_creacion'=>(date("Y/m/d")),
                'id_estado_us'=>('1')                
            );

            $insertUserData = $this->admin_model->nuevo_usuario($usuario);
            //echo $insertUserData;

            $empleado=array(
                'nombre_empleado'=>$this->input->post('nombre_empleado'),
                'apaterno_empleado'=>$this->input->post('apaterno_empleado'),
                'amaterno_empleado'=>$this->input->post('amaterno_empleado'),   
                'direccion_empleado'=>$this->input->post('direccion_empleado'),  
                'correo_empleado'=>$this->input->post('correo_empleado'),
                'telefono_empleado'=>$this->input->post('telefono_empleado'),
                'id_usuario_empleado'=>($insertUserData)
            );
            $insertEmpData = $this->admin_model->nuevo_empleado($empleado);            
            
        }
            //Form for adding user data
            //$this->load->view('SuperAdmin/nuevo_sa_empleado.php');
           redirect('index.php/admin_controller/empleados', 'refresh');  
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

            redirect('index.php/admin_controller/clientes', 'refresh');     
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

        public function detalle_empleado(){
            $datos['data']=$this->admin_model->get_usuario("usuarios");
            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/detalle_empleado.php',$datos);
            $this->load->view('General/footer_on.php');
        }

        public function editar_empleado(){
            $admin=$this->input->post('id_usuario');  
            $buscar['data'] = $this->admin_model->busca_datos_empleado($admin);
            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/detalle_empleado.php',$buscar);
            $this->load->view('General/footer_on.php');
        }

        public function actualizar_empleado(){
            if($this->input->post('actualizar')){
                $path = '';
            switch ($this->input->post('tipo_usuario')) {
                case '2':
                    $path = 'img/perfiles/cm/';
                break;
                case '3':
                    $path = 'img/perfiles/designer/';
                break;
                case '4':
                    $path = 'img/perfiles/gc/';
                break;                
                default:
                    # code...
                break;
            }
                //Check whether user upload picture
                if(!empty($_FILES['picture']['name'])){
                    $config['upload_path'] = $path;
                    //$config['upload_path'] = 'img/perfiles/admins/';
                    $config['allowed_types'] = '*';
                    $config['file_name'] = $_FILES['picture']['name'];
                    
                    //Load upload library and initialize configuration
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    
                    if($this->upload->do_upload('picture')){
                        $uploadData = $this->upload->data();
                        $picture = $uploadData['file_name'];
                    }else{
                        $picture = $this->input->post('imagen');
                    }
                }else{
                    $picture = $this->input->post('imagen');
                }

                $id=$this->input->post('id_usuario');
                            
                $usuario=array(  
                    'username'=>$this->input->post('username'),
                    'password'=>sha1($this->input->post('password')),                       
                    'pass_decrypt'=>$this->input->post('password'),  
                    'imagen'=>$picture
                );

                $insertUserData = $this->admin_model->actualizar_user($id, $usuario);

                $empleado=array(
                    'nombre_empleado'=>$this->input->post('nombre_empleado'),
                    'apaterno_empleado'=>$this->input->post('apaterno_empleado'),
                    'amaterno_empleado'=>$this->input->post('amaterno_empleado'),   
                    'direccion_empleado'=>$this->input->post('direccion_empleado'),  
                    'correo_empleado'=>$this->input->post('correo_empleado'),
                    'telefono_empleado'=>$this->input->post('telefono_empleado')
                );
                $insertEmpData = $this->admin_model->actualizar_emp($id, $empleado);   
            }
            //Form for adding user data
            //$this->load->view('SuperAdmin/nuevo_sa_empleado.php');
           redirect('index.php/admin_controller/empleados', 'refresh');  
        }
        
    }    
?>