<?php


function insert_account($accName, $pwd, $mail, $address)
{
    global $c;
    $escape_accName = mysqli_real_escape_string($c, $accName);
    $crypted_pwd = pwdCrypt($pwd);
    $escape_address = mysqli_real_escape_string($c, $address);
    $sql = "INSERT INTO account (accName, pwd, mail, address) VALUES ('$accName','$crypted_pwd','$mail','$escape_address')";
    mysqli_query($c, $sql);
}



function insert_admin($admail){
    global $c;
    //$crypted_pwd = pwdCrypt($adpwd);
    $sql = "INSERT INTO admin (admail) VALUES ('$admail')";
    mysqli_query($c,$sql);
}

function isAdmin($adminacc){
    global $c;
    $sql = "SELECT id FROM admin WHERE admail = '$adminacc' ";
$result = mysqli_query($c, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}



//test la présence d'un nom de compte
function testIfUserNameAlrdyExists($userName){
    global $c;
    $sql="SELECT id FROM account WHERE accName = '$userName'";
    $result = mysqli_query($c, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

//test la présence d'un mail
function testIfEmailAlrdyExists($mail){
    global $c;
    $sql="SELECT id FROM account WHERE mail = '$mail'";
    $result = mysqli_query($c, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function returnPwdFromDb($username){

    global $c;
    $sql = "SELECT pwd FROM account WHERE accName = '$username'";
    $result = mysqli_query($c, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['pwd'];

}
?>