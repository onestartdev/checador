<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->library('encryption');
    }

    //VALIDADOR USUARIOS SISTEMA
    function valida_usuario($usuario, $password) {
        if (!$this->session->userdata('usuario')) {

            if (isset($usuario) && isset($password)) {

                $this->db->where('nombre', $usuario);
                $this->db->where('estatus', 2);
                $consulta = $this->db->get('ed_usuarios');
                if ($consulta->num_rows() > 0) {
                    $consulta = $consulta->row();

                    $password_dc = $this->encryption->decrypt($consulta->password);

                    if ($password == $password_dc) {

                        //CESIONES INTERNAS
                        $secion_usuario = array('usuario' => $consulta->nombre,
                            'permisos' => $consulta->permisos, //borrar al finalizar todos la libreria y los permisos en los controladoresi,
                            'id_usuario' => $consulta->id);
                        $this->session->set_userdata($secion_usuario);

                        //HISTORIAL INGRESOS
                       $this->historial_ingresos($consulta->id);

                        redirect(base_url());
                    } else {
                        redirect(bad_user);
                    }
                } else {
                    redirect(bad_user);
                }
            } else {
                redirect(base_url());
            }
        } else {
            redirect(base_url());
        }
    }

    //METODO ENCARGADO DE VALIDAR PERMISOS USUARIOS EN LIBRERIA VALIDA_PERMISOS
    function permisos_usuarios() {
        $this->db->where('id', $this->session->userdata('id_usuario'));
        $consulta = $this->db->get('ed_usuarios');
        $consulta = $consulta->row();
        return $consulta;
    }

    //METODO ENCARGADO DE ACTUALIZAR TABLA CON ULTIMO INGRESO USUARIO
    function salida_usuario() {
        if ($this->session->userdata('usuario')) {
            $usuario = $this->session->userdata('usuario');
            $this->db->where('nombre', $usuario);
            $consulta = $this->db->get('ed_usuarios');
            if ($consulta->num_rows() > 0) {
                $consulta = $consulta->row();
                $id_usuario = $consulta->id;
                $fecha_salida = date('Y-m-d H:i:s');
                $agent = $this->agent->browser() . ' ' . $this->agent->version();
                $ip = $this->input->ip_address();
                $data = array('last_signin' => $fecha_salida,
                    'last_navegador' => $agent,
                    'last_signin_ip' => $ip);
                $this->db->where('id', $id_usuario);
                $this->db->update('ed_usuarios', $data);
            } else {
                echo "Ususuario no encontrado";
            }
        } else {
            redirect(base_url());
        }
    }


    //METODO ENCARGADO DE CREAR EL HISTORIAL INGRESOS
    function historial_ingresos($id_usuario) {
        $agent = $this->agent->browser() . ' ' . $this->agent->version();
        $sistema = $this->agent->platform();
        date_default_timezone_set('UTC');
        $fecha = date("Y-m-d");
        $hora = date("G:H:s");
        $ip = $this->input->ip_address();
        $usuario = $this->session->userdata('usuario');
        $fecha_ingreso = date('Y-m-d H:i:s');

        //HISTORIAL ULTIMO INGRESO
        $datos_ingreso_usuario = array('current_signin' => $fecha_ingreso,
            'current_navegador' => $agent,
            'current_signin_ip' => $ip);
        $this->db->where('id', $id_usuario);
        $this->db->update('ed_usuarios', $datos_ingreso_usuario);

        //HISTORIAL INGRESOS
        $historial = array('fecha' => $fecha,
            'hora' => $hora,
            'usuario' => $usuario,
            'ip' => $ip,
            'navegador' => $agent,
            'sistema_operativo' => $sistema);
        $this->db->insert('ed_ingresos', $historial);
    }

}
