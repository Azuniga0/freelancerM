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
               
        //carga la vista que contiene la lista de campañas
        public function camp(){
            $datos['data']=$this->admin_model->lista_camp("usuarios");
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
            //$this->load->library('form_validation');
            /*$this->form_validation->set_rules('nombre_empleado','Nombre del empleado','required');
            $this->form_validation->set_rules('telefono_empleado','Teléfono del empleado','required|numeric|exact_length[10]');
            $this->form_validation->set_rules('correo','Correo electrónico','required|is_unique[usuarios.username]');*/

            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/nuevo_empleado.php');
            $this->load->view('General/footer_on.php');
        }

        //Carga el formulario para una nueva campaña
        public function vista_nueva_camp(){
            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/nueva_camp.php');
            $this->load->view('General/footer_on.php');
        } 

        // funcion que evalua que sean solo letras con o sin acentos
        public function regex_check($str){
            if (preg_match("[A-Za-zÁÉÍÓUáéíóúÜü\s]", $str)){
                $this->form_validation->set_message('regex_check', 'El campo %s no tiene un formato válido');
                return FALSE;
            }else{
                return TRUE;
            }
        }

        // funcion que evaluar el RFC
        public function regex_rfc($str){
            if (preg_match("([A-ZÑ&]{3,4})(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01]))([A-Z\d]{2})([A\d])", $str)){
                $this->form_validation->set_message('regex_check', 'El campo %s no tiene un formato válido');
                return FALSE;
            }else{
                return TRUE;
            }
        }
                
        //Toma los datos del formulario de empleado y los envia al modelo para la inserción
        function add(){
            $id=$_SESSION['id_usuario'];
            $error = 0;

            $fecha=date("Y/m/d") ;

            if($this->input->post('register')){

                // validaciones del formulario
                $this->form_validation->set_rules('nombre_empleado', 'Nombre', 'required|callback_regex_check');
                $this->form_validation->set_rules('apaterno_empleado', 'Apellido paterno', 'required|callback_regex_check');
                $this->form_validation->set_rules('amaterno_empleado', 'Apellido materno', 'callback_regex_check');
                $this->form_validation->set_rules('direccion_empleado', 'Dirección', 'required');
                $this->form_validation->set_rules('correo_empleado', 'Correo electrónico', 'required|valid_email|is_unique[empleados.correo_empleado]');
                $this->form_validation->set_rules('telefono_empleado', 'Número telefónico', 'required|exact_length[10]|numeric');
                $this->form_validation->set_rules('username', 'Nombre de usuario', 'required|is_unique[usuarios.username]');
                $this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[6]|max_length[24]|alpha_numeric');
                // errores en las validaciones
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

                if ($this->form_validation->run() === FALSE){                    
                    // array con los errores
                    $data["data"] = array();
                    $this->load->view('General/header_on.php');
                    $this->load->view('Admin/navbar_admin.php');
                    $this->load->view('Admin/nuevo_empleado.php', $data);
                    $this->load->view('General/footer_on.php');  
                    echo "nop";     
                }else{

                    echo "sip";
                    // Revisa el archivo que se va a subir
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
                    
                    // crea el array para llenar la tabla de usuarios en la db
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
                    //redirect('index.php/sadmin_controller/administradores', 'refresh');  
                    $this->empleados();
                }             
            }
        }
        
        //Toma los datos del formulario de campaña y los envia al modelo para inserción
        public function nueva_camp(){
            $fecha=date("Y/m/d") ;
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
            'id_empresa_camp'=>$this->input->post('id_cliente'),
            'id_community'=>$this->input->post('id_community'),
            'nombre_camp'=>$this->input->post('nombre'),   
            'objetivo_camp'=>$this->input->post('objetivo'),
            'fecha_creacion_camp'=>($fecha),         
            'fecha_inicio'=>$this->input->post('fecha_creacion'),         
            'fecha_termino'=>$this->input->post('fecha_termino'),
            'imagen_camp'=>($picture),
            'id_estado_c'=>('1'),
            'creador_camp'=>($id)
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

                // validaciones del formulario
                $this->form_validation->set_rules('nombre_empleado', 'Nombre', 'required|callback_regex_check');
                $this->form_validation->set_rules('apaterno_empleado', 'Apellido paterno', 'required|callback_regex_check');
                $this->form_validation->set_rules('amaterno_empleado', 'Apellido materno', 'callback_regex_check');
                $this->form_validation->set_rules('direccion_empleado', 'Dirección', 'required');
                $this->form_validation->set_rules('telefono_empleado', 'Número telefónico', 'required|exact_length[10]|numeric');
                $this->form_validation->set_rules('password', 'Contraseña', 'min_length[6]|max_length[24]|alpha_numeric');
                // errores en las validaciones
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

                if ($this->form_validation->run() === FALSE){                    
                    // array con los errores
                    $data["data"] = array();

                    $admin=$this->input->post('id_usuario');  
                    $buscar['data'] = $this->admin_model->busca_datos_admin($admin);
                   
                    $this->load->view('General/header_on.php');
                    $this->load->view('Admin/navbar_admin.php');
                    $this->load->view('Admin/detalle_empleado2.php',$data);
                    $this->load->view('General/footer_on.php');      
                }else{
                    
                    //Revisa si se va a subir alguna foto
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

                    if($this->input->post('password') != $this->input->post('password_original')){
                        $pass = $this->input->post('password');
                    }else{
                        $pass = $this->input->post('password_original');
                    }
                            
                    $usuario=array(  
                        'username'=>$this->input->post('username'),                        
                        'password'=>sha1($pass),                       
                        'pass_decrypt'=>$pass,  
                        'imagen'=>$picture,
                        'id_estado_us'=>$this->input->post('id_estado_us')
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
                    //echo "good"; 
                    redirect('index.php/admin_controller/empleados', 'refresh'); 
                }
                
            }
        }
        
    }    
?>