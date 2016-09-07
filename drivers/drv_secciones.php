<?php
class Secciones extends MaeSeccionesMySqlDAO{

    public function getAll(){
        $objSe = new MaeSeccionesMySqlDAO();
        $res = $objSe->queryAll();
        return(json_encode($res));
    }

    public  function  getByCodigo($codigo){
        $objSec = new  MaeSeccionesMySqlDAO();
        $res = $objSec->load($codigo);
        return (json_encode($res));
    }
}