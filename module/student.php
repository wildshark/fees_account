<?php
class student{

    public static function total($conn){

        $sql ="SELECT count(get_profile_active.student_id) as total FROM get_profile_active";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetch();
    }

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

        $sql ="UPDATE 'main'.'student_profile' SET 'student_num' =?, 'full_name' = ?, 'gender' = ?, 'dob' = ?, 'nationality' = ?, 'contact_address' = ?, 'gname' = ?, 'gmobile' = ?, 'status_id' =? WHERE rowid = ?";
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

    public static function view_assign_batch($conn,$id){

        $sql="SELECT * FROM 'main'.'get_student_assign' WHERE student_id=? LIMIT 0,1000";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function add_assign_batch($conn,$r){

        $sql ="INSERT INTO 'main'.'student_assign_batch'('student_id', 'class_id', 'st_class_type_id', 'acad_id', 'tran_date','term_id', 'fees') VALUES (?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$r[0]);
        $stmt->bindParam(2,$r[1]);
        $stmt->bindParam(3,$r[2]);
        $stmt->bindParam(4,$r[3]);
        $stmt->bindParam(5,$r[4]);
        $stmt->bindParam(6,$r[5]);
        $stmt->bindParam(7,$r[6]);

        return $stmt->execute();
    }

    public static function delete_assign_batch($conn,$id){

        $sql="DELETE FROM 'main'.'student_assign_batch' WHERE rowid =?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$id);

        return $stmt->execute();
    }

    
    public static function reset_student($conn){

        $sql="DELETE FROM student_profile";
        $stmt = $conn->prepare($sql);

        return $stmt->execute();
    }

    public static function reset_assign_batch($conn){

        $sql="DELETE FROM student_assign_batch";
        $stmt = $conn->prepare($sql);

        return $stmt->execute();
    }

    public static function backup_student($conn){

        $sql="SELECT *,rowid 'NAVICAT_ROWID' FROM 'main'.'student_profile'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function backup_batch($conn){

        $sql="SELECT *,rowid 'NAVICAT_ROWID' FROM 'main'.'student_assign_batch'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function restore_student($conn,$student){

        foreach($student as $r){
                
            $sql="INSERT INTO 'main'.'student_profile'('student_id','student_num', 'full_name', 'gender', 'dob', 'nationality', 'contact_address', 'gname', 'gmobile', 'photo', 'status_id') VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1,$r['student_id']);
            $stmt->bindParam(2,$r['student_num']);
            $stmt->bindParam(3,$r['full_name']);
            $stmt->bindParam(4,$r['gender']);
            $stmt->bindParam(5,$r['dob']);
            $stmt->bindParam(6,$r['nationality']);
            $stmt->bindParam(7,$r['contact_address']);
            $stmt->bindParam(8,$r['gname']);
            $stmt->bindParam(9,$r['gmobile']);
            $stmt->bindParam(10,$r['photo']);
            $stmt->bindParam(11,$r['status_id']);
            $restore = $stmt->execute();
        }

        return $restore;
    }

    public static function restore_section($conn,$section){

        foreach($section as $r){

            $sql ="INSERT INTO 'main'.'st_class_type'('st_class_type_id','session_name') VALUES (?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1,$r['st_class_type_id']);
            $stmt->bindParam(2,$r['session_name']);
            $response = $stmt->execute();
        }
       
        return $response;
    }
}

?>