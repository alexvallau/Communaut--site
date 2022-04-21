<?php



function getKey(){
    return rand(0,100000000);
}

//insère une clé dans la table qui accueil les clés
function insertKeyInDB($key, $candidId){
    global $c;
    $sql = "INSERT INTO cle (agKey, candidid) VALUES ('$key', '$candidId')";
    mysqli_query($c, $sql);
}

function deleteKeyFromDB($key){
    global $c;
    $sql = "DELETE FROM cle WHERE agKey=$key";
    mysqli_query($c, $sql);
}

function selectFromCle(){
    global $c;
    $sql = ' SELECT * FROM cle';// requête SQL
    $result = mysqli_query($c,$sql);
    $jokes = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $jokes[] = $row;
    }
    return $jokes;
}

function verifKey($key){
    global $c;
    $sql = "SELECT * FROM cle where agKey=$key";// requête SQL
    $result = mysqli_query($c,$sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $keys[] = $row;
    }
    return $keys;
}


?>