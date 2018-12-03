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
            $this->cm_model->aprobar($id);
            $data ['publi'] = $this->cm_model->getpublicacion($id);
            $data ['come'] = $this->cm_model->getcomentarios($id);
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
            $this->load->view('General/header_on.php');
            $this->load->view('CommunityManager/tarea.php', $data);
            $this->load->view('CommunityManager/navbar_cm.php');
            $this->load->view('General/footer_on.php');
        }
    }
?>