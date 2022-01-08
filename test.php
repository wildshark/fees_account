<?php

//function is_connected()
//{
//  $connected = fopen("http://www.google.com:80/","r");
//  if($connected)
//  {
//     return true;
//  } else {
//   return false;
//  }
//dfsfsdgdgdgdfgdgdgdgdfgdfgdfgdddddddddddddddg

//echo is_connected();
//userdefined function for checking internet
function check_internet($domain)
{
    $file = @fsockopen ($domain, 80);//@fsockopen is used to connect to a socket
    
    return ($file);
}
 $domain="http://google.com";
var_export(check_internet($domain));
exit;
//test with a website

//verify whether the internet is working or not
if (check_internet($domain))
{
    echo "You are connected to the internet.";
}
else
{
    echo "You seem to be offline. Please check your internet connection."; 
}
?>