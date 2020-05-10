<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Valida_permisos {

    protected $instancia;

    function __construct() {
        $this->instancia = & get_instance(); //PERMITE HACER USO DE LOS OBJETOS EXTENDIDOS DE LAS LIBRIRAS DE CODEIGNIETR
        $this->instancia->load->model('Usuarios_model');
    }

    function permiso_usuarios($modulo) {
        $consulta = $this->instancia->Usuarios_model->permisos_usuarios();

        switch ($modulo) {
            case 1:
                $permiso = $consulta->trabajo_social;
                break;
            case 2:
                $permiso = $consulta->beneficiados;
                break;
            case 3:
                $permiso = $consulta->programas;
                break;
            case 4:
                $permiso = $consulta->cuentas_activas;
                break;
            case 5:
                $permiso = $consulta->cuentas_finalizadas;
                break;
            case 6:
                $permiso = $consulta->cuentas_canceladas;
                break;
            case 7:
                $permiso = $consulta->caja;
                break;
            case 8:
                $permiso = $consulta->realizar_abono;
                break;
            case 9 :
                $permiso = $consulta->cancelar_pagos;
                break;
            case 10:
                $permiso = $consulta->juridico;
                break;
            case 11:
                $permiso = $consulta->mensajes;
                break;
            case 12:
                $permiso = $consulta->fonhapo;
                break;
            case 13:
                $permiso = $consulta->fidue;
                break;
            case 14 :
                $permiso = $consulta->control;
                break;
            case 15:
                $permiso = $consulta->notificaciones;
                break;
            case 16:
                $permiso = $consulta->cancelar_contratos;
                break;
            case 17:
                $permiso = $consulta->estadisticas;
                break;
            case 18:
                $permiso = $consulta->administrador;
                break;
            case 19:
                $permiso = $consulta->impresiones;  //Colocar permisos a los controladores
                break;
            case 20:
                $permiso = $consulta->facturas;  //Colocar permisos a los controladores
                break;
        }

        if ($permiso == 2) {
            $validacion = TRUE;
        } else {
            $validacion = FALSE;
        }

        return $validacion;
    }

}
