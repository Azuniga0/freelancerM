<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class sadmin_controller extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->helper('url','form');
  	 		$this->load->model('sadmin_model');
            $this->load->library('session','form_validation');
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
                    $this->load->view('SuperAdmin/navbar_sadmin.php');
                    $this->load->view('SuperAdmin/nuevo_sa_empleado.php', $data);
                    $this->load->view('General/footer_on.php');       
                }else{
                    // Revisa el archivo que se va a subir
                    if(!empty($_FILES['picture']['name'])){
                        $config['upload_path'] = 'img/perfiles/admins/';
                        $config['allowed_types'] = 'jpeg|jpg|png';
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
                    //redirect('index.php/sadmin_controller/administradores', 'refresh');  
                    $this->administradores();
                }             
            }
        }

        // carga la vista donde se pueden editar los campos del usuario
        public function editar_administrador(){
            $admin=$this->input->post('id_usuario');
            $buscar['data'] = $this->sadmin_model->busca_datos_admin($admin);
            $variable = 1;
            $this->load->view('General/header_on.php');
            $this->load->view('SuperAdmin/navbar_sadmin.php');
            $this->load->view('SuperAdmin/detalle_sa_empleado.php',$buscar,$variable);
            $this->load->view('General/footer_on.php');
        }

        // metodo que toma los datos del formulario de actualizacion y los envia a la db 
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
                    $buscar['data'] = $this->sadmin_model->busca_datos_admin($admin);
                   
                    $this->load->view('General/header_on.php');
                    $this->load->view('SuperAdmin/navbar_sadmin.php');
                    $this->load->view('SuperAdmin/detalle_sa_empleado2.php',$buscar);
                    $this->load->view('General/footer_on.php');      
                }else{
                    
                    //Revisa si se va a subir alguna foto
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
                    //echo "good"; 
                    redirect('index.php/sadmin_controller/administradores', 'refresh'); 
                }
                
            }
        }

        // apartado para editar la informacion de las empresas
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
        // validaciones del formulario
            $this->form_validation->set_rules('razon_social', 'Razón social', 'required|alpha_numeric');
            $this->form_validation->set_rules('rfc', 'RFC', 'required|callback_regex_rfc');
            $this->form_validation->set_rules('nombre_cliente', 'Nombre', 'callback_regex_check|required');
            $this->form_validation->set_rules('apaterno_cliente', 'Apelllido paterno', 'callback_regex_check|required');
            $this->form_validation->set_rules('amaterno_cliente', 'Apellido materno', 'callback_regex_check');
            $this->form_validation->set_rules('telefono_cliente', 'Número telefónico', 'required|exact_length[10]|numeric');
            $this->form_validation->set_rules('correo_cliente', 'Correo electrónico', 'required|valid_email|is_unique[clientes.correo_cliente]');
            $this->form_validation->set_rules('username', 'Nombre de usuario', 'required|is_unique[usuarios.username]');
            $this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[6]|max_length[24]|alpha_numeric'); //contacto
            $this->form_validation->set_rules('contacto', 'Contacto', 'callback_regex_check|required');
            $this->form_validation->set_rules('direccion_contacto', 'Dirección', 'required');
            $this->form_validation->set_rules('correo_contacto', 'Correo electrónico', 'required|valid_email');
            $this->form_validation->set_rules('telefono_contacto', 'Número telefónico', 'required|exact_length[10]|numeric');

                // errores en las validaciones
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            if ($this->form_validation->run() === FALSE){                    
                // array con los errores
                $data["data"] = array(); 
                $this->load->view('General/header_on.php');
                $this->load->view('SuperAdmin/navbar_sadmin.php');
                $this->load->view('SuperAdmin/nueva_empresa.php', $data);
                $this->load->view('General/footer_on.php');     
            }else{

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
                        'fecha_alta'=>($fecha),
                        'rfc'=>$this->input->post('rfc')
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
                 redirect('index.php/sadmin_controller/empresas', 'refresh');     
            }
        }

        
        public function actualizar_empresa(){
            // validaciones del formulario
            $this->form_validation->set_rules('razon_social', 'Razón social', 'required|alpha_numeric');
            $this->form_validation->set_rules('rfc', 'RFC', 'required|callback_regex_rfc');
            $this->form_validation->set_rules('nombre_cliente', 'Nombre', 'callback_regex_check|required');
            $this->form_validation->set_rules('apaterno_cliente', 'Apelllido paterno', 'callback_regex_check|required');
            $this->form_validation->set_rules('amaterno_cliente', 'Apellido materno', 'callback_regex_check');
            $this->form_validation->set_rules('telefono_cliente', 'Número telefónico', 'required|exact_length[10]|numeric');
            $this->form_validation->set_rules('correo_cliente', 'Correo electrónico', 'required|valid_email|is_unique[clientes.correo_cliente]');
            $this->form_validation->set_rules('username', 'Nombre de usuario', 'required|is_unique[usuarios.username]');
            $this->form_validation->set_rules('password', 'Contraseña', 'min_length[6]|max_length[24]|alpha_numeric'); //contacto
            $this->form_validation->set_rules('contacto', 'Contacto', 'callback_regex_check|required');
            $this->form_validation->set_rules('direccion_contacto', 'Dirección', 'required');
            $this->form_validation->set_rules('correo_contacto', 'Correo electrónico', 'required|valid_email');
            $this->form_validation->set_rules('telefono_contacto', 'Número telefónico', 'required|exact_length[10]|numeric');

                // errores en las validaciones
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            if ($this->form_validation->run() === FALSE){                    
                // array con los errores
                $data["data"] = array(); 
                $this->load->view('General/header_on.php');
                $this->load->view('SuperAdmin/navbar_sadmin.php');
                $this->load->view('SuperAdmin/detalle_empresa2.php', $data);
                $this->load->view('General/footer_on.php');     
            }else{
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
                        'imagen_empresa'=>$picture,
                        'rfc'=>$this->input->post('rfc')
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
                redirect('index.php/sadmin_controller/empresas', 'refresh');  
            }
                
        }

        public function eliminar_empleado (){
            $error = 0;
            // obtiene el id del empleado seleccionado para eliminar y el rol que juega
            $id = $this->uri->segment(3);
            $rol = $this->uri->segment(4);

            switch ($rol) {
                case '1':
                    $checa_admin_u = $this->sadmin_model->activos_admin_u($id);
                    $checa_sadmin_c = $this->sadmin_model->activos_admin_c($id);

                    print_r($checa_admin_u);
                    if($checa_admin_u){
                        $error ++;
                    }
                    if($checa_sadmin_c){
                        $error ++;
                    }

                    if ($error != 0) {
                        $message = "No se puede eliminar, tiene usuarios y/o campañas activas.\\nIntente de nuevo.";
                        echo "<script type='text/javascript'>alert('$message');</script>";                     //$this->administradores();
                        redirect('index.php/sadmin_controller/administradores', 'refresh');  
                    }else{
                        $estado = array('id_estado_us' => '4');
                        $this->sadmin_model->eliminar_empleado($id, $estado);
                        //$this->administradores();
                        redirect('index.php/sadmin_controller/administradores', 'refresh');
                    }
                break;
                case '6':
                    $checa_sadmin_e = $this->sadmin_model->activos_sadmin_e($id);
                    $checa_sadmin_u = $this->sadmin_model->activos_sadmin_u($id);
                    //$min_sadmin = $this->sadmin_model->get_min_sadmin();

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
                        redirect('index.php/sadmin_controller/administradores', 'refresh');
                    }
                break;
                case '7':
                    $checa_sadmin_e = $this->sadmin_model->activos_sadmin_e($id);
                    $checa_sadmin_u = $this->sadmin_model->activos_sadmin_u($id);
                    //$min_sadmin = $this->sadmin_model->get_min_sadmin();

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
                        redirect('index.php/sadmin_controller/administradores', 'refresh');
                    }
                break;
                default:
                    $this->administradores();
                break;
            }             
        }

        public function eliminar_empresa (){
            $error = 0;
            // obtiene el id del empleado seleccionado para eliminar y el rol que juega
            $id = $this->uri->segment(3);

            $checa_admin_u = $this->sadmin_model->activas_camp($id);

            //print_r($checa_admin_u);
            if($checa_admin_u){
                $error ++;
            }

            if ($error != 0) {
                $message = "No se puede eliminar, tiene campañas activas.\\nIntente de nuevo.";
                echo "<script type='text/javascript'>alert('$message');</script>";                     //$this->administradores();
                redirect('index.php/sadmin_controller/empresas', 'refresh');  
            }else{
                $estado = array('estado_empresa' => '4');
                $this->sadmin_model->eliminar_empresa($id, $estado);
                //$this->administradores();
                redirect('index.php/sadmin_controller/empresas', 'refresh');
            }
                           
        }

}
     
?>