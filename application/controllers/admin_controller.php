<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Admin_controller extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->helper('url','form');
  	 		$this->load->model('admin_model');
            $this->load->library('session');
        }
        
        public function generar_pass($length=10){
            //Método con str_shuffle() 
            return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
        }

        public function home(){
            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/home_admin.php');
            $this->load->view('General/footer_on.php');
        }
        
        public function empleados(){
            $this->load->view('General/header_on.php');
            $this->load->view('Admin/navbar_admin.php');
            $this->load->view('Admin/empleados.php');
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
            //$default_pass=generar_pass($lenght=10);
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

        public function nuevo_empleado(){
            $id=$_SESSION['id_usuario'];
            $empleado=array(
            'nombre'=>$this->input->post('nombre'),
            'apellido_paterno'=>$this->input->post('apellido_paterno'),
            'apellido_materno'=>$this->input->post('apellido_materno'),
            'rfc'=>$this->input->post('rfc'),
            /*'direccion'=>$this->input->post('direccion'),            
            'colonia'=>$this->input->post('colonia'),
            'ciudad'=>$this->input->post('ciudad'),
            'estado_rep'=>$this->input->post('estado_rep'),
            'cp'=>$this->input->post('cp'),
            'correo'=>$this->input->post('correo'),*/
            'estado_rep'=>('1'),
            'creador'=>($id)
            );

            $email_check=$this->admin_model->email_check($empleado['correo']);

            if($email_check){
                $this->admin_model->nuevo_empleado($empleado);
                echo "entra";
            }else{
                redirect('index.php/user/camp'); //cambiar la url
                echo "no entra";
            }

            /*$usuario=array(
            'username'=>$this->input->post('username'),
            'password'=>sha1("123"), //'password'=>sha1($this->input->post('password')),

            'tipo_usuario'=>$this->input->post('tipo_usuario'),
            'id_estado'=>('1')
            );*/


            
            //$db = mysqli_connect("localhost","root","","freelancer");
            //$this->admin_model->nuevo_empleado($empleado,$id);
            /*$rec = $_POST['idRecipe'];
            $ingredientes = $_POST['ingredientes'];*/
            
           

            /*$filetmp = $_FILES["file_img"]["tmp_name"];
            $filename = $_FILES["file_img"]["name"];
            $filetype = $_FILES["file_img"]["type"];
            $filepath = "C:/xampp/htdocs/comeon/img/comida/".$filename;

            move_uploaded_file($filetmp,$filepath);
            if(mysqli_query($db, "UPDATE recipe SET img_name='$filename', img_path='$filepath', img_type='$filetype' where idRecipe='$rec'")){
                echo "img bien";
            }else{
                echo "no entro<br>";
                echo (mysqli_error($db));
            }*/
            //$this->load->view('home_admin.php');
        }
        
    }    
?>