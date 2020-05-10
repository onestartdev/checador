<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Acciones_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //METODO ENCARGADO DE REALIZAR EL HISTORIAL DE LAS ACCIONES DENTRO DEL SISTEMA
    function historial_acciones($accion, $categoria, $modulo) {

        date_default_timezone_set('UTC');
        $fecha = date("Y-m-d");
        $hora = date("G:H:s");
        $ip = $this->input->ip_address();
        $usuario = $this->session->userdata('usuario');
        $acciones = array('accion' => $accion,
            'categoria' => $categoria,
            'modulo' => $modulo,
            'usuario' => $usuario,
            'ip' => $ip,
            'fecha' => $fecha,
            'hora' => $hora);
        $this->db->insert('historial_acciones', $acciones);
    }

}
