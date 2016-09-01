<?php
class Secciones extends MaeSeccionesMySqlDAO{

    public function getAll(){
        $objSec = new MaeSeccionesMySqlDAO();
        $res = $objSec->queryAll();
        return $res;
    }

    public  function  getByCodigo($codigo){
        $objSec = new  MaeSeccionesMySqlDAO();
        $res = $objSec->load($codigo);
        return (json_encode($res));
    }
}