<?php
class student{

    public static function add($conn,$r){

        $sql="INSERT INTO 'main'.'student_profile'('student_num', 'full_name', 'gender', 'dob', 'nationality', 'contact_address', 'gname', 'gmobile', 'photo', 'status_id') VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$r[0]);
        $stmt->bindParam(2,$r[1]);
        $stmt->bindParam(3,$r[2]);
        $stmt->bindParam(4,$r[3]);
        $stmt->bindParam(5,$r[4]);
        $stmt->bindParam(6,$r[5]);
        $stmt->bindParam(7,$r[6]);
        $stmt->bindParam(8,$r[7]);
        $stmt->bindParam(9,$r[8]);
        $stmt->bindParam(10,$r[9]);

        if(false == $stmt->execute()){
            return false;
        }else{
            return $conn->lastInsertId();
        }
    }

    public static function update($conn,$r){

        $sql ="UPDATE 'main'.'student_profile' SET 'student_num' =?, 'full_name' = ?, 'gender' = ?, 'dob' = ?, 'nationality' = ?, 'contact_address' = ?, 'gname' = ?, 'gmobile' = ?, 'photo' = ?, 'status_id' =? WHERE rowid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$r[0]);
        $stmt->bindParam(2,$r[1]);
        $stmt->bindParam(3,$r[2]);
        $stmt->bindParam(4,$r[3]);
        $stmt->bindParam(5,$r[4]);
        $stmt->bindParam(6,$r[5]);
        $stmt->bindParam(7,$r[6]);
        $stmt->bindParam(8,$r[7]);
        $stmt->bindParam(9,$r[8]);
        $stmt->bindParam(10,$r[9]);
        $stmt->bindParam(11,$r[10]);
        return $stmt->execute();
    }

    public static function fetch_active($conn){

        $sql="SELECT * FROM 'main'.'get_profile_active' LIMIT 0,1000";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function fetch_passive($conn){

        $sql="SELECT * FROM 'main'.'get_profile_passive' LIMIT 0,1000";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function view($conn,$id){

        $sql="SELECT *,rowid 'NAVICAT_ROWID' FROM 'main'.'student_profile' WHERE student_id=? LIMIT 0,1000";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public static function delete($conn,$id){

        $sql="DELETE FROM 'main'.'student_profile' WHERE rowid =?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$id);
        return $stmt->execute();
    }

    public static function assign_batch($conn){

        $sql="SELECT * FROM 'main'.'get_student_assign' LIMIT 0,1000";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}

?>