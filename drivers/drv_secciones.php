<?php
class Secciones extends MaeSeccionesMySqlDAO{

    public function getAll(){
        $objSec = new MaeSeccionesMySqlDAO();
        $res = $objSec->queryAll();
        return $res;
    }
}