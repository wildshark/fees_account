<?php

if(!isset($_SESSION['time'])){
    header("location :?_user=login");
}else{
    if($_REQUEST['_submit'] === "log-in"){
        $r[] = $_REQUEST['username'];
           $r[] = $_REQUEST['password'];
           $response = user_account::login($conn,$r);
           if($response === false){
                $url["_user"] = "lgoin";    
           }else{
               if(!isset($_SESSION['username'])){
                   $_SESSION = $response;
               }
                $token = md5($response['username'].$response['role']);
                $_SESSION['token'] = $token;
                if($response['role'] === "admin"){
                    $url['_admin'] = "dashboard";
                    $url['token'] = $token;
                }else{
                    $url['_client'] = "dashboard";
                    $url['token'] = $token;
                } 
                
                header("location: ?".http_build_query($url));
           }
        exit();
    }else{
        if(!isset($_SESSION['token'])){
            header("location :?_user=login");
        }else{

            switch($_REQUEST['_submit']){

                case"create-account";
                    $sql="INSERT INTO `user_account`(`username`, `password`, `email`, `mobile`, `role`, `group`) VALUES (?,?,?,?,?,?)";
                break;
        
                case"add-group";
                    $r[] = $_REQUEST['group'];
                    $r[] = $_REQUEST['leader'];
                    $r[] = $_REQUEST['address'];
                    $r[] = $_REQUEST['mobile'];
                    $r[] = "Enable";
                    $response = group::add($conn,$r);
                break;
        
                case"add-new-member";
                    $r[] = $_REQUEST['account-id'];
                    $r[] = $_REQUEST['group'];
                    $r[] = $_REQUEST['fname'];
                    $r[] = $_REQUEST['mname'];
                    $r[] = $_REQUEST['surname'];
                    $r[] = $_REQUEST['dob'];
                    $r[] = $_REQUEST['nationality'];
                    $r[] = $_REQUEST['type'];
                    $r[] = $_REQUEST['id-num'];
                    $r[] = $_REQUEST['email'];
                    $r[] = $_REQUEST['mobile1'];
                    $r[] = $_REQUEST['mobile2'];
                    $r[] = $_REQUEST['occupation'];
                    $r[] = $_REQUEST['address1'];
                    $r[] = $_REQUEST['address2'];
                    $r[] = $_REQUEST['nok'];
                    $r[] = $_REQUEST['relationship'];
                    $r[] = $_REQUEST['nok-mobile'];
                    $r[] = $_REQUEST['nok-address'];
                    $r[] = "Enable";
                    $response = membership::add($conn,$r);
                break;
        
                case"update-member";
                    $r[] = $_REQUEST['account-id'];
                    $r[] = $_REQUEST['group'];
                    $r[] = $_REQUEST['fname'];
                    $r[] = $_REQUEST['mname'];
                    $r[] = $_REQUEST['surname'];
                    $r[] = $_REQUEST['dob'];
                    $r[] = $_REQUEST['nationality'];
                    $r[] = $_REQUEST['type'];
                    $r[] = $_REQUEST['id-num'];
                    $r[] = $_REQUEST['email'];
                    $r[] = $_REQUEST['mobile1'];
                    $r[] = $_REQUEST['mobile2'];
                    $r[] = $_REQUEST['occupation'];
                    $r[] = $_REQUEST['address1'];
                    $r[] = $_REQUEST['address2'];
                    $r[] = $_REQUEST['nok'];
                    $r[] = $_REQUEST['relationship'];
                    $r[] = $_REQUEST['nok-mobile'];
                    $r[] = $_REQUEST['nok-address'];
                    $r[] = "Enable";
                    $r[] = $_SESSION['member_id'];
                    $response = membership::update($conn,$r);
                break;
        
                case"add-grant";
                   $r[] = 1;
                   $r[] = $_REQUEST['date'];
                   $r[] = $_REQUEST['details'];
                   $r[] = $_REQUEST['ref'];
                   $r[] = $_REQUEST['type'];
                   $r[] = $_REQUEST['amt'];
                   $r[] = 1;
                   $response = ledger::add_grant($conn,$r);
                break;
        
                case"add-pay-groups";
            
                    $group = group::search_id_group($conn,$_REQUEST['group']);
                    $r[] = $_REQUEST['group'];
                    $r[] = $_REQUEST['date'];            
                    $r[] = "Paid {$group['group_name']} ##{$group['group_leader']}";
                    $r[] = $_REQUEST['ref'];
                    $r[] = $_REQUEST['type'];
                    $r[] = $_REQUEST['amt'];
                    $r[] = 2;
                    $response = ledger::add_pay_group($conn,$r);
                break;
        
                case"add-payout";
                   $q = explode("-",$_REQUEST['client']);
                   $group_id = $q[0];
                   $member_id = $q[1];
                   $member = membership::search_id_member($conn,$member_id);
                    $r[] = $group_id;
                    $r[] = $_REQUEST['date'];
                    $r[] = "Paid {$member['fname']} {$member['mname']} {$member['lname']} - ID {$member['id_num']}";
                    $r[] = $_REQUEST['ref'];
                    $r[] = $_REQUEST['type'];
                    $r[] = $_REQUEST['amt'];
                    $r[] = 3;
                    
                    if(false == ledger::add_pay_out($conn,$r)){
                        $response =false;
                    }else{  
                        $l[] = $member_id;
                        $l[] = time();
                        $l[] = $_REQUEST['date'];
                        $l[] = "Paid {$member['fname']} {$member['mname']} {$member['lname']} - ID {$member['id_num']}";
                        $l[] = $_REQUEST['ref'];
                        $l[] = $_REQUEST['amt'];
                        $response =  membership::add_new_loan($conn,$l);
                    }
                   
                break;
        
                case"add-payback";
                    $q = explode("-",$_REQUEST['client']);
                    $group_id = $q[0];
                    $member_id = $q[1];
                    $member = membership::search_id_member($conn,$member_id);
                    $r[] = $group_id;
                    $r[] = $_REQUEST['date'];            
                    $r[] = "Collect Cash Back #{$member['fname']} {$member['mname']} {$member['lname']} - ID #{$member['id_num']}";
                    $r[] = $_REQUEST['ref'];
                    $r[] = $_REQUEST['type'];
                    $r[] = $_REQUEST['amt'];
                    $r[] = 4;
                    if(false == ledger::add_pay_back($conn,$r)){
                        $response = false;
                    }else{
                        $l[] = $member_id;
                        $l[] = time();
                        $l[] = $_REQUEST['date'];
                        $l[] = "Paid {$member['fname']} {$member['mname']} {$member['lname']} - ID {$member['id_num']}";
                        $l[] = $_REQUEST['ref'];
                        $l[] = $_REQUEST['amt'];
                        $response =  membership::add_pay_loan($conn,$l);
                    }
                break;
        
                case"add-monthl-dues";
                    $q = explode("-",$_REQUEST['client']);
                    $group_id = $q[0];
                    $member_id = $q[1];
        
                    $r[] = $group_id;
                    $r[] = $member_id;
                    $r[] = date("Y-m-d H:i:s");
                    $r[] = $_REQUEST['date'];
                    $r[] = $_REQUEST['month'];
                    $r[] = $_REQUEST['year'];
                    $r[] = $_REQUEST['type'];
                    $r[] = $_REQUEST['ref'];
                    $r[] = $_REQUEST['amt'];
                    $response  = dues::add($conn,$r);
                break;

                case"search";

                break;
        
                case"delete";
                   if($_REQUEST['action'] === "group"){
                       $response = group::delete($conn,$_GET['id']);
                   }elseif($_REQUEST['action'] === "member"){
                        $response = membership::delete($conn,$_GET['id']);
                   }elseif($_REQUEST['action'] === "ledger"){
                        $response = ledger::delete($conn,$_GET['id']);
                        membership::delete_loan($conn,$_GET['ref']);
                   }
                break;
            }

            $conn = null;
            $page = $_COOKIE['_page'];
            if($response === false){
                $url['_admin'] = $_COOKIE['_page'];
                $url['token'] = $_SESSION['token'];
                $url['err'] = 100;
            }else{
                $url['_admin'] = $page;
                $url['token'] = $_SESSION['token'];
                $url['err'] = 200;
            }
        }
    }
}
?>