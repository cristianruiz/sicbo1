<?php

class Ult_oa extends ULTOAMySqlDAO{
    public function updUlt($id,$numero){
        $ult = new ULTOA();
        $ultMy = new  ULTOAMySqlDAO();
        $ult->id = $id;
        $ult->nUMERO = $numero;
        $ultMy->update($ult);
    }

    public function insertUltimo($sec,$mes,$ano,$numero){
        $ult = new ULTOA();
        $utlMy = new  ULTOAMySqlExtDAO();
        $ult->aDM = 1;
        $ult->sEC = $sec;
        $ult->mES = $mes;
        $ult->aNO = $ano;
        $ult->nUMERO = $numero;
        $utlMy->insert($ult);
        if (($ult->id)>0){
            return true;
        } else {
            return false;
        }
    }
}