<?php

class fees{

    public static function summary_ledger($conn){

        $sql ="SELECT sum(fee_ledger.bill) as bill, sum(fee_ledger.paid) as paid, sum(fee_ledger.bill - fee_ledger.paid) as bal FROM fee_ledger";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();

    }

    public static function fetch_ledger($conn){

        $sql ="SELECT * FROM 'main'.'get_ledger' LIMIT 0,1000";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();

    }

    public static function fetch_view_ledger($conn,$r){

        $sql ="SELECT * FROM 'main'.'get_ledger' WHERE student_id=? LIMIT 0,1000";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function add_bill($conn,$r){

        $sql ="INSERT INTO 'main'.'fee_ledger'('student_id', 'tran_date', 'ref', 'class_id', 'term_id', 'acad_yr', 'details', 'pay_type', 'bill') VALUES (?,?,?,?,?,?,?,?,?)";
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

    public static function fetch_bill($conn){

        $sql ="SELECT * FROM 'main'.'get_bills' LIMIT 0,1000";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();

    }

    public static function fetch_payment($conn){

        $sql ="SELECT * FROM 'main'.'get_payment' LIMIT 0,1000";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();

    }

    public static function add_paid($conn,$r){

        $sql ="INSERT INTO 'main'.'fee_ledger'('student_id', 'tran_date', 'ref', 'class_id', 'term_id', 'acad_yr', 'details', 'pay_type', 'paid') VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
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

    public static function delete($conn,$r){

        $sql="DELETE FROM 'main'.'fee_ledger' WHERE rowid =?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$id);
        return $stmt->execute();
    }
}


?>