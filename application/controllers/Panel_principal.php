<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Panel_principal extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    //METODO PRINCIPAL
    function index() { 
        if ($this->session->userdata('usuario')) { //VALIDAR PERMISOS
            $this->panel();
        } else {
            $datos = array('activo' => 1);
            $this->load->view('index/header', $datos);
            $this->load->view('formulario');
            $this->load->view('index/footer');
        }
    }

    //METODO PANEL
    function panel() {
        if ($this->session->userdata('usuario')) {
        $datos = array('activo' => 1);
        $this->load->view('index/header', $datos);
        $this->load->view('index/barra');
        $this->load->view('panel');
        $this->load->view('index/footer');
        }else{
            redirect(panel);
        }
    }



}
