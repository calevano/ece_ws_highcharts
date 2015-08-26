<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Grafico_controlador extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('grafico/grafico_model', 'modeloGrafico');
    }

    public function index() {
        echo "";
    }

    public function grafico_uno() {
        add_js_(array('highcharts/highcharts',
            'highcharts/export/exporting'));
        $datos['titulo'] = "Gráfico sección uno";
        $datos['contenido'] = 'grafico/seccion_uno_grafico_vista';
        $datos['indicador_grafico_uno'] = $this->modeloGrafico->obtener_indicador_seccion_uno();
        $this->load->view('plantilla', $datos);
    }

    public function grafico_dos() {
        add_js(array('facebox/src/facebox','jquery-ui.min'));
        add_js_(array('highcharts/highcharts'));
        $datos['titulo'] = "Gráfico sección dos";
        $datos['contenido'] = 'grafico/seccion_dos_grafico_vista';
        $datos['seccion_dos_indicador_uno'] = $this->modeloGrafico->seccion_dos_indicador_uno();
        $datos['seccion_dos_indicador_dos'] = $this->modeloGrafico->seccion_dos_indicador_dos();
        $datos['seccion_dos_indicador_tres'] = $this->modeloGrafico->seccion_dos_indicador_tres();
        $datos['seccion_dos_indicador_cuatro'] = $this->modeloGrafico->seccion_dos_indicador_cuatro();
        $datos['seccion_dos_indicador_cinco'] = $this->modeloGrafico->seccion_dos_indicador_cinco();
        $datos['seccion_dos_indicador_seis'] = $this->modeloGrafico->seccion_dos_indicador_seis();
        $this->load->view('plantilla', $datos);
    }

    public function listado_sedes($id_valor) {

        if (!isset($id_valor)) {

        } else {
            switch ($id_valor) {
                case '1':
                    $datos['sedes'] = $this->modeloGrafico->listar_sedes();
                    $datos['sedes_modal'] = $this->modeloGrafico->modal_sedes_carga_requisitos();
                    //$datos['sedes_modal_verifica'] = $this->modeloGrafico->modal_sedes_carga_requisitos_verifica();
                    $this->load->view('grafico/seccion_2/sede_requisitos_vista_si', $datos);
                    break;

                case '2':
                    $datos['sedes'] = $this->modeloGrafico->listar_sedes();
                    $datos['sedes_modal'] = $this->modeloGrafico->modal_sedes_carga_requisitos();
                    $datos['sedes_modal_verifica'] = $this->modeloGrafico->modal_sedes_carga_requisitos_verifica();
                    $this->load->view('grafico/seccion_2/sede_requisitos_vista_no', $datos);
                    break;

                case '3':
                    $datos['sedes'] = $this->modeloGrafico->listar_sedes();
                    $datos['sedes_modal_uno'] = $this->modeloGrafico->modal_sedes_carga_pcs(2);
                    $this->load->view('grafico/seccion_2/sede_pcs_vista_2', $datos);
                    break;

                case '4':
                    $datos['sedes'] = $this->modeloGrafico->listar_sedes();
                    $datos['sedes_modal_dos'] = $this->modeloGrafico->modal_sedes_carga_pcs(3);
                    $this->load->view('grafico/seccion_2/sede_pcs_vista_3', $datos);
                    break;

                case '5':
                    $datos['sedes'] = $this->modeloGrafico->listar_sedes();
                    $datos['sedes_modal_tres'] = $this->modeloGrafico->modal_sedes_carga_pcs(4);
                    $this->load->view('grafico/seccion_2/sede_pcs_vista_4', $datos);
                    break;

                case '6':
                    $datos['sedes'] = $this->modeloGrafico->listar_sedes();
                    $datos['sedes_modal'] = $this->modeloGrafico->modal_sedes_carga_internet(1);
                    $this->load->view('grafico/seccion_2/sede_internet_vista_si', $datos);
                    break;

                case '7':
                    $datos['sedes'] = $this->modeloGrafico->listar_sedes();
                    $datos['sedes_modal'] = $this->modeloGrafico->modal_sedes_carga_internet(2);
                    $this->load->view('grafico/seccion_2/sede_internet_vista_no', $datos);;
                    break;

                case '8':
                    $datos['sedes'] = $this->modeloGrafico->listar_sedes();
                    $datos['sedes_modal'] = $this->modeloGrafico->modal_sedes_carga_impresora(1);
                    $this->load->view('grafico/seccion_2/sede_impresora_vista_si', $datos);
                    break;

                case '9':
                    $datos['sedes'] = $this->modeloGrafico->listar_sedes();
                    $datos['sedes_modal'] = $this->modeloGrafico->modal_sedes_carga_impresora(2);
                    $this->load->view('grafico/seccion_2/sede_impresora_vista_no', $datos);
                    break;
            }
        }
    }

    public function grafico_tres() {
        add_js(array('facebox/src/facebox','jquery-ui.min'));
        add_js_(array('highcharts/highcharts','highcharts/data','highcharts/drilldown'));
        $datos['titulo'] = "Gráfico sección tres";
        $datos['contenido'] = 'grafico/seccion_tres_grafico_vista';
        $datos['cantidad_total'] = $this->modeloGrafico->cantidad_total_cargo();
        // $datos['suma_coordinador_sedes'] = $this->modeloGrafico->suma_coordinador_sede();
        // $datos['suma_total_coordinador_sede'] = $this->modeloGrafico->suma_total_Coordinador_sede_();
        // $datos['suma_coordinador_lider_local'] = $this->modeloGrafico->suma_coordinador_lider_local();
        // $datos['suma_total_coordinador_lider_local_sede'] = $this->modeloGrafico->suma_total_coordinador_lider_local_sede_();
        // $datos['suma_supervisor_informatico'] = $this->modeloGrafico->suma_supervisor_informatico();
        // $datos['suma_total_supervisor_informatico_sede'] = $this->modeloGrafico->suma_total_supervisor_informatico_sede_();
        $datos['suma_total_cantidades_cargos']=$this->modeloGrafico->suma_cantidades_cargos();
        $this->load->view('plantilla', $datos);
    }

}
