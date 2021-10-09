<?php

setcookie("_page",$_REQUEST['_admin'], time()+3600);

switch($_REQUEST['_admin']){

    case"dashboard";
        $student = student::total($conn);
        if($student == false){
            $total ="0";
        }else{
            $total = $student['total'];
        }
        $ledger = fees::summary_ledger($conn);
        if((!isset($ledger))||($ledger == false)){
            $ledger = array(
                "bill"=>"0.00",
                "paid"=>"0.00",
                "bal"=>"0.00"
            );
        }
        $data = fees::fetch_ledger($conn);
        $temp['title'] =" Welcome to AGS";
        require("template/dashboard.php");
    break;

    case"profile";
        $temp['title'] ="Student Profile";
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
        $temp['title'] ="New Profile";
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
        $temp['title'] ="Update Profile ".$fullname;
        require("template/add.profile.php");
    break;

    case"view.profile";
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
        $assign = student::view_assign_batch($conn,$_GET['id']);
        $ledger = fees::fetch_view_ledger($conn,$_GET['id']);
        $temp['title'] ="Profile ".$fullname;
        require("template/view.profile.php");
    break;

    case"archive";
        $data = student::fetch_passive($conn);
        $temp['title'] ="Archive ";
        require("template/profile.list.php");
    break;

    case"ledger";
        $data = fees::fetch_ledger($conn);
        $temp['title'] ="Ledger ";
        require("template/ledger.php");
    break;

    case"ledger.details";
        $summary = fees::student_ledger_sum($conn,$_GET['id']);
        if($summary == false){
            $summary = array(
                "bill"=>0,
                "paid"=>0,
                "bal"=>0
            );
        }
        $data = fees::fetch_view_ledger($conn,$_GET['id']);
        $temp['title'] ="Ledger";
        require("template/ledger.details.php");
    break;

    case"billing";
        $data = fees::fetch_bill($conn);  
        $temp['title'] ="Billing";
        require("template/billing.php");
    break;

    case"payment";
        $data = fees::fetch_payment($conn);
        $temp['title'] ="Payment";
        require("template/payment.php");
    break;

    case"class";
        $data = grade::fetch($conn);
        $temp['title'] ="Grade";
        require("template/grade.php");
    break;

    case"class.section";
        $data = grade::fetch_section($conn);
        $temp['title'] ="Section";
        require("template/section.php");
    break;

    case"assign.class";
        $data = student::assign_batch($conn);
        $temp['title'] ="Assign Student to Class ";
        require("template/batch.php");
    break;

    case"reset";
        $response = student::reset_student($conn);
        $response = student::reset_assign_batch($conn);
        $response = grade::reset_class($conn);
        $response = grade::reset_section($conn);
        $response = fees::reset_ledger($conn);
        header("location: ?_reset=reset-application");
        exit();
    break;

    case"backup";
        $backup = array(
            "student"=>student::backup_student($conn),
            "section"=>student::backup_batch($conn),
            "ledger"=>fees::fetch_ledger($conn),
            "grade"=>grade::fetch($conn),

        );
        $data=json_encode($backup);
        $data = base64_encode(gzcompress($data,9));
        $zcompress = array(
            "time"=> date('d-m-Y H:i:s'),
            "data"=>$data
        );
        file_put_contents("backup.json",json_encode($zcompress));
    break;

    case"restore";
        $dat = json_decode(file_get_contents("backup.json"),TRUE);
        $data = gzuncompress(base64_decode($dat['data']));
        $data = json_decode($data, TRUE);
        $student = $data["student"];
        $section = $data["section"];
        $ledger = $data["ledger"];
        $grade = $data["grade"];

        $response = student::restore_student($conn,$student);
        $response = grade::restore_grade($conn,$grade);
        $response = student::restore_section($conn,$section);
            
      /// var_dump($data);
        //    exit;
    break;

    default;
        require('template/404.php');
      
}

$conn=null;

?>