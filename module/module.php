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

                case"add-bill";
                    $r[] = $_REQUEST['student'];
                    $r[] = $_REQUEST['date'];
                    $r[] = $_REQUEST['ref'];
                    $r[] = $_REQUEST['class'];
                    $r[] = $_REQUEST['term'];
                    $r[] = $_REQUEST['academic-year'];
                    $r[] = "Fees Payment #".$_REQUEST['ref'];
                    $r[] = $_REQUEST['amount'];
                    $response = fees::add_bill($conn,$r);
                break;

                case"add-payment";
                    $r[] = $_REQUEST['student'];
                    $r[] = $_REQUEST['date'];
                    $r[] = $_REQUEST['ref'];
                    $r[] = $_REQUEST['class']; 
                    $r[] = $_REQUEST['term'];
                    $r[] = $_REQUEST['academic-year'];                    
                    $r[] = $_REQUEST['description'];              
                    $r[] = $_REQUEST['payment-type'];
                    $r[] = $_REQUEST['amount'];
                    $response = fees::add_payment($conn,$r);
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