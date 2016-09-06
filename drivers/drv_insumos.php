<?php
class Insumos extends MaeInsumosMySqlDAO{
    public function getAll(){
        $ins = new MaeInsumosMySqlDAO();
        $res = $ins->queryAll();
        return(json_encode($res));
    }
}