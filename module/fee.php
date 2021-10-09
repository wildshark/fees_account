<?php

class fees{

    public static function summary_ledger($conn){

        $sql ="SELECT sum(fee_ledger.bill) as bill, sum(fee_ledger.paid) as paid, sum(fee_ledger.bill - fee_ledger.paid) as bal FROM fee_ledger";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetch();

    }

    public static function fetch_ledger($conn){

        $sql ="SELECT * FROM 'main'.'get_ledger' LIMIT 0,1000";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();

    }

    public static function student_ledger_sum($conn,$id){
        
        $sql ="SELECT * FROM 'main'.'get_ledger' WHERE student_id=? LIMIT 0,1000";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public static function fetch_view_ledger($conn,$id){

        $sql ="SELECT * FROM 'main'.'get_ledger_details' WHERE student_id=? LIMIT 0,1000";
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

    public static function add_payment($conn,$r){

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

    public static function delete($conn,$id){

        $sql="DELETE FROM 'main'.'fee_ledger' WHERE rowid =?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$id);
        return $stmt->execute();
    }

    public static function reset_ledger($conn){

        $sql="DELETE FROM fee_ledger";
        $stmt = $conn->prepare($sql);
        return $stmt->execute();
    }

    public static function restore_ledger($conn,$ledger){

        foreach($ledger as $r){

            $sql ="INSERT INTO 'main'.'fee_ledger'('ledger_id','student_id', 'tran_date', 'ref', 'class_id', 'term_id', 'acad_yr', 'details', 'pay_type', 'bill','paid') VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1,$r['ledger_id']);
            $stmt->bindParam(2,$r['student_id']);
            $stmt->bindParam(3,$r['tran_date']);
            $stmt->bindParam(4,$r['ref']);
            $stmt->bindParam(5,$r['class_id']);
            $stmt->bindParam(6,$r['term_id']);
            $stmt->bindParam(7,$r['acad_yr']);
            $stmt->bindParam(8,$r['details']);
            $stmt->bindParam(9,$r['pay_type']);
            $stmt->bindParam(10,$r['bill']);
            $stmt->bindParam(11,$r['paid']);

            return $stmt->execute();

        }
        
    }
}


?>