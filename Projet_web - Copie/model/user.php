<?php


function getAllUsersAnoucesRegistration($username)
{
    global $c;
    $sql = " SELECT id_annonce FROM anoucesregistration  WHERE utilisateur='$username' ";
    $result = mysqli_query($c,$sql);
    $announces = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $announces[] = $row;
    }
    return $announces;
}


function getAccouncesName($id){


    global $c;
    $convertedid= intval( $id ); 
    $sql = "SELECT title FROM announce WHERE id = $convertedid";
    $result = mysqli_query($c, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['title'];

}




?>