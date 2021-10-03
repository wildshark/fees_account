<?php

setcookie("_page",$_REQUEST['_admin'], time()+3600);

switch($_REQUEST['_admin']){

    case"dashboard";
        require("template/dashboard.php");
    break;

    case"profile";
        $data = student::fetch_active($conn);
        require("template/profile.list.php");
    break;

    case"new.profile";
        $student_id = "";
        $fullname = "";
        $dob = "";
        $gender = "";
        $nationality = "";
        $address = "";
        $gname = "";
        $gmobile = "";
        $photo = "";
        $status ="";
        $btn = "add-new-profile";
        require("template/add.profile.php");
    break;

    case"update.profile";
        $data = student::view($conn,$_GET['id']);
        $student_id = $data['student_num'];
        $fullname = $data['full_name'];
        $dob = $data['dob'];
        $gender = $data['gender'];
        $nationality = $data['nationality'];
        $address = $data['contact_address'];
        $gname = $data['gname'];
        $gmobile = $data['gmobile'];
        $photo = $data['photo'];
        $status = $data['status_id'];
        $_SESSION['sudent_id'] = $data['student_id'];
        $btn = "update-profile";
        require("template/add.profile.php");
    break;

    case"archive";
        $data = student::fetch_passive($conn);
        require("template/profile.list.php");
    break;

    case"ledger";
        $data = fees::fetch_ledger($conn);
        require("template/ledger.php");
    break;

    case"billing";
        $data = fees::fetch_bill($conn);  
        require("template/billing.php");
    break;

    case"payment";
        $data = fees::fetch_payment($conn);
        require("template/payment.php");
    break;

    case"class";
        $data = grade::fetch($conn);
        require("template/grade.php");
    break;

    case"assign.class";
        $data = student::assign_batch($conn);
        require("template/batch.php");
    break;

    default;
        require('template/404.php');
      
}

$conn=null;

?>