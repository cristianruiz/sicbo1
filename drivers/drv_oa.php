<?php
class O_a extends ZoaCargoMySqlDAO{
    public function insertCabecera($cod_sec,$nro_oa,$periodo,$fecha,$nro_fi,$hora,$minuto,$rut_fin,$rut_pac,$tipo_pac,$tipo,$tipo_pag,$idtoth){
        $oa = new  ZoaCargo();
        $oaMy = new ZoaCargoMySqlDAO();
        $oa->codigoseccion = $cod_sec;
        $oa->nrocargo = $nro_oa;
        $oa->periodo = $periodo;
        $oa->fecha = $fecha;
        $oa->nroficha = $nro_fi;
        $oa->hora = $hora;
        $oa->minuto = $minuto;
        $oa->rutfinanciador = $rut_fin;
        $oa->rutpaciente = $rut_pac;
        $oa->tipopaciente = $tipo_pac;
        $oa->tipo = $tipo;
        $oa->tipopago = $tipo_pag;
        $oa->idtoth = $idtoth;

        $oaMy->insert($oa);
        if (($oa->folio)>0){
            $folio = $oa->folio;
            return $folio;
        } else {
            //return false;
            return(print_r('mal'));
        }
    }

    public function insertDetSer($cod_sec,$nro_oa,$periodo,$cod_det,$tipo_det,$p_unit,$cantidad,$recargo,$folio_cargo){
        $oa_det = new  ZoaDetallecargo();
        $oa_detMy = new  ZoaDetallecargoMySqlDAO();
        $oa_det->codigoseccion = $cod_sec;
        $oa_det->nrocargo = $nro_oa;
        $oa_det->periodo = $periodo;
        $oa_det->codigodetalle = $cod_det;
        $oa_det->tipodetalle = $tipo_det;
        $oa_det->preciounitario = $p_unit;
        $oa_det->cantidadentregada = $cantidad;
        $oa_det->recargo = $recargo;
        $oa_det->foliocargo = $folio_cargo;

        $oa_detMy->insert($oa_det);

        if (($oa_det->iddetalle)>0){
            return true;
        } else {
            return false;
        }
    }

}