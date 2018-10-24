<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Admin_controller extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->helper('url','form');
  	 		$this->load->model('admin_model');
            $this->load->library('session');
        }
            
        public function home(){
            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/home_admin.php');
            $this->load->view('General/footer_on.php');
        }
        
        public function empleados(){
            $datos_empleado=array(
                'empleado_activo'=>$this->admin_model->empleado_activo()
            );
            //$this->load->view("recetas.php",$r_data);
            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/empleados.php',$datos_empleado);
            $this->load->view('General/footer_on.php');
        }
        
        public function clientes(){
            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/clientes.php');
            $this->load->view('General/footer_on.php');
        }
        
        public function camp(){
            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/camp.php');
            $this->load->view('General/footer_on.php');
        }
        
        public function perfil(){
            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/perfil.php');
            $this->load->view('General/footer_on.php');
        }

        public function vista_nuevo_empleado(){
            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/nuevo_empleado.php');
            $this->load->view('General/footer_on.php');
        }

        public function vista_nuevo_cliente(){
            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/nuevo_cliente.php');
            $this->load->view('General/footer_on.php');
        }

        public function vista_nueva_camp(){
            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/nueva_camp.php');
            $this->load->view('General/footer_on.php');
        }        

        /*public function nuevo_empleado(){
            $id=$_SESSION['id_usuario'];
            $empleado=array(
            'nombre'=>$this->input->post('nombre'),
            'apellido_paterno'=>$this->input->post('apellido_paterno'),
            'apellido_materno'=>$this->input->post('apellido_materno'),
            'rfc'=>$this->input->post('rfc'),
            'direccion'=>$this->input->post('direccion'),            
            'colonia'=>$this->input->post('colonia'),
            'ciudad'=>$this->input->post('ciudad'),
            'estado_rep'=>$this->input->post('estado_rep'),
            'cp'=>$this->input->post('cp'),
            'correo'=>$this->input->post('correo'),
            'estado_rep'=>('1'),
            'creador'=>($id)
            );*/

           

            /*$usuario=array(
            'username'=>$this->input->post('username'),
            'password'=>sha1("123"), //'password'=>sha1($this->input->post('password')),

            'tipo_usuario'=>$this->input->post('tipo_usuario'),
            'id_estado'=>('1')
            );*/

            /*print_r($empleado);

            
            $this->admin_model->nuevo_empleado($empleado);
            
           
            $this->load->view('Admin/home_admin.php');
        }*/

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