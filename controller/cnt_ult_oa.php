<?php
class Ult_oa_controller extends ULTOAMySqlDAO{

    public function getUltimo($codigoseccion,$mes,$anio){

        $sql = 'SELECT * FROM ULT_OA WHERE ADM=1 AND SEC='.$codigoseccion.' AND MES='.$mes.' AND ANO='.$anio.' ';
        $sqlQuery = new  SqlQuery($sql);

        $arr = $this->execute($sqlQuery);$ret = Array();

        foreach ($arr as $t) {
            $f = array(
                "ADM"=>$t["ADM"],
                "SEC"=>$t["SEC"],
                "MES"=>$t["MES"],
                "ANO"=>$t["ANO"],
                "NUMERO"=>$t["NUMERO"],
                'id'=>$t['id'],
            );
            array_push($ret,$f);
        }
        return(json_encode($ret));
    }

    public function updUltimo($num,$id){

        $sql = 'UPDATE ULT_OA SET NUMERO='.$num.' WHERE id='.$id.' ';
        $sqlQuery = new SqlQuery($sql);

        try{
            $numrows=$this->executeUpdate($sqlQuery);
        } catch(Exception $e){
            print_r("ERROR:".$e->getMessage());
            $numrows=0;
        }
        return $numrows;
    }

}