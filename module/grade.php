<?php

class grade{

    public static function add($conn,$r){

        $sql="INSERT INTO 'main'.'class_grade'('grade') VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$r[0]);
        return $stmt->execute();
    }

    public static function update($conn,$r){

        $sql ="UPDATE 'main'.'class_grade' SET 'grade' =? WHERE rowid =?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$id);
        return $stmt->execute();
    }

    public static function fetch($conn){

        $sql="SELECT *,rowid 'NAVICAT_ROWID' FROM 'main'.'class_grade' LIMIT 0,1000";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function delete($conn,$r){

        $sql ="DELETE FROM 'main'.'class_grade' WHERE rowid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    
}

?>