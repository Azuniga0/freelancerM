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
            //$datos_empleado["result"] = $this->admin_model->empleado_activo();
            $datos_empleado=array(
                'empleado_activo'=>$this->admin_model->empleado_activo(),
                'empleado_inactivo'=>$this->admin_model->empleado_inactivo(),
                'empleado_despedido'=>$this->admin_model->empleado_despedido()
            );
            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/empleados.php',$datos_empleado);
            $this->load->view('General/footer_on.php');
        }
        
        //Carga la vista que contiene la lista de empresas
        public function clientes(){
            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/clientes.php');
            $this->load->view('General/footer_on.php');
        }
        
        //carga la vista que contiene la lista de campañas
        public function camp(){
            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/camp.php');
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
        public function nuevo_empleado(){
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
            'telefono'=>$this->input->post('telefono')
            );

                //print_r($usuario);            
                $this->admin_model->nuevo_empleado($usuario);    

                /*$filetmp = $_FILES["imagen"]["tmp_name"];
                $filename = $_FILES["imagen"]["name"];
                $filetype = $_FILES["imagen"]["type"];
                $filepath = "../../img/perfiles/".$filename;

                move_uploaded_file($filetmp,$filepath);
                if(mysqli_query($db, "UPDATE usuarios SET imagen='$filename' where id_usuario = '$id'")){
                    echo "img bien";
                }else{
                    echo "no entro<br>";
                    echo (mysqli_error($db));
                }*/
                redirect('index.php/admin_controller/empleados', 'refresh');     
        }

        //Toma los datos del formulario de empresa y los envia al modelo para inserción
        public function nueva_empresa(){
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
            'telefono'=>$this->input->post('telefono')
            );

                //print_r($usuario);            
                $this->admin_model->nueva_empresa($usuario);    

                /*$filetmp = $_FILES["imagen"]["tmp_name"];
                $filename = $_FILES["imagen"]["name"];
                $filetype = $_FILES["imagen"]["type"];
                $filepath = "../../img/perfiles/".$filename;

                move_uploaded_file($filetmp,$filepath);
                if(mysqli_query($db, "UPDATE usuarios SET imagen='$filename' where id_usuario = '$id'")){
                    echo "img bien";
                }else{
                    echo "no entro<br>";
                    echo (mysqli_error($db));
                }*/
                redirect('index.php/admin_controller/clientes', 'refresh');     
        }

        //Toma los datos del formulario de campaña y los envia al modelo para inserción
        public function nueva_camp(){
            $id=$_SESSION['id_usuario'];
            $camp=array(
            'id_cliente'=>$this->input->post('id_cliente'),
            'id_community'=>$this->input->post('id_community'),
            'nombre'=>$this->input->post('nombre'),   
            'objetivo'=>$this->input->post('objetivo'),
            'fecha_creacion'=>$this->input->post('fecha_creacion'),         
            'fecha_termino'=>$this->input->post('fecha_termino'),
            'imagen'=>('user.jpg'),
            'id_estado_c'=>('1')
            );

            $this->admin_model->nueva_camp($camp);
            redirect('index.php/admin_controller/camp', 'refresh');
        }

        
    }    
?>