<?php
class Med extends MaeMedicosMySqlDAO{
    public function getAllMedicos(){
        $sql = "select * from mae_medicos";
        $sqlQuery = new  SqlQuery($sql);

        $arr=$this->execute($sqlQuery);
        $ret = Array();

        foreach($arr as &$t){
            $f= array(
                "rutnum"=>$t["rutnum"],
                "fullname"=>utf8_encode($t["fullname"])

            );
            array_push($ret,$f);
        }

        return(json_encode($ret));
    }
}