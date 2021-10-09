<?php

$GLOBALS = config();
$student = student::fetch_active($conn);
$class =  grade::fetch($conn);
$sections = grade::fetch_section($conn);

function config(){

    return array(
        "application"=>"Fees Record",
        "header"=>"Fees Record",
        "copyright"=>"Copyright © Active A&T Corp. &amp; Developed by <a href='http://iquipedigital.com' target='_blank'>iQuipe Digital</a> 2021"
    );
}

function profile_menu($token){

    echo"
    <ul>
        <li>
            <a href='?_admin=user.profile&token={$token}'>
                <i class='ti-user'></i>
                <span>Profile</span>
            </a>
        </li>                
        <li>
            <a href'?_admin=user.profile&token={$token}'>
                <i class='ti-power-off'></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>";
}

function menu($token){

    echo"
    <ul>
        <div class='logo'><a href='#'>
                <!-- <img src='assets/images/logo.png' alt='' /> --><span>Fees Account</span></a></div>
      
        <li><a href='?_admin=dashboard&token={$token}'><i class='ti-desktop'></i>Dashboard</a></li>
        <li><a class='sidebar-sub-toggle'><i class='ti-user'></i> Student <span
                    class='sidebar-collapse-icon ti-angle-down'></span></a>
            <ul>
                <li><a href='?_admin=new.profile&token={$token}'>Add New</a></li>
                <li><a href='?_admin=profile&token={$token}'>Profile</a></li>
                <li><a href='?_admin=ledger&token={$token}'>Ledger</a></li>
                <li><a href='?_admin=archive&token={$token}'>Archive</a></li>
                
            </ul>
        </li>
        <li><a href='?_admin=billing&token={$token}'><i class='ti-stats-up'></i>Billing</a></li>
        <li><a href='?_admin=payment&token={$token}'><i class='ti-stats-down'></i>Payment</a></li>
        <!--li><a href='?_admin=ledger&token={$token}'><i class='ti-agenda'></i>Fees Ledger</a></li-->
        <li><a class='sidebar-sub-toggle'><i class='ti-package'></i> Class <span
                    class='sidebar-collapse-icon ti-angle-down'></span></a>
            <ul>
                <li><a href='?_admin=class&token={$token}'>Class List</a></li>
                <li><a href='?_admin=class.section&token={$token}'>Section</a></li>
                <li><a href='?_admin=assign.class&token={$token}'>Assign Student</a></li>
            </ul>
        </li>
        <li><a href='#' data-toggle='modal' data-target='.ModalPassword'><i class='ti-unlock'></i>user</a></li>
        <li><a class='sidebar-sub-toggle'><i class='ti-heart'></i> Setting <span class='sidebar-collapse-icon ti-angle-down'></span></a>
            <ul>
                <li><a href='?_admin=reset&token={$token}'>Reset</a></li>
                <li><a href='?_admin=backup&token={$token}'>Backup</a></li>
                <li><a href='?_admin=restore&token={$token}'>Restore</a></li>
            </ul>
        </li>
        <li><a href='?_user=user-exit-app'><i class='ti-power-off'></i>Logout</a></li>
       
    </ul>";
}

function combo_student($student){

    foreach($student as $r){
        echo"<option value='{$r['student_id']}'>{$r['student_num']} - {$r['full_name']}</option>";
    }
}

function combo_class($class){

    foreach($class as $r){
        echo"<option value='{$r['grade_id']}'>{$r['grade']}</option>";
    }
}

function combo_section($sections){

    foreach($sections as $r){
        echo"<option value='{$r['session_name']}'>{$r['session_name']}</option>";
    }
}

function msgbox($err){

    switch($err){

        case 100:
            $css ="alert-danger";
            $msg ="<strong class='text-muted'> Action Failed. </strong>";
        break;

        case 105;
            $css ="alert-danger";
            $msg ="<strong class='text-muted'> Delete Failed. </strong>";
        break;

        case 120:
            $css ="alert-danger";
            $msg ="<strong class='text-muted'> Backup Failed. </strong>";
        break;

        case 200:
            $css ="alert-success";
            $msg ="<strong class='text-muted'> Action Successful. </strong>";
        break;    

        case 205:
            $css ="alert-success";
            $msg ="<strong class='text-muted'> Delete Success. </strong>";
        break;

        case 220:
            $css ="alert-success";
            $msg ="<strong class='text-muted'> Backup Success. </strong>";
        break;

        default:
            $css ="alert-primary";
            $msg ="<strong class='text-muted'>Welcome !</strong>";

    }


    return"
        <div class='alert {$css} alert-dismissible fade show'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            {$msg}
        </div>
    ";
}

?>