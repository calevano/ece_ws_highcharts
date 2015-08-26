<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grafico_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function listar_sedes(){
        $query=$this->db->select('Cod_Sede,Nombre_Sede')
                    ->get('sede');
        return $query->result_array();
    }

    private function suma_join(){
        return " FROM
                    avance_sel_personal AS asper
                    LEFT JOIN sede AS sed ON asper.Cod_Sede=sed.Cod_Sede
                    LEFT JOIN departamento AS dep ON sed.CCDD=dep.CCDD";
    }
    public function cantidad_total_cargo(){
        $sql="SELECT
                (SUM(CASE WHEN asper.SupervInfor_PEA_Programada IS NULL THEN 0 ELSE asper.SupervInfor_PEA_Programada END ) +
                SUM(CASE WHEN asper.SupervInfor_PEA_Contrato IS NULL THEN 0 ELSE asper.SupervInfor_PEA_Contrato END )) AS total_SupervInfor,
                (SUM(CASE WHEN asper.Coor_LiderLocal_PEA_Programada IS NULL THEN 0 ELSE asper.Coor_LiderLocal_PEA_Programada END ) +
                SUM(CASE WHEN asper.Coor_LiderLocal_PEA_Contrato IS NULL THEN 0 ELSE asper.Coor_LiderLocal_PEA_Contrato END )) AS total_Coor_LiderLocal,
                (SUM(CASE WHEN asper.Coor_Sede_PEA_Programada IS NULL THEN 0 ELSE asper.Coor_Sede_PEA_Programada END ) +
                SUM(CASE WHEN asper.Coor_Sede_PEA_Contrato IS NULL THEN 0 ELSE asper.Coor_Sede_PEA_Contrato  END )) AS total_Coor_Sede,
                (SUM(CASE WHEN asper.Coor_Local_PEA_Programada IS NULL THEN 0 ELSE asper.Coor_Local_PEA_Programada END ) +
                SUM(CASE WHEN asper.Coor_Local_Meta_Preseleccion IS NULL THEN 0 ELSE asper.Coor_Local_Meta_Preseleccion END  ) +
                SUM(CASE WHEN asper.Coor_Local_PEA_Inscrita IS NULL THEN 0 ELSE asper.Coor_Local_PEA_Inscrita END ) +
                SUM(CASE WHEN asper.Coor_Local_PEA_cumplePerfil IS NULL THEN 0 ELSE asper.Coor_Local_PEA_cumplePerfil END  ) +
                SUM(CASE WHEN asper.Coor_Local_PEA_PreSeleccionada IS NULL THEN 0 ELSE asper.Coor_Local_PEA_PreSeleccionada END  ) +
                SUM(CASE WHEN asper.Coor_Local_Meta_Capacita IS NULL THEN 0 ELSE asper.Coor_Local_Meta_Capacita END ) +
                SUM(CASE WHEN asper.Coor_Local_PEA_aCapacitar IS NULL THEN 0 ELSE asper.Coor_Local_PEA_aCapacitar END ) +
                SUM(CASE WHEN asper.Coor_Local_PEA_Aprobado_Capacita IS NULL THEN 0 ELSE asper.Coor_Local_PEA_Aprobado_Capacita END  ) +
                SUM(CASE WHEN asper.Coor_Local_PEA_Seleccionada IS NULL THEN 0 ELSE asper.Coor_Local_PEA_Seleccionada END )) AS total_Coor_Local,
                (SUM(CASE WHEN asper.Asist_CoordLocal_PEA_Programada IS NULL THEN 0 ELSE asper.Asist_CoordLocal_PEA_Programada END ) +
                SUM(CASE WHEN asper.Asist_CoordLocal_Meta_Preseleccion IS NULL THEN 0 ELSE asper.Asist_CoordLocal_Meta_Preseleccion END ) +
                SUM(CASE WHEN asper.Asist_CoordLocal_PEA_Inscrita IS NULL THEN 0 ELSE asper.Asist_CoordLocal_PEA_Inscrita END ) +
                SUM(CASE WHEN asper.Asist_CoordLocal_PEA_cumplePerfil IS NULL THEN 0 ELSE asper.Asist_CoordLocal_PEA_cumplePerfil END ) +
                SUM(CASE WHEN asper.Asist_CoordLocal_PEA_PreSeleccionada IS NULL THEN 0 ELSE asper.Asist_CoordLocal_PEA_PreSeleccionada END ) +
                SUM(CASE WHEN asper.Asist_CoordLocal_Meta_Capacita IS NULL THEN 0 ELSE asper.Asist_CoordLocal_Meta_Capacita END ) +
                SUM(CASE WHEN asper.Asist_CoordLocal_PEA_aCapacitar IS NULL THEN 0 ELSE asper.Asist_CoordLocal_PEA_aCapacitar END ) +
                SUM(CASE WHEN asper.Asist_CoordLocal_PEA_Aprobado_Capacita IS NULL THEN 0 ELSE asper.Asist_CoordLocal_PEA_Aprobado_Capacita END ) +
                SUM(CASE WHEN asper.Asist_CoordLocal_PEA_Seleccionada IS NULL THEN 0 ELSE asper.Asist_CoordLocal_PEA_Seleccionada END )) AS total_Asist_CoordLocal,
                (SUM(CASE WHEN asper.Informatico_Local_PEA_Programada IS NULL THEN 0 ELSE asper.Informatico_Local_PEA_Programada END ) +
                SUM(CASE WHEN asper.Informatico_Local_Meta_Preseleccion IS NULL THEN 0 ELSE asper.Informatico_Local_Meta_Preseleccion END ) +
                SUM(CASE WHEN asper.Informatico_Local_PEA_Inscrita IS NULL THEN 0 ELSE asper.Informatico_Local_PEA_Inscrita END ) +
                SUM(CASE WHEN asper.Informatico_Local_PEA_cumplePerfil IS NULL THEN 0 ELSE asper.Informatico_Local_PEA_cumplePerfil END ) +
                SUM(CASE WHEN asper.Informatico_Local_PEA_PreSeleccionada IS NULL THEN 0 ELSE asper.Informatico_Local_PEA_PreSeleccionada  END ) +
                SUM(CASE WHEN asper.Informatico_Local_Meta_Capacita IS NULL THEN 0 ELSE asper.Informatico_Local_Meta_Capacita END ) +
                SUM(CASE WHEN asper.Informatico_Local_PEA_aCapacitar IS NULL THEN 0 ELSE asper.Informatico_Local_PEA_aCapacitar END ) +
                SUM(CASE WHEN asper.Informatico_Local_PEA_Aprobado_Capacita IS NULL THEN 0 ELSE asper.Informatico_Local_PEA_Aprobado_Capacita END ) +
                SUM(CASE WHEN asper.Informatico_Local_PEA_Seleccionada IS NULL THEN 0 ELSE asper.Informatico_Local_PEA_Seleccionada END )) AS total_Informatico_Local,
                (SUM(CASE WHEN asper.Asist_InforLocal_PEA_Programada IS NULL THEN 0 ELSE asper.Asist_InforLocal_PEA_Programada END ) +
                SUM(CASE WHEN asper.Asist_InforLocal_Meta_Preseleccion IS NULL THEN 0 ELSE asper.Asist_InforLocal_Meta_Preseleccion END ) +
                SUM(CASE WHEN asper.Asist_InforLocal_PEA_Inscrita IS NULL THEN 0 ELSE asper.Asist_InforLocal_PEA_Inscrita END ) +
                SUM(CASE WHEN asper.Asist_InforLocal_PEA_cumplePerfil IS NULL THEN 0 ELSE asper.Asist_InforLocal_PEA_cumplePerfil END ) +
                SUM(CASE WHEN asper.Asist_InforLocal_PEA_PreSeleccionada IS NULL THEN 0 ELSE asper.Asist_InforLocal_PEA_PreSeleccionada END ) +
                SUM(CASE WHEN asper.Asist_InforLocal_Meta_Capacita IS NULL THEN 0 ELSE asper.Asist_InforLocal_Meta_Capacita END ) +
                SUM(CASE WHEN asper.Asist_InforLocal_PEA_aCapacitar IS NULL THEN 0 ELSE asper.Asist_InforLocal_PEA_aCapacitar END ) +
                SUM(CASE WHEN asper.Asist_InforLocal_PEA_Aprobado_Capacita IS NULL THEN 0 ELSE asper.Asist_InforLocal_PEA_Aprobado_Capacita END ) +
                SUM(CASE WHEN asper.Asist_InforLocal_PEA_Seleccionada IS NULL THEN 0 ELSE asper.Asist_InforLocal_PEA_Seleccionada END )) AS total_Asist_InforLocal,
                (SUM(CASE WHEN asper.Aplicador_PEA_Programada IS NULL THEN 0 ELSE asper.Aplicador_PEA_Programada END ) +
                SUM(CASE WHEN asper.Aplicador_Meta_Preseleccion IS NULL THEN 0 ELSE asper.Aplicador_Meta_Preseleccion END ) +
                SUM(CASE WHEN asper.Aplicador_PEA_Inscrita IS NULL THEN 0 ELSE asper.Aplicador_PEA_Inscrita END ) +
                SUM(CASE WHEN asper.Aplicador_PEA_cumplePerfil IS NULL THEN 0 ELSE asper.Aplicador_PEA_cumplePerfil END ) +
                SUM(CASE WHEN asper.Aplicador_PEA_PreSeleccionada IS NULL THEN 0 ELSE asper.Aplicador_PEA_PreSeleccionada END ) +
                SUM(CASE WHEN asper.Aplicador_Meta_Capacita IS NULL THEN 0 ELSE asper.Aplicador_Meta_Capacita END ) +
                SUM(CASE WHEN asper.Aplicador_PEA_aCapacitar IS NULL THEN 0 ELSE asper.Aplicador_PEA_aCapacitar END ) +
                SUM(CASE WHEN asper.Aplicador_PEA_Aprobado_Capacita IS NULL THEN 0 ELSE asper.Aplicador_PEA_Aprobado_Capacita END ) +
                SUM(CASE WHEN asper.Aplicador_PEA_Seleccionada IS NULL THEN 0 ELSE asper.Aplicador_PEA_Seleccionada END )) AS total_Aplicador,
                (SUM(CASE WHEN asper.Orientador_PEA_Programada IS NULL THEN 0 ELSE asper.Orientador_PEA_Programada END ) +
                SUM(CASE WHEN asper.Orientador_Meta_Preseleccion IS NULL THEN 0 ELSE asper.Orientador_Meta_Preseleccion END ) +
                SUM(CASE WHEN asper.Orientador_PEA_Inscrita IS NULL THEN 0 ELSE asper.Orientador_PEA_Inscrita END ) +
                SUM(CASE WHEN asper.Orientador_PEA_cumplePerfil IS NULL THEN 0 ELSE asper.Orientador_PEA_cumplePerfil END ) +
                SUM(CASE WHEN asper.Orientador_PEA_PreSeleccionada IS NULL THEN 0 ELSE asper.Orientador_PEA_PreSeleccionada END ) +
                SUM(CASE WHEN asper.Orientador_Meta_Capacita IS NULL THEN 0 ELSE asper.Orientador_Meta_Capacita END ) +
                SUM(CASE WHEN asper.Orientador_PEA_aCapacitar IS NULL THEN 0 ELSE asper.Orientador_PEA_aCapacitar END ) +
                SUM(CASE WHEN asper.Orientador_PEA_Aprobado_Capacita IS NULL THEN 0 ELSE asper.Orientador_PEA_Aprobado_Capacita END ) +
                SUM(CASE WHEN asper.Orientador_PEA_Seleccionada IS NULL THEN 0 ELSE asper.Orientador_PEA_Seleccionada END )) AS total_Orientador,
                (SUM(CASE WHEN asper.Operador_Informatico_PEA_Programada IS NULL THEN 0 ELSE asper.Operador_Informatico_PEA_Programada END ) +
                SUM(CASE WHEN asper.Operador_Informatico_Meta_Preseleccion IS NULL THEN 0 ELSE asper.Operador_Informatico_Meta_Preseleccion END ) +
                SUM(CASE WHEN asper.Operador_Informatico_PEA_Inscrita IS NULL THEN 0 ELSE asper.Operador_Informatico_PEA_Inscrita END ) +
                SUM(CASE WHEN asper.OperadorInformatico_PEA_cumplePerfil IS NULL THEN 0 ELSE asper.OperadorInformatico_PEA_cumplePerfil END ) +
                SUM(CASE WHEN asper.Operador_Informatico_PEA_PreSeleccionada IS NULL THEN 0 ELSE asper.Operador_Informatico_PEA_PreSeleccionada END ) +
                SUM(CASE WHEN asper.Operador_Informatico_Meta_Capacita IS NULL THEN 0 ELSE asper.Operador_Informatico_Meta_Capacita END ) +
                SUM(CASE WHEN asper.Operador_Informatico_PEA_aCapacitar IS NULL THEN 0 ELSE asper.Operador_Informatico_PEA_aCapacitar END ) +
                SUM(CASE WHEN asper.Operador_Informatico_PEA_Aprobado_Capacita IS NULL THEN 0 ELSE asper.Operador_Informatico_PEA_Aprobado_Capacita END ) +
                SUM(CASE WHEN asper.Operador_Informatico_PEA_Seleccionada IS NULL THEN 0 ELSE asper.Operador_Informatico_PEA_Seleccionada END )) AS total_Operador_Informatico";
        $sql .=$this->suma_join();
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    private function select_dep_sed(){
        return "SELECT dep.*, sed.*, ";
    }

    public function suma_coordinador_sede(){
        $sql= $this->select_dep_sed();
        $sql .="asper.Coor_Sede_PEA_Programada,asper.Coor_Sede_PEA_Contrato,(case when asper.Coor_Sede_PEA_Programada is null then 0 else asper.Coor_Sede_PEA_Programada end + case when asper.Coor_Sede_PEA_Contrato is null then 0 else asper.Coor_Sede_PEA_Contrato end) AS total_Coor_Sede_sumamos ";
        $sql .=$this->suma_join();
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function suma_total_Coordinador_sede_(){
        $sql="SELECT
                sum(case when asper.Coor_Sede_PEA_Programada is null then 0 else asper.Coor_Sede_PEA_Programada end +
                case when asper.Coor_Sede_PEA_Contrato is null then 0 else asper.Coor_Sede_PEA_Contrato end) AS total_Coor_Sede_sumamos";
        $sql .=$this->suma_join();
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function suma_coordinador_lider_local(){
        $sql= $this->select_dep_sed();
        $sql .= "asper.Coor_LiderLocal_PEA_Programada,asper.Coor_LiderLocal_PEA_Contrato,(case when asper.Coor_LiderLocal_PEA_Programada is null then 0 else asper.Coor_LiderLocal_PEA_Programada end +case when asper.Coor_LiderLocal_PEA_Contrato is null then 0 else asper.Coor_LiderLocal_PEA_Contrato end) AS total_Coor_LiderLocal_sumamos ";
        $sql .=$this->suma_join();
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function suma_total_coordinador_lider_local_sede_(){
        $sql="SELECT
                sum(case when asper.Coor_LiderLocal_PEA_Programada is null then 0 else asper.Coor_LiderLocal_PEA_Programada end +
                case when asper.Coor_LiderLocal_PEA_Contrato is null then 0 else asper.Coor_LiderLocal_PEA_Contrato end) AS total_Coor_LiderLocal_sumamos";
        $sql .=$this->suma_join();
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function suma_supervisor_informatico(){
        $sql= $this->select_dep_sed();
        $sql .= "asper.SupervInfor_PEA_Programada,asper.SupervInfor_PEA_Contrato,(case when asper.SupervInfor_PEA_Programada is null then 0 else asper.SupervInfor_PEA_Programada end + case when asper.SupervInfor_PEA_Contrato is null then 0 else asper.SupervInfor_PEA_Contrato end) AS total_SupervInfor_sumamos ";
        $sql .=$this->suma_join();
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function suma_total_supervisor_informatico_sede_(){
        $sql="SELECT
                sum(case when asper.SupervInfor_PEA_Programada is null then 0 else asper.SupervInfor_PEA_Programada end +
                case when asper.SupervInfor_PEA_Contrato is null then 0 else asper.SupervInfor_PEA_Contrato end) AS total_SupervInfor_sumamos";
        $sql .=$this->suma_join();
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function suma_cantidades_cargos(){
        $sql = $this->select_dep_sed();
        $sql .="
                ((case when asper.Coor_Sede_PEA_Programada is null then 0 else asper.Coor_Sede_PEA_Programada end +
                case when asper.Coor_Sede_PEA_Contrato is null then 0 else asper.Coor_Sede_PEA_Contrato end)) AS total_Coor_Sede,
                ((case when asper.Coor_LiderLocal_PEA_Programada is null then 0 else asper.Coor_LiderLocal_PEA_Programada end +
                case when asper.Coor_LiderLocal_PEA_Contrato is null then 0 else asper.Coor_LiderLocal_PEA_Contrato end)) AS total_Coor_LiderLocal,
                ((case when asper.SupervInfor_PEA_Programada is null then 0 else asper.SupervInfor_PEA_Programada end +
                case when asper.SupervInfor_PEA_Contrato is null then 0 else asper.SupervInfor_PEA_Contrato end)) AS total_SupervInfor,
                ((case when asper.Coor_Local_PEA_Programada is null then 0 else asper.Coor_Local_PEA_Programada end ) +
                (case when asper.Coor_Local_Meta_Preseleccion is null then 0 else asper.Coor_Local_Meta_Preseleccion end  ) +
                (case when asper.Coor_Local_PEA_Inscrita is null then 0 else asper.Coor_Local_PEA_Inscrita end ) +
                (case when asper.Coor_Local_PEA_cumplePerfil is null then 0 else asper.Coor_Local_PEA_cumplePerfil end  ) +
                (case when asper.Coor_Local_PEA_PreSeleccionada is null then 0 else asper.Coor_Local_PEA_PreSeleccionada end  ) +
                (case when asper.Coor_Local_Meta_Capacita is null then 0 else asper.Coor_Local_Meta_Capacita end ) +
                (case when asper.Coor_Local_PEA_aCapacitar is null then 0 else asper.Coor_Local_PEA_aCapacitar end ) +
                (case when asper.Coor_Local_PEA_Aprobado_Capacita is null then 0 else asper.Coor_Local_PEA_Aprobado_Capacita end  ) +
                (case when asper.Coor_Local_PEA_Seleccionada is null then 0 else asper.Coor_Local_PEA_Seleccionada end )) AS total_Coor_Local,
                ((case when asper.Asist_CoordLocal_PEA_Programada is null then 0 else asper.Asist_CoordLocal_PEA_Programada end ) +
                (case when asper.Asist_CoordLocal_Meta_Preseleccion is null then 0 else asper.Asist_CoordLocal_Meta_Preseleccion end ) +
                (case when asper.Asist_CoordLocal_PEA_Inscrita is null then 0 else asper.Asist_CoordLocal_PEA_Inscrita end ) +
                (case when asper.Asist_CoordLocal_PEA_cumplePerfil is null then 0 else asper.Asist_CoordLocal_PEA_cumplePerfil end ) +
                (case when asper.Asist_CoordLocal_PEA_PreSeleccionada is null then 0 else asper.Asist_CoordLocal_PEA_PreSeleccionada end ) +
                (case when asper.Asist_CoordLocal_Meta_Capacita is null then 0 else asper.Asist_CoordLocal_Meta_Capacita end ) +
                (case when asper.Asist_CoordLocal_PEA_aCapacitar is null then 0 else asper.Asist_CoordLocal_PEA_aCapacitar end ) +
                (case when asper.Asist_CoordLocal_PEA_Aprobado_Capacita is null then 0 else asper.Asist_CoordLocal_PEA_Aprobado_Capacita end ) +
                (case when asper.Asist_CoordLocal_PEA_Seleccionada is null then 0 else asper.Asist_CoordLocal_PEA_Seleccionada end )) AS total_Asist_CoordLocal,
                ((case when asper.Informatico_Local_PEA_Programada is null then 0 else asper.Informatico_Local_PEA_Programada end ) +
                (case when asper.Informatico_Local_Meta_Preseleccion is null then 0 else asper.Informatico_Local_Meta_Preseleccion end ) +
                (case when asper.Informatico_Local_PEA_Inscrita is null then 0 else asper.Informatico_Local_PEA_Inscrita end ) +
                (case when asper.Informatico_Local_PEA_cumplePerfil is null then 0 else asper.Informatico_Local_PEA_cumplePerfil end ) +
                (case when asper.Informatico_Local_PEA_PreSeleccionada is null then 0 else asper.Informatico_Local_PEA_PreSeleccionada  end ) +
                (case when asper.Informatico_Local_Meta_Capacita is null then 0 else asper.Informatico_Local_Meta_Capacita end ) +
                (case when asper.Informatico_Local_PEA_aCapacitar is null then 0 else asper.Informatico_Local_PEA_aCapacitar end ) +
                (case when asper.Informatico_Local_PEA_Aprobado_Capacita is null then 0 else asper.Informatico_Local_PEA_Aprobado_Capacita end ) +
                (case when asper.Informatico_Local_PEA_Seleccionada is null then 0 else asper.Informatico_Local_PEA_Seleccionada end )) AS total_Informatico_Local,
                ((case when asper.Asist_InforLocal_PEA_Programada is null then 0 else asper.Asist_InforLocal_PEA_Programada end ) +
                (case when asper.Asist_InforLocal_Meta_Preseleccion is null then 0 else asper.Asist_InforLocal_Meta_Preseleccion end ) +
                (case when asper.Asist_InforLocal_PEA_Inscrita is null then 0 else asper.Asist_InforLocal_PEA_Inscrita end ) +
                (case when asper.Asist_InforLocal_PEA_cumplePerfil is null then 0 else asper.Asist_InforLocal_PEA_cumplePerfil end ) +
                (case when asper.Asist_InforLocal_PEA_PreSeleccionada is null then 0 else asper.Asist_InforLocal_PEA_PreSeleccionada end ) +
                (case when asper.Asist_InforLocal_Meta_Capacita is null then 0 else asper.Asist_InforLocal_Meta_Capacita end ) +
                (case when asper.Asist_InforLocal_PEA_aCapacitar is null then 0 else asper.Asist_InforLocal_PEA_aCapacitar end ) +
                (case when asper.Asist_InforLocal_PEA_Aprobado_Capacita is null then 0 else asper.Asist_InforLocal_PEA_Aprobado_Capacita end ) +
                (case when asper.Asist_InforLocal_PEA_Seleccionada is null then 0 else asper.Asist_InforLocal_PEA_Seleccionada end )) AS total_Asist_InforLocal,
                ((case when asper.Aplicador_PEA_Programada is null then 0 else asper.Aplicador_PEA_Programada end ) +
                (case when asper.Aplicador_Meta_Preseleccion is null then 0 else asper.Aplicador_Meta_Preseleccion end ) +
                (case when asper.Aplicador_PEA_Inscrita is null then 0 else asper.Aplicador_PEA_Inscrita end ) +
                (case when asper.Aplicador_PEA_cumplePerfil is null then 0 else asper.Aplicador_PEA_cumplePerfil end ) +
                (case when asper.Aplicador_PEA_PreSeleccionada is null then 0 else asper.Aplicador_PEA_PreSeleccionada end ) +
                (case when asper.Aplicador_Meta_Capacita is null then 0 else asper.Aplicador_Meta_Capacita end ) +
                (case when asper.Aplicador_PEA_aCapacitar is null then 0 else asper.Aplicador_PEA_aCapacitar end ) +
                (case when asper.Aplicador_PEA_Aprobado_Capacita is null then 0 else asper.Aplicador_PEA_Aprobado_Capacita end ) +
                (case when asper.Aplicador_PEA_Seleccionada is null then 0 else asper.Aplicador_PEA_Seleccionada end )) AS total_Aplicador,
                ((case when asper.Orientador_PEA_Programada is null then 0 else asper.Orientador_PEA_Programada end ) +
                (case when asper.Orientador_Meta_Preseleccion is null then 0 else asper.Orientador_Meta_Preseleccion end ) +
                (case when asper.Orientador_PEA_Inscrita is null then 0 else asper.Orientador_PEA_Inscrita end ) +
                (case when asper.Orientador_PEA_cumplePerfil is null then 0 else asper.Orientador_PEA_cumplePerfil end ) +
                (case when asper.Orientador_PEA_PreSeleccionada is null then 0 else asper.Orientador_PEA_PreSeleccionada end ) +
                (case when asper.Orientador_Meta_Capacita is null then 0 else asper.Orientador_Meta_Capacita end ) +
                (case when asper.Orientador_PEA_aCapacitar is null then 0 else asper.Orientador_PEA_aCapacitar end ) +
                (case when asper.Orientador_PEA_Aprobado_Capacita is null then 0 else asper.Orientador_PEA_Aprobado_Capacita end ) +
                (case when asper.Orientador_PEA_Seleccionada is null then 0 else asper.Orientador_PEA_Seleccionada end )) AS total_Orientador,
                ((case when asper.Operador_Informatico_PEA_Programada is null then 0 else asper.Operador_Informatico_PEA_Programada end ) +
                (case when asper.Operador_Informatico_Meta_Preseleccion is null then 0 else asper.Operador_Informatico_Meta_Preseleccion end ) +
                (case when asper.Operador_Informatico_PEA_Inscrita is null then 0 else asper.Operador_Informatico_PEA_Inscrita end ) +
                (case when asper.OperadorInformatico_PEA_cumplePerfil is null then 0 else asper.OperadorInformatico_PEA_cumplePerfil end ) +
                (case when asper.Operador_Informatico_PEA_PreSeleccionada is null then 0 else asper.Operador_Informatico_PEA_PreSeleccionada end ) +
                (case when asper.Operador_Informatico_Meta_Capacita is null then 0 else asper.Operador_Informatico_Meta_Capacita end ) +
                (case when asper.Operador_Informatico_PEA_aCapacitar is null then 0 else asper.Operador_Informatico_PEA_aCapacitar end ) +
                (case when asper.Operador_Informatico_PEA_Aprobado_Capacita is null then 0 else asper.Operador_Informatico_PEA_Aprobado_Capacita end ) +
                (case when asper.Operador_Informatico_PEA_Seleccionada is null then 0 else asper.Operador_Informatico_PEA_Seleccionada end )) AS total_Operador_Informatico ";
        $sql .=$this->suma_join();
        $sql .= " ORDER BY sed.Nombre_Sede";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


    public function obtener_indicador_seccion_tres_nivel_1(){
        $sql="SELECT
                dep.*,
                sed.*,
                asper.Coor_Sede_PEA_Programada,
                asper.Coor_Sede_PEA_Contrato,
                asper.Coor_LiderLocal_PEA_Programada,
                asper.Coor_LiderLocal_PEA_Contrato,
                asper.SupervInfor_PEA_Programada,
                asper.SupervInfor_PEA_Contrato
            FROM
                avance_sel_personal AS asper
                LEFT JOIN sede AS sed ON asper.Cod_Sede=sed.Cod_Sede
                LEFT JOIN departamento AS dep ON sed.CCDD=dep.CCDD";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function obtener_indicador_seccion_tres_nivel_2(){
        $sql="SELECT
                dep.*,
                sed.*,
                asper.Coor_Local_PEA_Programada,
                asper.Coor_Local_Meta_Preseleccion,
                asper.Coor_Local_PEA_Inscrita,
                asper.Coor_Local_PEA_cumplePerfil,
                asper.Coor_Local_PEA_PreSeleccionada,
                asper.Coor_Local_Meta_Capacita,
                asper.Coor_Local_PEA_aCapacitar,
                asper.Coor_Local_PEA_Aprobado_Capacita,
                asper.Coor_Local_PEA_Seleccionada,
                asper.Asist_CoordLocal_PEA_Programada,
                asper.Asist_CoordLocal_Meta_Preseleccion,
                asper.Asist_CoordLocal_PEA_Inscrita,
                asper.Asist_CoordLocal_PEA_cumplePerfil,
                asper.Asist_CoordLocal_PEA_PreSeleccionada,
                asper.Asist_CoordLocal_Meta_Capacita,
                asper.Asist_CoordLocal_PEA_aCapacitar,
                asper.Asist_CoordLocal_PEA_Aprobado_Capacita,
                asper.Asist_CoordLocal_PEA_Seleccionada,
                asper.Informatico_Local_PEA_Programada,
                asper.Informatico_Local_Meta_Preseleccion,
                asper.Informatico_Local_PEA_Inscrita,
                asper.Informatico_Local_PEA_cumplePerfil,
                asper.Informatico_Local_PEA_PreSeleccionada,
                asper.Informatico_Local_Meta_Capacita,
                asper.Informatico_Local_PEA_aCapacitar,
                asper.Informatico_Local_PEA_Aprobado_Capacita,
                asper.Informatico_Local_PEA_Seleccionada,
                asper.Asist_InforLocal_PEA_Programada,
                asper.Asist_InforLocal_Meta_Preseleccion,
                asper.Asist_InforLocal_PEA_Inscrita,
                asper.Asist_InforLocal_PEA_cumplePerfil,
                asper.Asist_InforLocal_PEA_PreSeleccionada,
                asper.Asist_InforLocal_Meta_Capacita,
                asper.Asist_InforLocal_PEA_aCapacitar,
                asper.Asist_InforLocal_PEA_Aprobado_Capacita,
                asper.Asist_InforLocal_PEA_Seleccionada
            FROM
                avance_sel_personal AS asper
                LEFT JOIN sede AS sed ON asper.Cod_Sede=sed.Cod_Sede
                LEFT JOIN departamento AS dep ON sed.CCDD=dep.CCDD";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function obtener_indicador_seccion_tres_nivel_3(){
        $sql="SELECT
                dep.*,
                sed.*,
                asper.Aplicador_PEA_Programada,
                asper.Aplicador_Meta_Preseleccion,
                asper.Aplicador_PEA_Inscrita,
                asper.Aplicador_PEA_cumplePerfil,
                asper.Aplicador_PEA_PreSeleccionada,
                asper.Aplicador_Meta_Capacita,
                asper.Aplicador_PEA_aCapacitar,
                asper.Aplicador_PEA_Aprobado_Capacita,
                asper.Aplicador_PEA_Seleccionada,
                asper.Orientador_PEA_Programada,
                asper.Orientador_Meta_Preseleccion,
                asper.Orientador_PEA_Inscrita,
                asper.Orientador_PEA_cumplePerfil,
                asper.Orientador_PEA_PreSeleccionada,
                asper.Orientador_Meta_Capacita,
                asper.Orientador_PEA_aCapacitar,
                asper.Orientador_PEA_Aprobado_Capacita,
                asper.Orientador_PEA_Seleccionada,
                asper.Operador_Informatico_PEA_Programada,
                asper.Operador_Informatico_Meta_Preseleccion,
                asper.Operador_Informatico_PEA_Inscrita,
                asper.OperadorInformatico_PEA_cumplePerfil,
                asper.Operador_Informatico_PEA_PreSeleccionada,
                asper.Operador_Informatico_Meta_Capacita,
                asper.Operador_Informatico_PEA_aCapacitar,
                asper.Operador_Informatico_PEA_Aprobado_Capacita,
                asper.Operador_Informatico_PEA_Seleccionada
            FROM
                avance_sel_personal AS asper
                LEFT JOIN sede AS sed ON asper.Cod_Sede=sed.Cod_Sede
                LEFT JOIN departamento AS dep ON sed.CCDD=dep.CCDD";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function obtener_indicador_seccion_uno(){
        $sql="SELECT
                    a.Cod_Sede,
                    a.Nombre_Sede,
                    a.CCDD,
                    b.A1_1_1_SINO
                FROM
                    sede AS a
                    LEFT JOIN actividad b ON a.Cod_Sede=b.Cod_SedE
                    ORDER BY a.Nombre_Sede";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function seccion_dos_indicador_uno(){
        $sql="SELECT
                COUNT(1) AS cantidad,
                round(COUNT(1)/35*100,2) AS porc
            FROM
                actividad
            WHERE
                A2_2_1_SINO=1
                AND A2_2_2_TOTAL>=3
                AND A2_2_4_SINO=1
                AND A2_2_5_SINO=1
                AND A2_2_6_SINO=1
                AND A2_2_7_SINO=1
                AND A2_2_8_TOTAL>=2
                AND A2_2_9_SINO=1
                AND A2_2_11_SINO=1
                AND A2_2_12_SINO=1
                AND A2_2_13_SINO=1
                AND A2_2_14_SINO=1
                AND A2_2_15_SINO=1
                AND A2_2_16_SINO=1
                AND A2_2_17_SINO=1";

        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function seccion_dos_indicador_dos(){
        $sql="SELECT COUNT(1) AS cantidad,round(COUNT(1)/35*100,2) AS porc FROM actividad WHERE A2_2_8_TOTAL<=2";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function seccion_dos_indicador_tres(){
        $sql="SELECT COUNT(1) AS cantidad,round(COUNT(1)/35*100,2) AS porc FROM actividad WHERE A2_2_8_TOTAL=3";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function seccion_dos_indicador_cuatro(){
        $sql="SELECT COUNT(1) AS cantidad,round(COUNT(1)/35*100,2) AS porc FROM actividad WHERE A2_2_8_TOTAL>=4";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function seccion_dos_indicador_cinco(){
        $sql="SELECT COUNT(1) AS cantidad,round(COUNT(1)/35*100,2) AS porc FROM actividad WHERE A2_2_9_SINO=1";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function seccion_dos_indicador_seis(){
        $sql="SELECT COUNT(1) AS cantidad,round(COUNT(1)/35*100,2) AS porc FROM actividad WHERE A2_2_11_SINO=1";
        $query = $this->db->query($sql);
        return $query->row_array();
    }
    public function modal_sedes_carga_requisitos_verifica(){
        $sql="SELECT
                    act.Cod_Sede,
                    act.A2_2_1_SINO,
                    act.A2_2_2_TOTAL,
                    act.A2_2_4_SINO,
                    act.A2_2_5_SINO,
                    act.A2_2_6_SINO,
                    act.A2_2_7_SINO,
                    act.A2_2_8_TOTAL,
                    act.A2_2_9_SINO,
                    act.A2_2_11_SINO,
                    act.A2_2_12_SINO,
                    act.A2_2_13_SINO,
                    act.A2_2_14_SINO,
                    act.A2_2_15_SINO,
                    act.A2_2_16_SINO,
                    act.A2_2_17_SINO,
                    sed.Nombre_Sede
                FROM
                    actividad AS act
                    LEFT JOIN sede AS sed ON act.Cod_Sede = sed.Cod_Sede
                WHERE
                    act.A2_2_1_SINO =1
                    OR act.A2_2_2_TOTAL >=3
                    OR act.A2_2_4_SINO =1
                    OR act.A2_2_5_SINO =1
                    OR act.A2_2_6_SINO =1
                    OR act.A2_2_7_SINO =1
                    OR act.A2_2_8_TOTAL >=2
                    OR act.A2_2_9_SINO =1
                    OR act.A2_2_11_SINO =1
                    OR act.A2_2_12_SINO =1
                    OR act.A2_2_13_SINO =1
                    OR act.A2_2_14_SINO =1
                    OR act.A2_2_15_SINO =1
                    OR act.A2_2_16_SINO =1
                    OR act.A2_2_17_SINO =1 ORDER BY sed.Nombre_Sede";
    $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function modal_sedes_carga_requisitos(){

        $sql="SELECT act.Cod_Sede,
                    act.A2_2_1_SINO,
                    act.A2_2_2_TOTAL,
                    act.A2_2_4_SINO,
                    act.A2_2_5_SINO,
                    act.A2_2_6_SINO,
                    act.A2_2_7_SINO,
                    act.A2_2_8_TOTAL,
                    act.A2_2_9_SINO,
                    act.A2_2_11_SINO,
                    act.A2_2_12_SINO,
                    act.A2_2_13_SINO,
                    act.A2_2_14_SINO,
                    act.A2_2_15_SINO,
                    act.A2_2_16_SINO,
                    act.A2_2_17_SINO,
                    sed.Nombre_Sede
                FROM actividad AS act
                    LEFT JOIN sede AS sed ON act.Cod_Sede = sed.Cod_Sede
                WHERE
                    act.A2_2_1_SINO =1
                    AND act.A2_2_2_TOTAL >=3
                    AND act.A2_2_4_SINO =1
                    AND act.A2_2_5_SINO =1
                    AND act.A2_2_6_SINO =1
                    AND act.A2_2_7_SINO =1
                    AND act.A2_2_8_TOTAL >=2
                    AND act.A2_2_9_SINO =1
                    AND act.A2_2_11_SINO =1
                    AND act.A2_2_12_SINO =1
                    AND act.A2_2_13_SINO =1
                    AND act.A2_2_14_SINO =1
                    AND act.A2_2_15_SINO =1
                    AND act.A2_2_16_SINO =1
                    AND act.A2_2_17_SINO =1
                    ORDER BY sed.Nombre_Sede";
        $query = $this->db->query($sql);
        return $query->result_array();

    }

    public function modal_sedes_carga_pcs($id){
        switch ($id) {
            case '2':
                $var_where=" act.A2_2_8_TOTAL<={$id} ";
                break;
            case '3':
                $var_where=" act.A2_2_8_TOTAL={$id} ";
                break;
            case '4':
                $var_where=" act.A2_2_8_TOTAL>={$id} ";
                break;
        }

        $sql="SELECT act.Cod_Sede, sed.Nombre_Sede
            FROM actividad AS act
            LEFT JOIN sede AS sed ON act.Cod_Sede = sed.Cod_Sede
            WHERE 1=1 AND ".$var_where." ORDER BY sed.Nombre_Sede";
        $query = $this->db->query($sql);
        return $query->result_array();
    }



    public function modal_sedes_carga_internet($tipo){
        ($tipo==1)? $igual="=": $igual="!=";
        $sql="SELECT act.Cod_Sede, sed.Nombre_Sede
            FROM actividad AS act
            LEFT JOIN sede AS sed ON act.Cod_Sede = sed.Cod_Sede
            WHERE A2_2_9_SINO {$igual} 1 ORDER BY sed.Nombre_Sede";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function modal_sedes_carga_impresora($tipo){
        ($tipo==1)? $igual="=": $igual="!=";
        $sql="SELECT act.Cod_Sede, sed.Nombre_Sede
                FROM actividad AS act
                LEFT JOIN sede AS sed ON act.Cod_Sede = sed.Cod_Sede
                WHERE A2_2_11_SINO {$igual} 1  ORDER BY sed.Nombre_Sede";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
