<?php
class Financiador extends MaeFinanciadorMySqlDAO{
    public function getAll(){
        $objFin = new MaeFinanciadorMySqlDAO();
        $res = $objFin->queryAll();
        return $res;
    }
}