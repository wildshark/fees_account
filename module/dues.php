<?php

class dues{


    public static function add($conn,$r){

        $sql ="INSERT INTO 'main'.'monthly_dues'('group_id', 'member_id', 'trantime', 'trandate', 'dues_month', 'dues_year', 'paytype', 'ref', 'dues_amt') VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
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

        return $stmt->execute();
    }

    public static function fetch_all($conn){

        $sql = "SELECT
        monthly_dues.*, 
        association.group_name, 
        membership.account, 
        membership.fname, 
        membership.mname, 
        membership.lname
    FROM
        monthly_dues
        INNER JOIN
        association
        ON 
            monthly_dues.group_id = association.group_id
        INNER JOIN
        membership
        ON 
            monthly_dues.member_id = membership.member_id
    ORDER BY
        monthly_dues.dues_id DESC";
         $stmt = $conn->prepare($sql);
         //$stmt->bindParam(1,$id);
         $stmt->execute();
     
         return $stmt->fetchAll();
    }
   
}


?>