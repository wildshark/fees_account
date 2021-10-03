<?php

include("control/db.php");
include("module/user.account.php");
include("module/student.php");
include("module/fee.php");
include("module/grade.php");
include("control/global.php");

if(!isset($_REQUEST['_submit'])){
    if(!isset($_REQUEST['_client'])){
        if(!isset($_REQUEST['_admin'])){
            session_destroy();
            require("template/login.php");
        }else{
            //admin
            include("module/admin.php");
        }
    }else{
        //client
    }
}else{
    include("module/module.php");
    header("location: ?".http_build_query($url));
}

?>