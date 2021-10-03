<?php

$GLOBALS = config();
$student = student::fetch_active($conn);
$class =  grade::fetch($conn);

function config(){

    return array(
        "application"=>"",
        "header"=>"Funds Book",
        "copyright"=>"Copyright © Charter Trust Enterprise &amp; Developed by <a href='#' target='_blank'>iQuipe Digital</a> 2021"
    );
}


function menu($token){

    echo"
    <ul>
        <div class='logo'><a href='index.html'>
                <!-- <img src='assets/images/logo.png' alt='' /> --><span>Fees Account</span></a></div>
      
        
        <li><a class='sidebar-sub-toggle'><i class='ti-panel'></i> Student <span
                    class='sidebar-collapse-icon ti-angle-down'></span></a>
            <ul>
                <li><a href='uc-calendar.html'>Add New</a></li>
                <li><a href='?_admin=profile&token={$token}'>Profile</a></li>
                <li><a href='?_admin=ledger&token={$token}'>Ledger</a></li>
                <li><a href='?_admin=archive&token={$token}'>Archive</a></li>
                
            </ul>
        </li>
        <li><a href='?_admin=billing&token={$token}'><i class='ti-close'></i>Billing</a></li>
        <li><a href='?_admin=payment&token={$token}'><i class='ti-close'></i>Payment</a></li>
        <li><a><i class='ti-close'></i>Fees Ledger</a></li>
        <li><a class='sidebar-sub-toggle'><i class='ti-layout-grid4-alt'></i> Class Setup <span
                    class='sidebar-collapse-icon ti-angle-down'></span></a>
            <ul>
                <li><a href='?_admin=class&token={$token}'>Class List</a></li>
                <li><a href='?_admin=assign.class&token={$token}'>Assign Student</a></li>
            </ul>
        </li>
        <li><a class='sidebar-sub-toggle'><i class='ti-heart'></i> Icons <span
                    class='sidebar-collapse-icon ti-angle-down'></span></a>
            <ul>
                <li><a href='font-themify.html'>Themify</a></li>
            </ul>
        </li>
    </ul>";
}

function msgbox(){
    
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

?>