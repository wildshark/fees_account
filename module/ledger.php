<?php

class ledger{

    public static function add_grant($conn,$r){

        $sql ="INSERT INTO `ledger`(`group_id`, `trandate`, `details`, `ref`, `tran_type`, `receive_amt`,`ledger_status`) VALUES (?,?,?,?,?,?,?)";
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

    public static function add_pay_group($conn,$r){
        $sql ="INSERT INTO `ledger`(`group_id`, `trandate`, `details`, `ref`, `tran_type`, `pay_group_amt`,`ledger_status`) VALUES (?,?,?,?,?,?,?)";
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

    public static function add_pay_out($conn,$r){

        $sql ="INSERT INTO `ledger`(`group_id`, `trandate`, `details`, `ref`, `tran_type`, `pay_out_amt`,`ledger_status`) VALUES (?,?,?,?,?,?,?)";
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

    public static function add_pay_back($conn,$r){

        $sql ="INSERT INTO `ledger`(`group_id`, `trandate`, `details`, `ref`, `tran_type`, `pay_back_amt`,`ledger_status`) VALUES (?,?,?,?,?,?,?)";
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



    public static function grant_fetch_all($conn){

        $sql ="SELECT * FROM `ledger` WHERE `ledger_status`=1 ORDER BY `ledger_id` DESC LIMIT 0,1000";
        $stmt = $conn->prepare($sql);
        //$stmt->bindParam("i",$id);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function pay_groups_fetch_all($conn){

        $sql ="SELECT ledger.*, `association`.group_name FROM	ledger INNER JOIN `association` ON ledger.group_id = `association`.group_id WHERE ledger.ledger_status = 2 ORDER BY	ledger.ledger_id DESC";

        $stmt = $conn->prepare($sql);
        //$stmt->bindParam("i",$id);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function payout_fetch_all($conn){

        $sql ="SELECT ledger.*, `association`.group_name FROM ledger INNER JOIN `association` ON ledger.group_id = `association`.group_id WHERE ledger.ledger_status = 3 ORDER BY ledger.ledger_id DESC";
        $stmt = $conn->prepare($sql);
        //$stmt->bindParam("i",$id);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function payback_fetch_all($conn){

        $sql ="SELECT ledger.*, `association`.group_name FROM ledger INNER JOIN `association` ON ledger.group_id = `association`.group_id WHERE ledger.ledger_status = 4 ORDER BY ledger.ledger_id DESC LIMIT 0,1000";
        $stmt = $conn->prepare($sql);
        //$stmt->bindParam("i",$id);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function grant_ledger_summary($conn){

        $sql = "SELECT count(ledger.ledger_id) AS total, sum(ledger.receive_amt) AS dr, sum(ledger.pay_group_amt) AS cr, sum(ledger.receive_amt - ledger.pay_group_amt) AS bal FROM ledger WHERE ledger.ledger_status = 1 OR ledger.ledger_status = 2";
       
       $stmt = $conn->prepare($sql);
        //$stmt->bindParam("i",$id);
        $stmt->execute();
        
        return $stmt->fetch();
    }

    public static function grant_ledger_details($conn){

        $sql ="SELECT * FROM ledger WHERE ledger.ledger_status = 1 OR ledger.ledger_status = 2 ORDER BY ledger.ledger_id DESC";
        $stmt = $conn->prepare($sql);
        //$stmt->bindParam("i",$id);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function group_ledger_summary($conn){

        $sql ="SELECT count(ledger.ledger_id) AS total, sum(ledger.pay_group_amt) AS dr, sum(ledger.pay_out_amt) AS cr, sum(ledger.pay_group_amt - ledger.pay_out_amt) AS bal FROM ledger WHERE ledger.ledger_status = 2 OR ledger.ledger_status = 3";
        $stmt = $conn->prepare($sql);
        //$stmt->bindParam("i",$id);
        $stmt->execute();
        return $stmt->fetch(); 
    }

    public static function group_ledger_details($conn){

        $sql ="SELECT ledger.group_id, association.group_name, COUNT(ledger.group_id) as total, sum(ledger.pay_group_amt) AS dr, sum(ledger.pay_out_amt) AS cr, sum(ledger.pay_group_amt - ledger.pay_out_amt) AS bal FROM ledger INNER JOIN association ON ledger.group_id = association.group_id GROUP BY	ledger.group_id, association.group_name";
        $stmt = $conn->prepare($sql);
        //$stmt->bindParam("i",$id);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function summary_ledger($conn){

        $sql ="SELECT sum(ledger.receive_amt) as r_amt, sum(ledger.pay_group_amt) as g_amt, sum(ledger.pay_out_amt) as o_amt, sum(ledger.pay_back_amt) as b_amt FROM ledger";
        $stmt = $conn->prepare($sql);
        //$stmt->bindParam("i",$id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public static function fetch_transaction($conn){

        $sql = "SELECT `association`.group_name, ledger.*, (receive_amt+pay_group_amt+pay_out_amt+pay_back_amt) AS amt FROM ledger INNER JOIN `association` ON  ledger.group_id = `association`.group_id ORDER BY ledger.ledger_id DESC LIMIT 0,7";
        $stmt = $conn->prepare($sql);
        //$stmt->bindParam("i",$id);
        $stmt->execute();

        if(0 < $stmt->fetchColumn()){
            return false;
        }else{
            return $stmt->fetchAll();
        }
    }

    public static function fetch_member_ledger_total($conn){

        $sql ="SELECT count(member_leger.m_ledger_id) AS total, sum(member_leger.loan) AS loan, sum(member_leger.paid) AS paid, sum(member_leger.loan - member_leger.paid) AS bal FROM member_leger";
        $stmt = $conn->prepare($sql);
        //$stmt->bindParam("i",$id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public static function fetch_member_ledger_summary($conn){

        $sql="SELECT
        membership.member_id, 
        membership.account, 
        membership.group_id, 
        membership.fname, 
        membership.mname, 
        membership.lname, 
        sum(member_leger.loan) AS loan, 
        sum(member_leger.paid) AS paid, 
        sum(member_leger.loan - member_leger.paid) AS bal, 
        association.group_name
    FROM
        membership
        INNER JOIN
        member_leger
        ON 
            membership.member_id = member_leger.members_id
        INNER JOIN
        association
        ON 
            membership.group_id = association.group_id
    GROUP BY
        membership.member_id
    ORDER BY
        association.group_name ASC";

        $stmt = $conn->prepare($sql);
        //$stmt->bindParam("i",$id);
        $stmt->execute();

        return $stmt->fetchAll();

    }

    public static function get_total_monthly_dues($conn,$id){

        $sql="SELECT
        monthly_dues.member_id, 
        sum(monthly_dues.dues_amt) AS amt
    FROM
        monthly_dues
    WHERE
        monthly_dues.member_id = ?
    GROUP BY
        monthly_dues.member_id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public static function delete($conn,$id){

        $sql ="DELETE FROM `ledger` WHERE `ledger_id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$id);
        return $stmt->execute();

    }


}

?>