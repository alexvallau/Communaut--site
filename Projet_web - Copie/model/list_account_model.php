<?php
    function get_all_account()
    {
    global $c;
    $sql = 'SELECT id,accName FROM account';
    $result = mysqli_query($c,$sql);
    $announces = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $announces[] = $row;
    }
    return $announces;
    }
    
    function get_all_banned_account()
    {
    global $c;
    $sql = 'SELECT id,accName FROM ban_user';
    $result = mysqli_query($c,$sql);
    $announces = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $announces[] = $row;
    }
    return $announces;
    }

    function isBanned($accName){
        global $c;
        $sql = "SELECT * FROM ban_user WHERE accName='$accName'" ;
        $result = mysqli_query($c,$sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function ban_user($id_accName,$accName)
    {
        global $c;
        $sql = "INSERT INTO ban_user (id_accName, accName) VALUES ('$id_accName','$accName')";
        mysqli_query($c, $sql);
    }

    function unban_user($accName)
    {
        global $c;
        $sql = "DELETE FROM ban_user WHERE accName = '$accName'";
        mysqli_query($c, $sql);
    }
?>