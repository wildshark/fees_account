<?php

class user_account{


    public static function login($conn,$r){

        $sql ="SELECT * FROM `user_account` WHERE `username`=:u AND `password`=:p";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':u',$r[0]);
        $stmt->bindParam(':p',$r[1]);
        $stmt->execute();

        return $stmt->fetch();
    }

    public static function password($conn,$string){

        $sql="UPDATE 'main'.'user_account' SET 'password' =? WHERE rowid = 1";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$string);
        return $stmt->execute();
    }

}

?>