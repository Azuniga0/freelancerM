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
            /*$id_tipo_creado = $this->input->post('tipo_usuario');
            if($id_tipo_creado){

            }*/
            $error = 0;

            $fecha=date("Y/m/d") ;
            $errores_array = array();
            //$datos['data']=$this->sadmin_model->get_data("usuarios");

            if($this->input->post('register')){

                
                //$dataform = $this->input->post();

                /*$this->form_validation->set_rules('nombre_empleado', 'Nombre', 'required');
                $this->form_validation->set_rules('apaterno_empleado', 'Apellido paterno', 'required');
                $this->form_validation->set_rules('direccion_empleado', 'Dirección', 'required');
                $this->form_validation->set_rules('correo_empleado', 'Correo electrónico', 'required|valid_email');
                $this->form_validation->set_rules('telefono_empleado', 'Número telefónico', 'required|exact_length[10]');
                $this->form_validation->set_rules('username', 'Nombre de usuario', 'required|is_unique[usuarios.username]');
                $this->form_validation->set_rules('password', 'password', 'required|min_length[6]|numeric');*/
                //$this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]');
                            
            //Check whether user upload picture
                if(!empty($_FILES['picture']['name'])){
                    $config['upload_path'] = 'img/perfiles/admins/';
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
                
                $username_check=$this->sadmin_model->username_check_empleados($usuario['username']);
                $email_check=$this->sadmin_model->email_check_empleados($this->input->post('correo_empleado'));

                if($username_check){
                    
                }else{
                    /*$this->session->set_flashdata('error_msg', 'usuario existente');
                    //redirect('index.php/sadmin_controller/vista_nuevo_sa_empleado');
                    $this->load->view('General/header_on.php');
                    $this->load->view('SuperAdmin/navbar_sadmin.php');
                    $this->load->view('SuperAdmin/nuevo_sa_empleado.php',$data);
                    $this->load->view('General/footer_on.php');*/
                    $error ++; 
                    $errores_array['usuario_info']=" El usuario ".$usuario['username']." ya existe";
                }
                if($email_check){
                        //$insertUserData = $this->sadmin_model->nuevo_usuario($usuario);

                }else{
                        //$this->session->set_flashdata('error_msg', 'correo existente');
                        $error ++;
                        $errores_array['correo_info']=" El correo ".$this->input->post('correo_empleado')." ya existe";
                }
                if(strlen($this->input->post('telefono_empleado'))==10 || preg_match('/^[0-9]*$/',$this->input->post('telefono_empleado'))){                    
                    
                }else{
                    $error ++;
                    $errores_array['telefono_info']=" El teléfono tiene que tener 10 dígitos, contiene ".strlen($this->input->post('telefono_empleado'))." dígitos y estar compuesto solo de números";
                }

                if($error==0){
                    $insertUserData = $this->sadmin_model->nuevo_usuario($usuario);
                    $empleado=array(
                        'nombre_empleado'=>$this->input->post('nombre_empleado'),
                        'apaterno_empleado'=>$this->input->post('apaterno_empleado'),
                        'amaterno_empleado'=>$this->input->post('amaterno_empleado'),   
                        'direccion_empleado'=>$this->input->post('direccion_empleado'),  
                        'correo_empleado'=>$this->input->post('correo_empleado'),
                        'telefono_empleado'=>$this->input->post('telefono_empleado'),
                        'id_usuario_empleado'=>($insertUserData)
                    );

                    $insertEmpData = $this->sadmin_model->nuevo_empleado($empleado); 
                    echo "se inserto";
                    //redirect('index.php/sadmin_controller/administradores', 'refresh');  
                }
                else{
                    echo "salieron errores";
                    //print_r ($errores_array);
                    foreach ($errores_array as $key => $value) {
                        echo $value;
                    }
                    //redirect('index.php/sadmin_controller/vista_nuevo_sa_empleado', 'refresh');  
                }

                
            }
            //Form for adding user data
            //$this->load->view('SuperAdmin/nuevo_sa_empleado.php');
            /*$this->load->view('General/header_on.php');
            $this->load->view('SuperAdmin/navbar_sadmin.php');
            $this->load->view('SuperAdmin/nuevo_sa_empleado.php',$data);
            $this->load->view('General/footer_on.php');*/
           //redirect('index.php/sadmin_controller/vista_nuevo_sa_empleado', 'refresh');  
        }

        public function editar_administrador(){
            $admin=$this->input->post('id_usuario');  
            $buscar['data'] = $this->sadmin_model->busca_datos_admin($admin);
            $this->load->view('General/header_on.php');
            $this->load->view('SuperAdmin/navbar_sadmin.php');
            $this->load->view('SuperAdmin/detalle_sa_empleado.php',$buscar);
            $this->load->view('General/footer_on.php');
        }

        public function actualizar_empleado(){
            if($this->input->post('actualizar')){
            
                //Check whether user upload picture
                if(!empty($_FILES['picture']['name'])){
                    $config['upload_path'] = 'img/perfiles/admins/';
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

                $insertUserData = $this->sadmin_model->actualizar_user($id, $usuario);

                $empleado=array(
                    'nombre_empleado'=>$this->input->post('nombre_empleado'),
                    'apaterno_empleado'=>$this->input->post('apaterno_empleado'),
                    'amaterno_empleado'=>$this->input->post('amaterno_empleado'),   
                    'direccion_empleado'=>$this->input->post('direccion_empleado'),  
                    'correo_empleado'=>$this->input->post('correo_empleado'),
                    'telefono_empleado'=>$this->input->post('telefono_empleado')
                );
                $insertEmpData = $this->sadmin_model->actualizar_emp($id, $empleado);   
            }
            //Form for adding user data
            //$this->load->view('SuperAdmin/nuevo_sa_empleado.php');
           redirect('index.php/sadmin_controller/administradores', 'refresh');  
        }

        public function editar_empresa(){
            $admin=$this->input->post('id_empresa');  
            $buscar['data'] = $this->sadmin_model->busca_datos_empresa($admin);
            $this->load->view('General/header_on.php');
            $this->load->view('SuperAdmin/navbar_sadmin.php');
            $this->load->view('SuperAdmin/detalle_empresa.php',$buscar);
            $this->load->view('General/footer_on.php');
        }

        //Carga la vista que contiene la lista de empresas
        public function empresas(){
            $datos['data']=$this->sadmin_model->empresas("usuarios");
            $this->load->view('General/header_on.php');
            $this->load->view('SuperAdmin/navbar_sadmin.php');
            $this->load->view('SuperAdmin/empresas.php',$datos);
            $this->load->view('General/footer_on.php');
        }

        
        //Carga el formulario para una nueva empresa
        public function vista_nueva_empresa(){
            $this->load->view('General/header_on.php');
            $this->load->view('SuperAdmin/navbar_sadmin.php');
            $this->load->view('SuperAdmin/nueva_empresa.php');
            $this->load->view('General/footer_on.php');
        }

        //Toma los datos del formulario de empresa y los envia al modelo para inserción
        public function nueva_empresa(){
            $id=$_SESSION['id_usuario'];
            $fecha=date("Y/m/d") ;
            if($this->input->post('register')){
            
                //Check whether user upload picture
                if(!empty($_FILES['picture']['name'])){
                    $config['upload_path'] = 'img/perfiles/empresas/';
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
                $empresa=array(
                    'razon_social'=>$this->input->post('razon_social'),
                    'contacto'=>$this->input->post('contacto'),
                    'direccion_contacto'=>$this->input->post('direccion_contacto'),   
                    'correo_contacto'=>$this->input->post('correo_contacto'),
                    'telefono_empresa'=>$this->input->post('telefono_contacto'),         
                    'estado_empresa'=>('1'),
                    'administrador'=>$this->input->post('admin'),       
                    'imagen_empresa'=>$picture,
                    'fecha_alta'=>($fecha)
                );
                $nueva_empresa = $this->sadmin_model->nueva_empresa($empresa);

                $usuario=array( 
                    'username'=>$this->input->post('username'),
                    'password'=>sha1($this->input->post('password')),         
                    'pass_decrypt'=>$this->input->post('password'), 
                    'rol'=>('5'),     
                    'creador'=>($id),
                    'fecha_creacion'=>($fecha),
                    'id_estado_us'=>('1')
                );
                $nuevo_usuario = $this->sadmin_model->nuevo_usuario($usuario);
                
                $cliente=array(
                    'nombre_cliente'=>$this->input->post('nombre_cliente'),
                    'apaterno_cliente'=>$this->input->post('apaterno_cliente'),
                    'amaterno_cliente'=>$this->input->post('amaterno_cliente'),   
                    'telefono_cliente'=>$this->input->post('telefono_cliente'),
                    'correo_cliente'=>$this->input->post('correo_cliente'),         
                    'id_usuario_cliente'=>($nuevo_usuario),
                    'id_empresa_cliente'=>($nueva_empresa)
                );
                
                //Pass user data to model
                $nuevo_cliente = $this->sadmin_model->nuevo_cliente($cliente);
            }
            //Form for adding user data
            //$this->load->view('Admin/nuevo_empleado.php');            

            redirect('index.php/sadmin_controller/empresas', 'refresh');     
        }

        
        public function actualizar_empresa(){
            $id=$_SESSION['id_usuario'];
            if($this->input->post('register')){
            
                //Check whether user upload picture
                if(!empty($_FILES['picture']['name'])){
                    $config['upload_path'] = 'img/perfiles/empresas/';
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
                
                $id=$_SESSION['id_usuario'];
                $empresa=array(
                    'razon_social'=>$this->input->post('razon_social'),
                    'contacto'=>$this->input->post('contacto'),
                    'direccion_contacto'=>$this->input->post('direccion_contacto'),   
                    'correo_contacto'=>$this->input->post('correo_contacto'),
                    'telefono_empresa'=>$this->input->post('telefono_contacto'), 
                    'imagen_empresa'=>$picture
                );
                $id_empresa = $this->input->post('id_empresa');
                $nueva_empresa = $this->sadmin_model->actualizar_empresa($id_empresa, $empresa);

                $usuario=array( 
                    'username'=>$this->input->post('username'),
                    'password'=>sha1($this->input->post('password')),         
                    'pass_decrypt'=>$this->input->post('password')
                );
                $id_usuario= $this->input->post('id_usuario');
                $nuevo_usuario = $this->sadmin_model->actualizar_user($id_usuario, $usuario);
                
                $cliente=array(
                    'nombre_cliente'=>$this->input->post('nombre_cliente'),
                    'apaterno_cliente'=>$this->input->post('apaterno_cliente'),
                    'amaterno_cliente'=>$this->input->post('amaterno_cliente'),   
                    'telefono_cliente'=>$this->input->post('telefono_cliente'),
                    'correo_cliente'=>$this->input->post('correo_cliente')
                );                                
                $nuevo_cliente = $this->sadmin_model->actualizar_cliente($id_usuario, $cliente);

            }
            //Form for adding user data
            //$this->load->view('Admin/nuevo_empleado.php');            

            redirect('index.php/sadmin_controller/empresas', 'refresh');     
        }

        public function eliminar_empleado (){
            $error = 0;
            // obtiene el id del empleado seleccionado para eliminar y el rol que juega
            $id = $this->uri->segment(3);
            $rol = $this->uri->segment(4);

            /*echo $id;
            echo $rol;*/
            
            // consulta el tipo de usuario del que se quiere eliminar
            /*$info['data']=$this->sadmin_model->tipo_usuario($id);
            $tipo = $data->rol;*/

            switch ($rol) {
                case '1':
                    $estado = array('id_estado_us' => '4');
                        $this->sadmin_model->eliminar_empleado($id, $estado);
                        $this->administradores();
                break;
                case '6':
                    $checa_sadmin_e = $this->sadmin_model->activos_sadmin_e($id);
                    $checa_sadmin_u = $this->sadmin_model->activos_sadmin_u($id);
                    $min_sadmin = $this->sadmin_model->get_min_sadmin();
                    if($checa_sadmin_e){
                        $error ++;
                    }
                    if($checa_sadmin_u){
                        $error ++;
                    }

                    if ($error != 0) {
                        $message = "No se puede eliminar, tiene usuarios y/o empresas activas.\\nIntente de nuevo.";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                        //$this->administradores();
                        redirect('index.php/sadmin_controller/administradores', 'refresh');  
                    }else{
                        $estado = array('id_estado_us' => '4');
                        $this->sadmin_model->eliminar_empleado($id, $estado);
                        //$this->administradores();
                        redirect('index.php/sadmin_controller/administradores', 'refresh');
                    }
                break;
                case '7':
                    # code...
                break;
                default:
                    # code...
                break;
            }
            


            /*$estado = array('id_estado_us' => '4');
            $this->sadmin_model->eliminar_empleado($id, $estado);
            $this->administradores();*/

            //redirect(base_url().'sadmin_controller/administradores');
            //redirect('index.php/sadmin_controller/administradores', 'refresh');  
        }


}
     
?>