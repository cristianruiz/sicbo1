<?php
class Secc extends MaeSeccionesMySqlDAO{
    public function json_buscador_secciones(){
        $sql = "select codigoseccion,concat(codigoseccion,'->',descripcion)as descripcion
                from mae_secciones";
        $sqlQuery = new  SqlQuery($sql);

        $arr=$this->execute($sqlQuery);
        $ret = Array();

        foreach($arr as &$t){
            $f= array(
                "codigoseccion"=>$t["codigoseccion"],
                "descripcion"=>utf8_encode($t["descripcion"])

            );
            array_push($ret,$f);
        }

        return(json_encode($ret));
    }

    public function getNombreByCod($cod){
        $sql = "select descripcion from mae_secciones WHERE  coddigoseccion=".$cod."";
        $sqlQuery = new  SqlQuery($sql);

        $res = $this->execute($sqlQuery);
        $nom_sec = $res['descripcion'];
        return $nom_sec;

    }
}
