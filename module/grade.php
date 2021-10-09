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

    public static function delete($conn,$id){

        $sql ="DELETE FROM 'main'.'class_grade' WHERE rowid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function add_section($conn,$string){

        $sql ="INSERT INTO 'main'.'st_class_type'('session_name') VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$string);
        return $stmt->execute();

    }

    public static function fetch_section($conn){

        $sql ="SELECT *,rowid 'NAVICAT_ROWID' FROM 'main'.'st_class_type' LIMIT 0,1000";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();

    }

    public static function delete_section($conn,$id){

        $sql="DELETE FROM 'main'.'st_class_type' WHERE rowid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$id);
        return $stmt->execute();
    }

    public static function reset_class($conn){

        $sql="DELETE FROM st_class_type";
        $stmt = $conn->prepare($sql);
        return $stmt->execute();
    }

    public static function reset_section($conn){

        $sql="DELETE FROM class_grade";
        $stmt = $conn->prepare($sql);
        return $stmt->execute();
    }

    public static function backup_grade($conn){

        $sql ="";
    }

    
}

?>