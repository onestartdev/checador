<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Validar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('user_agent');
        $this->load->model('Usuarios_model');
    }

    //METODO ENCARGADO DE VALIDAR EL INGRESO AL SISTEMA.
    function londing()
    {
        if (!$this->session->userdata('usuario')) {
            $usuario = $this->security->xss_clean(strip_tags($this->input->post('user')));
            $password = $this->security->xss_clean(strip_tags($this->input->post('password')));

            if (isset($usuario) && isset($password)) {
                $this->Usuarios_model->valida_usuario($usuario, $password);
            } else {
                redirect(base_url());
            }
        } else {
            redirect(base_url());
        }
    }

  //METODO ENCARGADO DE CREAR CESION EN EL SISTEMA
    function logout()
    {
        //  $this->Usuarios_model->salida_usuario();
        $this->session->sess_destroy();
        redirect(base_url());
    }

    //METODO ENCARGADO DE CARGAR PLANTILLA ERROR USUARIO.
    function bad_user()
    {
        $datos = array('activo' => 1);
        $this->load->view('index/header',$datos);
        $this->load->view('index/header',$datos);
        $this->load->view('index/bad_user');
        $this->load->view('index/footer');
    }

//METODO ENCARGAR PLANTILLA ERROR 404
    function error_404(){
        $datos = array('activo' => 1);
        $this->load->view('index/header', $datos);
       // $this->load->view('barra');
        $this->load->view('index/error_404');
        $this->load->view('index/footer');
    }
  
}
