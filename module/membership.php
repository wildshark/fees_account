<?php

class membership{

    public static function global_search($conn,$string){

        $sql="SELECT
        membership.*, 
        association.group_name
    FROM
        membership
        INNER JOIN
        association
        ON 
            membership.group_id = association.group_id
    WHERE
        membership.account LIKE '%{$string}%' OR
        membership.fname LIKE '%{$string}%' OR
        membership.mname LIKE '%{$string}%' OR
        membership.lname LIKE '%{$string}%' OR
        membership.id_num LIKE '%{$string}%' OR
        membership.mobile1 LIKE '%{$string}%' OR
        membership.mobile2 LIKE '%{$string}%'";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();

    }

    public static function add($conn,$r){

        $sql ="INSERT INTO `membership`(`account`,`group_id`, `fname`, `mname`, `lname`, `dob`, `nationality`, `id_card_type`, `id_num`, `email`, `mobile1`, `mobile2`, `occupation`, `address1`, `address2`, `nok`, `relationship`, `nok_mobile`, `nok_address`, `status`) VALUES (:account,:group_id,:fname,:mname,:lname,:dob,:nationality,:id_card_type,:id_num,:email,:mobile1,:mobile2,:occupation,:address1,:address2,:nok,:relationship,:nok_mobile,:nok_address,:cstatus)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':account',$r[0]);
        $stmt->bindParam(':group_id',$r[1]);
        $stmt->bindParam(':fname',$r[2]);
        $stmt->bindParam(':mname',$r[3]);
        $stmt->bindParam(':lname',$r[4]);
        $stmt->bindParam(':dob',$r[5]);
        $stmt->bindParam(':nationality',$r[6]);
        $stmt->bindParam(':id_card_type',$r[7]);
        $stmt->bindParam(':id_num',$r[8]);
        $stmt->bindParam(':email',$r[9]);
        $stmt->bindParam(':mobile1',$r[10]);
        $stmt->bindParam(':mobile2',$r[11]);
        $stmt->bindParam(':occupation',$r[12]);
        $stmt->bindParam(':address1',$r[13]);
        $stmt->bindParam(':address2',$r[14]);
        $stmt->bindParam(':nok',$r[15]);
        $stmt->bindParam(':relationship',$r[16]);
        $stmt->bindParam(':nok_mobile',$r[17]);
        $stmt->bindParam(':nok_address',$r[18]);
        $stmt->bindParam(':cstatus',$r[19]);
        return $stmt->execute();
    }

    public static function update($conn,$r){

        $sql ="UPDATE `membership` SET `account`=?, `group_id` = ?, `fname` = ?, `mname` = ?, `lname` = ?, `dob` = ?, `nationality` = ?, `id_card_type` = ?, `id_num` = ?, `email` = ?, `mobile1` = ?, `mobile2` = ?, `occupation` = ?, `address1` = ?, `address2` = ?, `nok` = ?, `relationship` = ?, `nok_mobile` = ?, `nok_address` = ?, `status` = ? WHERE `member_id` = ?";
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
        $stmt->bindParam(12,$r[11]);
        $stmt->bindParam(13,$r[12]);
        $stmt->bindParam(14,$r[13]);
        $stmt->bindParam(15,$r[14]);
        $stmt->bindParam(16,$r[15]);
        $stmt->bindParam(17,$r[16]);
        $stmt->bindParam(18,$r[17]);
        $stmt->bindParam(19,$r[18]);
        $stmt->bindParam(20,$r[19]);
        $stmt->bindParam(21,$r[20]);
        return $stmt->execute();
    }

    public static function search_id_member($conn,$id){
        $sql ="SELECT membership.*, `association`.group_name FROM membership INNER JOIN `association` ON membership.group_id = `association`.group_id WHERE `member_id`=?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public static function fetch_all($conn){

        $sql ="SELECT membership.*, `association`.group_name FROM membership INNER JOIN `association` ON membership.group_id = `association`.group_id ORDER BY membership.member_id DESC";
        $stmt = $conn->prepare($sql);
        //$stmt->bindParam("i",$id);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function view($conn,$id){

        $sql ="SELECT membership.*, `association`.group_name FROM membership INNER JOIN `association` ON membership.group_id = `association`.group_id WHERE membership.account = :id ORDER BY membership.member_id DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public static function delete($conn,$id){

        $sql ="DELETE FROM `membership` WHERE `member_id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$id);
        return $stmt->execute();
    }


    public static function fetch_individual_transaction($conn,$id){

        //dues summary
        $sql = "SELECT membership.member_id, membership.account, sum(monthly_dues.dues_amt) AS total FROM monthly_dues INNER JOIN membership ON monthly_dues.member_id = membership.member_id WHERE membership.account = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->execute();

        $dues_summary = $stmt->fetch();

        //dues details
        $sql = "SELECT monthly_dues.*, membership.account FROM monthly_dues INNER JOIN membership ON monthly_dues.member_id = membership.member_id WHERE membership.account = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->execute();

        $dues_details = $stmt->fetchAll();

        //loan summary
        $sql ="SELECT member_leger.members_id, sum(member_leger.loan) AS loan, sum(member_leger.paid) AS paid, membership.account FROM member_leger INNER JOIN membership ON member_leger.members_id = membership.member_id WHERE membership.account = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->execute();

        $loan_summary = $stmt->fetch();

        //loan details
        $sql ="SELECT member_leger.*, membership.account FROM member_leger INNER JOIN membership ON member_leger.members_id = membership.member_id WHERE membership.account = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->execute();

        $loan_details = $stmt->fetchAll();

        return array(
            "dues_summary" => $dues_summary,
            "dues_details"=>$dues_details,
            "loan_summary"=> $loan_summary,
            "loan_details"=>$loan_details
        );
    }

    public static function add_new_loan($conn,$r){

        $sql="INSERT INTO 'main'.'member_leger'('members_id', 'tran_clock', 'tran_date', 'details', 'ref', 'loan' ) VALUES (?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$r[0]);
        $stmt->bindParam(2,$r[1]);
        $stmt->bindParam(3,$r[2]);
        $stmt->bindParam(4,$r[3]);
        $stmt->bindParam(5,$r[4]);
        $stmt->bindParam(6,$r[5]);
        return $stmt->execute();
    }

    public static function add_pay_loan($conn,$r){

        $sql="INSERT INTO 'main'.'member_leger'('members_id', 'tran_clock', 'tran_date', 'details', 'ref', 'paid' ) VALUES (?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$r[0]);
        $stmt->bindParam(2,$r[1]);
        $stmt->bindParam(3,$r[2]);
        $stmt->bindParam(4,$r[3]);
        $stmt->bindParam(5,$r[4]);
        $stmt->bindParam(6,$r[5]);
        return $stmt->execute();
    }

    public static function delete_loan($conn,$ref){

        $sql="DELETE FROM 'main'.'member_leger' WHERE ref =?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$ref);
        return $stmt->execute();
    }
}

?>