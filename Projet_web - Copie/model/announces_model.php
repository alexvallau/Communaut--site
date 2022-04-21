<?php


//vérifie si un utilisateur s'est dék) inscrit avec une annonce
function isUserAnnRegistered($idanounce, $username){
    global $c;
    $verifad = "SELECT id from anoucesregistration where id_annonce=$idanounce and utilisateur='$username'";
    $result = mysqli_query($c,$verifad);
    $row = mysqli_fetch_assoc($result);
    return $row;
}



//ajoute un utilisateur et l'id dune annonce dans la table anouncesregistration
function addUserToAnnounces($idannounce, $username){
    global $c;
    $sql = "INSERT INTO anoucesregistration (id_annonce,utilisateur) VALUES($idannounce,'$username')";
    mysqli_query($c,$sql);
}


// retourne le nombre de places disponibles pour une annonce
function countOccurencesOfperson($announceid){

    global $c;
    $totalPlace = "SELECT nbplace FROM announce WHERE id=$announceid";
    $exec = mysqli_query($c, $totalPlace);
    $nbtotal = mysqli_fetch_assoc($exec);
    $nbtotalofplace = $nbtotal['nbplace'];


    $nbOfOccurences = "SELECT COUNT(*) as testiravat FROM anoucesregistration WHERE id_annonce = $announceid";
    $result = mysqli_query($c, $nbOfOccurences);
    $row = mysqli_fetch_assoc($result);
    return $nbtotalofplace-$row['testiravat'];
}


function deleteRegistrationFromAnnounce($idannounce, $username){
    global $c;
    $sql = "DELETE FROM anoucesregistration WHERE id_annonce = $idannounce AND utilisateur = '$username'";
    mysqli_query($c, $sql);
}



function getRightImages($categorie){

    $array = array("sport"=>"sport.jpg", "culture"=>"culture.jpg", "education"=>"education.jpg", "autre"=>"autre.jpg",);
    return $array[$categorie];
}













?>