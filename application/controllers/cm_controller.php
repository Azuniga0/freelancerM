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

        public function aprobar($id){
            $this->cm_model->aprobar($id);
            $data['pendientes'] = $this->cm_model->pedientes($_SESSION['id_usuario']);
            $data['pendientes2'] = $this->cm_model->pedientes2($_SESSION['id_usuario']);
            $this->load->view('General/header_on.php');
            $this->load->view('CommunityManager/navbar_cm.php');
            $this->load->view('CommunityManager/pedientes.php', $data);
            $this->load->view('General/footer_on.php');
        }

        public function tarea($id){
            $data ['at'] = $this->cm_model->getAT($id);
            $this->load->view('General/header_on.php');
            $this->load->view('CommunityManager/tarea.php', $data);
            $this->load->view('CommunityManager/navbar_cm.php');
            $this->load->view('General/footer_on.php');
        }

        public function vista_red(){
            $id_campana = $_GET['id_camp'];
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

        public function nodos(){
            echo "mensaje";
        }
    }
?>