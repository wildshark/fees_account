<?php
setcookie("_page",$_REQUEST['_admin'], time()+3600);
switch($_REQUEST['_admin']){

    case"search";
       $res = membership::global_search($conn,$_GET['search']);
       require('template/admin/membership.php');
    break;

    case"dashboard";
        $total = ledger::summary_ledger($conn);
        if($total == false){
            $total = array(
                "r_amt"=>0.00,
                "g_amt"=>0.00,
                "o_amt"=>0.00,
                "b_amt"=>0.00,
            );
        }
        $res = ledger::fetch_transaction($conn);
        require('template/admin/dashboard.php');
    break;

    case"groups";
        $res = group::fetch_all($conn);
        require('template/admin/groups.php');
    break;

    case"add.member";
        $account = strtoupper(uniqid());
        $group="";
        $group_id="";
        $fname ="";
        $mname ="";
        $surname ="";
        $dob ="";
        $nationality ="";
        $type ="";
        $id_num ="";
        $email ="";
        $mobile1="";
        $mobile2="";
        $occupation ="";
        $address1 ="";
        $address2 ="";
        $nok="";
        $relationship="";
        $nok_mobile="";
        $nok_address ="";
        $status ="";
        $btn["value"] ="add-new-member";
        $btn["label"] ="Save";
        require('template/admin/add.membership.php');
    break;

    case"update.member";
        $res = membership::view($conn,$_GET['member']);
        $_SESSION['member_id'] = $res['member_id'];
        $account = $res['account'];
        $status = $res['status'];
        $group = $res['group_name'];
        $group_id = $res['group_id'];
        $fname = $res['fname'];
        $mname = $res['mname'];
        $surname = $res['lname'];
        $dob = $res['dob'];
        $nationality = $res['nationality'];
        $type = $res['id_card_type'];
        $id_num = $res['id_num'];
        $email = $res['email'];
        $mobile1 = $res['mobile1'];
        $mobile2 = $res['mobile2'];
        $occupation = $res['occupation'];
        $address1 = $res['address1'];
        $address2 = $res['address2'];
        $nok = $res['nok'];
        $relationship = $res['relationship'];
        $nok_mobile = $res['nok_mobile'];
        $nok_address = $res['nok_address'];
        $btn["value"] ="update-member";
        $btn["label"] ="Save";
        require('template/admin/add.membership.php');
    break;

    case"member.profile.details";
        $profile = membership::view($conn,$_GET['member']);
        $transaction = membership::fetch_individual_transaction($conn,$profile['account']);
        if($transaction['dues_summary'] == false){
            $dues_summary = array(
                "total"=>0
            );
        }else{
            $dues_summary = $transaction['dues_summary'];
        }

        if($transaction['loan_summary'] == false){
            $loan_summary = array(
                "loan"=>0,
                "paid"=>0,
                "bal"=>0
            );
        }else{
            $loan_summary =$transaction['loan_summary']; 
        }

        require('template/admin/membership.profile.php');
    break;

    case"membership";
        $res = membership::fetch_all($conn);
        require('template/admin/membership.php');
    break;

    case"dues";
        $res = dues::fetch_all($conn);
        require('template/admin/dues.php');
    break;

    case"grant";
        $res = ledger::grant_fetch_all($conn);
        require('template/admin/grant.php');
    break;

    case"pay.groups";
        $res = ledger::pay_groups_fetch_all($conn);
        require('template/admin/paygroups.php');
    break;

    case"payout";
        $res = ledger::payout_fetch_all($conn);
        require('template/admin/payout.php');
    break;

    case"payback";
        $res = ledger::payback_fetch_all($conn);
        require('template/admin/payback.php');
    break;

    case"grants.ledger";
        $summary = ledger::grant_ledger_summary($conn);
        if($summary == false){
            $summary = array(
                "total"=>0,
                "dr"=>0.00,
                "cr"=>0.00,
                "bal"=>0.00,
            );
        }
        $res = ledger::grant_ledger_details($conn);
        require('template/admin/grant.ledger.php');
    break;

    case"groups.ledger";
        $summary = ledger::group_ledger_summary($conn);
        if($summary == false){
            $summary = array(
                "total"=>0,
                "dr"=>0.00,
                "cr"=>0.00,
                "bal"=>0.00,
            );
        }
        $res = ledger::group_ledger_details($conn);
        require('template/admin/groups.ledger.php');
    break;

    case"member.ledger";
        $summary = ledger::fetch_member_ledger_total($conn);
        if($summary == false){
            $summary = array(
                "total"=>0,
                "loan"=>0,
                "paid"=>0,
                "bal"=>0
            );
        }
        $res = ledger::fetch_member_ledger_summary($conn);
        require('template/admin/member.ledger.php');
    break;

    default;
        require('template/404.php');
      
}

$conn=null;

?>