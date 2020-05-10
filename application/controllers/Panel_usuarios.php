<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Panel_usuarios extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('grocery_CRUD');
        $this->load->library('encryption');
        $this->load->library('valida_permisos');
        $this->load->model('Acciones_model');
    }

    //GROCERY CRUD USUARIOS
    function index()
    {
        //    if ($this->session->userdata('usuario') && $this->valida_permisos->permiso_usuarios(18) == TRUE) {
        if ($this->session->userdata('usuario')) {
            try {
                $crud = new grocery_CRUD();
                $crud->set_theme('datatables');
                $crud->set_table('ed_usuarios');
                $crud->set_subject('Usuarios');
                $crud->required_fields('nombre', 'password');
                $crud->set_relation('departamento', 'ed_departamentos_usuarios', 'nombre');

                $crud->set_relation('facturas', 'ed_decision', 'nombre');
                $crud->set_relation('administrador', 'ed_decision', 'nombre');
                $crud->set_relation('estatus', 'ed_decision', 'nombre');

                $crud->change_field_type('password', 'password');
                $crud->callback_before_insert(array($this, 'encrypt_password_callback'));
                $crud->callback_before_update(array($this, 'encrypt_password_callback'));
                $crud->callback_edit_field('password', array($this, 'decrypt_password_callback'));

                $crud->fields('nombre', 'nombre_completo', 'password', 'departamento', 'facturas', 'administrador', 'estatus');
                $crud->columns('fecha', 'nombre', 'departamento', 'nombre_completo', 'estatus');
                $this->bloque_elementos_tabla($crud);


                $crud->callback_after_insert(array($this, 'registro_creado'));
                $crud->callback_after_update(array($this, 'registro_actualizado'));

                $crud->order_by('id', 'asc');
                $output = $crud->render();

                $this->plantilla($output);
            } catch (Exception $e) {
                show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
            }
        } else {
            redirect(panel);
        }
    }

    //METODO ENCARGADO CARGAR INGRESOS SISTEMA
    function ingresos()
    {
        if ($this->session->userdata('usuario')) {
            try {
                $crud = new grocery_CRUD();
                $crud->set_theme('datatables');
                $crud->set_table('ed_ingresos');
                $crud->set_subject('Usuarios');
                $this->bloque_elementos_tabla($crud);
                $crud->unset_add();
                $crud->unset_edit();
                $crud->unset_delete();

                $output = $crud->render();
                $this->plantilla($output);
            } catch (Exception $e) {
                show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
            }
        } else {
            redirect(panel);
        }
    }

    function encrypt_password_callback($post_array, $primary_key = null)
    {
        $post_array['password'] = $this->encryption->encrypt($post_array['password']);

        return $post_array;
    }

    function decrypt_password_callback($value)
    {
        $decrypted_password = $this->encryption->decrypt($value);
        return "<input type='password' name='password' value='$decrypted_password' />";
    }

    //ACTUALIZA DATOS REGISTRO CREADO
    function registro_creado($post_array, $primary_key)
    {
        date_default_timezone_set('UTC');
        $fecha = date("Y-m-d");
        $actualizar = array('fecha' => $fecha, 'nombre_completo' => strtoupper($post_array['nombre_completo']));
        $this->db->update('ed_usuarios', $actualizar, array('id' => $primary_key));

        $accion = 'ALTA USUARIO ' . strtoupper($post_array['nombre_completo']);
        $categoria = 'ADMINISTRACION';
        $modulo = 'ALTA USUARIOS';
        $this->Acciones_model->historial_acciones($accion, $categoria, $modulo);
        return true;
    }

    //ACTUALIZA DATOS REGISTRO
    function registro_actualizado($post_array, $primary_key)
    {
        $actualizar = array('nombre_completo' => strtoupper($post_array['nombre_completo']));
        $this->db->update('ed_usuarios', $actualizar, array('id' => $primary_key));

        $accion = 'ACTUALIZACION USUARIO ' . strtoupper($post_array['nombre_completo']);
        $categoria = 'ADMINISTRACION';
        $modulo = 'ALTA USUARIOS';
        $this->Acciones_model->historial_acciones($accion, $categoria, $modulo);
        return true;
    }

    //ELEMENTOS BLOQUEADOS EN LA TABLA
    function bloque_elementos_tabla($crud)
    {
        $crud->unset_back_to_list();
        $crud->unset_clone();
    }

    //PLANTILLA 
    function plantilla($output = null)
    {
        $datos = array('activo' => 0);
        $this->load->view('index/header', $datos);
        $this->load->view('index/barra');
        $this->load->view('all.php', (array) $output);
        $this->load->view('index/footer');
    }
}
