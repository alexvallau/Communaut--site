<?php 

    /********************************* PROJET*/


    function get_all_announce()
    {
    global $c;
    $sql = ' SELECT * FROM announce ORDER BY id DESC';
    $result = mysqli_query($c,$sql);
    $announces = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $announces[] = $row;
    }
    return $announces;
    }


    function insert_announce($accName, $title, $description,$longi,$lat,$nbplace,$remainplace,$price,$categorie,$phone)
    {
        global $c;
        $escape_accName = mysqli_real_escape_string($c, $accName);
        $escape_title = mysqli_real_escape_string($c, $title);
        $escape_description = mysqli_real_escape_string($c, $description);
        $sql = "INSERT INTO announce (accName, title, description, longi, lat, nbplace, remainplace, price, categorie,telephone) VALUES ('$escape_accName','$escape_title','$escape_description','$longi','$lat','$nbplace','$remainplace','$price','$categorie', '$phone')";
        mysqli_query($c, $sql);
    }

    function delete_announce($id)
    {
        global $c;
        $sql = "DELETE FROM announce WHERE id=$id";
        mysqli_query($c, $sql);
    }

    function filtre_announce($categorie)
    {
    global $c;
    $sql = "SELECT * FROM announce WHERE categorie='$categorie' ORDER BY id DESC";
    $result = mysqli_query($c,$sql);
    $filtres = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $filtres[] = $row;
    }
    return $filtres;
    }

    function getOneAnnounce($id){
        global $c;
        $sql = "SELECT accName, title, description, price, telephone FROM announce WHERE id = $id";
        $result = mysqli_query($c,$sql);
        $row =  mysqli_fetch_assoc($result);
        return $row;
    }


  
?>
