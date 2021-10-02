<?php

class group{

    public static function add($conn,$r){

        $sql = "INSERT INTO `association`(`group_name`, `group_leader`, `address`, `mobile`, `status`) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$r[0]);
        $stmt->bindParam(2,$r[1]);
        $stmt->bindParam(3,$r[2]);
        $stmt->bindParam(4,$r[3]);
        $stmt->bindParam(5,$r[4]);
        return $stmt->execute();
    }

    public static function search_id_group($conn,$id){

        $sql ="SELECT * FROM `association` WHERE `group_id`=?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function fetch_all($conn){

        $sql ="SELECT * FROM `association` WHERE `group_id` > 1 ORDER BY `group_id` DESC LIMIT 0,1000";
        $stmt = $conn->prepare($sql);
        //$stmt->bindParam("i",$id);
        $stmt->execute();

        return $stmt->fetchAll();

    }

    public static function update(){

        $sql ="UPDATE `association` SET `group_name` = '11', `group_leader` = '11', `address` = '11', `mobile` = '11' WHERE `group_id` = 4";
    }

    public static function status(){

        $sql ="UPDATE `association` SET `status` = '111' WHERE `group_id` = 4";
    }

    public static function delete($conn,$id){

        $sql ="DELETE FROM `association` WHERE `group_id`=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id',$id);
        return $stmt->execute();
    }
}


?>