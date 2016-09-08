<?php
class Insumos extends MaeInsumosMySqlDAO{
    public function getAll(){
        $ins = new MaeInsumosMySqlDAO();
        $res = $ins->queryAll();
        return(json_encode($res));
    }

    public function getInsByCodigo($codigo){
        $ins = new  Insumos();
        $res = $ins->load($codigo);
        return(json_encode($res));
    }
}