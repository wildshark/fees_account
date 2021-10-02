<?php

$GLOBALS = config();
$membership = membership::fetch_all($conn);
$groups = group::fetch_all($conn);

function config(){

    return array(
        "application"=>"",
        "header"=>"Funds Book",
        "copyright"=>"Copyright © Charter Trust Enterprise &amp; Developed by <a href='#' target='_blank'>iQuipe Digital</a> 2021"
    );
}

function menu($token){

    echo"
        <ul class='metismenu' id='menu'>
                    <li class='nav-label first text-warning'>Main Menu</li>
                    <li><a href='?_admin=dashboard&token={$token}' aria-expanded='false'><i class='icon icon-globe-2'></i><span class='nav-text'>Dashboard</span></a></li>
                    <li><a class='has-arrow' href='javascript:void()' aria-expanded='false'><i
                    class='icon icon-chart-bar-33'></i><span class='nav-text'>Profile</span></a>
                        <ul aria-expanded='false'>
                            <li><a href='?_admin=groups&token={$token}'>Groups</a></li>
                            <li><a href='?_admin=add.member&token={$token}'>Add Member</a></li>
                            <li><a href='?_admin=membership&token={$token}'>Membership</a></li>
                        </ul>
                    </li>
                    <li class='nav-label text-warning'>Transaction Books</li>
                   
                    <li><a class='has-arrow' href='javascript:void()' aria-expanded='false'><i
                                class='icon icon-chart-bar-33'></i><span class='nav-text'>Account Book</span></a>
                        <ul aria-expanded='false'>
                            <li><a href='?_admin=dues&token={$token}'>Monthly Dues</a></li>
                            <li><a href='?_admin=grant&token={$token}'>Grant(s)</a></li>
                            <li><a href='?_admin=pay.groups&token={$token}'>Pay Groups</a></li>
                            <li><a href='?_admin=payout&token={$token}'>Pay Member</a></li>
                            <li><a href='?_admin=payback&token={$token}'>Member Pay back</a></li>
                        </ul>
                    </li>
                    <li><a class='has-arrow' href='javascript:void()' aria-expanded='false'><i
                                class='icon icon-chart-bar-33'></i><span class='nav-text'>Transaction Ledger</span></a>
                        <ul aria-expanded='false'>
                            <li><a href='?_admin=grants.ledger&token={$token}'>Grant(s) Ledger</a></li>
                            <li><a href='?_admin=groups.ledger&token={$token}'>Group(s) Ledger</a></li>
                            <li><a href='?_admin=member.ledger&token={$token}'>Member's Ledger</a></li>
                        </ul>
                    </li>
                   
                    <!--li><a class='has-arrow' href='javascript:void()' aria-expanded='false'><i
                                class='icon icon-single-copy-06'></i><span class='nav-text'>Pages</span></a>
                        <ul aria-expanded='false'>
                            <li><a href='./page-register.html'>Register</a></li>
                            <li><a href='./page-login.html'>Login</a></li>
                            <li><a class='has-arrow' href='javascript:void()' aria-expanded='false'>Error</a>
                                <ul aria-expanded='false'>
                                    <li><a href='./page-error-400.html'>Error 400</a></li>
                                    <li><a href='./page-error-403.html'>Error 403</a></li>
                                    <li><a href='./page-error-404.html'>Error 404</a></li>
                                    <li><a href='./page-error-500.html'>Error 500</a></li>
                                    <li><a href='./page-error-503.html'>Error 503</a></li>
                                </ul>
                            </li>
                            <li><a href='./page-lock-screen.html'>Lock Screen</a></li>
                        </ul>
                    </li>
                </ul-->
    ";
}

function msgbox(){
    
}

function combo_client($membership){

    foreach($membership as $r){
        echo"<option value='{$r[group_id]}-{$r['member_id']}'>{$r['fname']} {$r['mname']} {$r['lname']} - {$r['group_id']}</option>";
    }
    
}

function combo_groups($groups){

    foreach($groups as $r){
        echo"<option value='{$r['group_id']}'>{$r['group_name']}</option>";
    }
    
}

function combo_month(){

    $month = ["Jan","Feb",];
    foreach($month as $r){
        echo"<option value='{$r}'>{$r}</option>";
    }
}

?>