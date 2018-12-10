<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class cm_controller extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->helper('url','form');
  	 		$this->load->model('cm_model');
            $this->load->library('session');
        }

        public function home(){
            $this->load->view('General/header_on.php');
            $this->load->view('CommunityManager/navbar_cm.php');
            $this->load->view('CommunityManager/home_cm.php');
            $this->load->view('General/footer_on.php');
        }
        
        public function pendientes(){
            $data['pendientes'] = $this->cm_model->pedientes($_SESSION['id_usuario']);
            $data['pendientes2'] = $this->cm_model->pedientes2($_SESSION['id_usuario']);
            $this->load->view('General/header_on.php');
            $this->load->view('CommunityManager/navbar_cm.php');
            $this->load->view('CommunityManager/pedientes.php', $data);
            $this->load->view('General/footer_on.php');
        }

        public function crearPublicacion(){
            $data['camp']=$this->cm_model->lista_camp("usuarios");
            $data['nodos']=$this->cm_model->lista_nodos($_SESSION['id_usuario']);
            $this->load->view('General/header_on.php');
            $this->load->view('CommunityManager/navbar_cm.php');
            $this->load->view('CommunityManager/crearPublicacion.php', $data);
            $this->load->view('General/footer_on.php');
        }

        public function crearPubli(){
            $publi = array(
                'id_estado' => 2,
                'id_nodo' => $this->input->post('id_nodo'),
                'nombre'=>$this->input->post('titulo'),
                'contenido' => null,
                'imagen' => null,
                'fecha_inicio' => $this->input->post('datein'),
                'fecha_final' => $this->input->post('datefin'),
            );
            $this->cm_model->crearPubli($publi);
            $data['camp']=$this->cm_model->lista_camp("usuarios");
            $data['nodos']=$this->cm_model->lista_nodos($_SESSION['id_usuario']);
            $this->load->view('General/header_on.php');
            $this->load->view('CommunityManager/navbar_cm.php');
            $this->load->view('CommunityManager/crearPublicacion.php', $data);
            $this->load->view('General/footer_on.php');
        }

        public function camp(){
            $datos['data']=$this->cm_model->lista_camp("usuarios");
            $this->load->view('General/header_on.php');
            $this->load->view('CommunityManager/navbar_cm.php');
            $this->load->view('CommunityManager/camp.php',$datos);
            $this->load->view('General/footer_on.php');
        }

        public function publication($id){
            $data ['publi'] = $this->cm_model->getpublicacion($id);
            $data ['come'] = $this->cm_model->getcomentarios($id);
            //  echo json_encode($data);
            $this->load->view('General/header_on.php');
            $this->load->view('CommunityManager/publicaion.php', $data);
            $this->load->view('CommunityManager/navbar_cm.php');
            $this->load->view('General/footer_on.php');
        }

        public function comentar($id){
            $data ['publi'] = $this->cm_model->getpublicacion($id);
            $data ['come'] = $this->cm_model->getcomentarios($id);
            if($this->input->post('comentario')){
            $comen = array(
                'id_usuario' => $_SESSION['id_usuario'],
                'id_publicacion' => $id,
                'contenido'=>$this->input->post('comentario'),
                'fecha' => date("Y/m/d"),
            );
            $this->cm_model->comentar($comen);
                redirect('index.php/cm_controller/publication/'.$id);
            }else{
                $data ['error1'] = "no hay comentario";
                $this->load->view('General/header_on.php');
                $this->load->view('CommunityManager/publicaion.php', $data);
                $this->load->view('CommunityManager/navbar_cm.php');
                $this->load->view('General/footer_on.php');
            }
        }

        public function aprobar($id){
                $publi = $this->cm_model->getpubli($id);
                $base=base_url();
                $ruta="http://localhost/freelancer/assets/img/img_des/".$publi->imagen; 
                $this->load->library('facebook');
        $array = array('message' => $publi->contenido,'source' => $this->facebook->object()->fileToUpload($ruta));
                $userProfile = $this->facebook->request('post', '435197416580742'.'/photos/', $array, 'EAADDccDBPtsBAGZBxCmg3TXre3ngA3gWq3EMhrHeoRJhxZA6dqjL4M7PUYNMHIbO2BRMIQdqFVqNAsZCDZABlJjzAsDXjO9Bm85n6nVQgHLffByW4zlkYNeqZAK2ZBF3ghu6FQ46uRoAt4s8EjlXLn3YOELz0JHZCdxZA45A6Q1B8ZBtGtdfw6aGr0Vc5wI06h1uqNXB0NIMwBgZDZD');
                // print_r($userProfile); 
            // echo json_encode($publi);
            $this->cm_model->aprobar($id);
            $data['pendientes'] = $this->cm_model->pedientes($_SESSION['id_usuario']);
            $data['pendientes2'] = $this->cm_model->pedientes2($_SESSION['id_usuario']);
            $this->load->view('General/header_on.php');
            $this->load->view('CommunityManager/navbar_cm.php');
            $this->load->view('CommunityManager/pedientes.php', $data);
            $this->load->view('General/footer_on.php');
        }

        public function asignarTarea($id){
            $tarea = array(
                'id_usuario' =>$this->input->post('id_usuario'),
                'id_publicaciones' => $id,
                'id_estado' => 1,
                'titulo'=>$this->input->post('titulo'),
                'contenido'=>$this->input->post('des'),
                'fecha_entrega' => $this->input->post('date'),
                'fecha_creacion' => date("Y-m-d"),
            );
            $this->cm_model->asignarTarea($tarea);
            $data ['publi'] = $this->cm_model->getpublicacion($id);
            $data ['come'] = $this->cm_model->getcomentarios($id);
            $this->load->view('General/header_on.php');
            $this->load->view('CommunityManager/publicaion.php', $data);
            $this->load->view('CommunityManager/navbar_cm.php');
            $this->load->view('General/footer_on.php');
        }

        public function tarea($id){
            $data ['at'] = $this->cm_model->getAT($id);
            $data ['ur'] = $this->cm_model->getUR($id);
            // echo json_encode($data);
            $this->load->view('General/header_on.php');
            $this->load->view('CommunityManager/tarea.php', $data);
            $this->load->view('CommunityManager/navbar_cm.php');
            $this->load->view('General/footer_on.php');
        }

        public function vista_red(){
            $id_campana = $_GET['id_camp'];
            //$empresa = $this->cm_model->trabaja_en("empresas");
            $datos_red ['rsemantica'] = $this->cm_model->red_semantica($id_campana); 
            $datos_red ['data_camp'] = $this->cm_model->datos_campana($id_campana); 
            $datos_red ['nodos_red'] = $this->cm_model->nodos_red($id_campana); 

            $this->load->view('General/header_on.php');
            $this->load->view('CommunityManager/navbar_cm.php');
            $this->load->view('CommunityManager/red.php',$datos_red);            
            $this->load->view('General/footer_on.php');
        }

        public function guardar_nodo(){
            echo "llego a la funcion";

            if(isset($_POST['padre'])){
                $nodos = array(
                    'id_red'=>$this->input->post('campana'),
                    'nombre'=>$this->input->post('hijo'),
                    'nodo_padre'=>$this->input->post('padre')
                ); 
                $insertNodos = $this->cm_model->insert_nodos($nodos);
            }else{
                $nodos = array(
                    'id_red'=>$this->input->post('campana'),
                    'nombre'=>$this->input->post('hijo'),
                    'nodo_padre'=>('0')
                );
                $insertNodos = $this->cm_model->insert_nodos($nodos);
            }
            if($insertNodos){
                echo "se inserto";
            }else{
                echo "no se inserto";
            }
            //$insertNodos = $this->cm_model->insert_nodos($nodos);    
            //redirect('index.php/cm_controller/vista_red', 'refresh'); 
        }

        public function asignacion_nodos(){
            $id_campana = $_GET['id_camp'];
            $datos_red ['data_camp'] = $this->cm_model->datos_campana($id_campana); 
            $datos_red ['nodos_red'] = $this->cm_model->nodos_red($id_campana); 

            $this->load->view('General/header_on.php');
            $this->load->view('CommunityManager/navbar_cm.php');
            $this->load->view('CommunityManager/asignacion.php',$datos_red);            
            $this->load->view('General/footer_on.php');
        }

        function eliminar_nodo (){
            $id_campana = $_GET['id_camp'];
            $id_nodo = $_GET['id_nodo'];
        }

    }
?>