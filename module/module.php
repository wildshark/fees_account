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
                    $r[] = "Bill";
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
        
                case"add-new-profile";
                    $oldpath = $_FILES['photo']['tmp_name'];
                    $newpath ="photo/".$_FILES['photo']['name'];

                    $r[] = $_REQUEST['student-num'];
                    $r[] = $_REQUEST['full-name'];
                    $r[] = $_REQUEST['gender'];
                    $r[] = $_REQUEST['dob'];                    
                    $r[] = $_REQUEST['nationality'];
                    $r[] = $_REQUEST['address'];
                    $r[] = $_REQUEST['gname'];
                    $r[] = $_REQUEST['gmobile'];
                    $r[] = $newpath;
                    $r[] = $_REQUEST['status'];
                    $response = student::add($conn,$r);                    
                    move_uploaded_file($oldpath, $newpath);
                break;
        
                case"update-profile";
                    $r[] = $_REQUEST['student-num'];
                    $r[] = $_REQUEST['full-name'];
                    $r[] = $_REQUEST['gender'];
                    $r[] = $_REQUEST['dob'];                    
                    $r[] = $_REQUEST['nationality'];
                    $r[] = $_REQUEST['address'];
                    $r[] = $_REQUEST['gname'];
                    $r[] = $_REQUEST['gmobile'];
                    $r[] = $_REQUEST['photo'];
                    $r[] = $_REQUEST['status'];
                    $r[] = $_SESSION['sudent_id'];
                    if(false == student::update($conn,$r)){
                        $response = false;
                    }else{
                       $response = $_SESSION['sudent_id'];
                    }                
                break;

                case"add-grade";
                    $r[] = $_REQUEST['grade'];
                    $response = grade::add($conn,$r);     
                break;

                case"add-batch";
                    $r[] = $_REQUEST['student'];
                    $r[] = $_REQUEST['class'];
                    $r[] = $_REQUEST['class-section'];
                    $r[] = $_REQUEST['academic-year'];
                    $r[] = $_REQUEST['date'];
                    $r[] = $_REQUEST['term'];
                    $r[] = $_REQUEST['amount'];
                    $response = student::add_assign_batch($conn,$r);
                break;

                case"delete";
                   if($_REQUEST['action'] === "student"){
                       $response = student::delete($conn,$_GET['id']);
                       //$response = fees::delete($conn,$_GET['id']);
                   }elseif($_REQUEST['action'] === "ledger"){
                        $response = fees::delete($conn,$_GET['id']);
                   }elseif($_REQUEST['action'] === "grade"){
                        $response = grade::delete($conn,$_GET['id']);
                   }elseif($_REQUEST['action'] === "batch"){
                        $response = student:: delete_assign_batch($conn,$_GET['id']);
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
                $url['id'] = $response;
                $url['err'] = 200;
            }
        }
    }
}
?>