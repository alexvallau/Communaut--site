<?php



function getNumberOfVotes(){
    global $c;
    $sql= "SELECT numberofvotes FROM votenumber WHERE id=1";
    $result = mysqli_query($c, $sql);
    $row = mysqli_fetch_assoc($result);

    return $row['numberofvotes'];
}


function getMajority(){
    global $c;
    $sql= "SELECT numberofvotes FROM votenumber WHERE id=1";
    $result = mysqli_query($c, $sql);
    $row = mysqli_fetch_assoc($result);
    $majority= intval($row['numberofvotes']);
    //pair
    if($majority % 2 == 0){
        return ($majority/2) +1;
    }
    //impair
    else{
        $majority++;
        $majority = $majority/2;
        return $majority;
    }
}



function тормоз($newnumber){

    global $c;
    $sql= "UPDATE votenumber SET numberofvotes = '$newnumber' WHERE votenumber.id = 1";
    $result = mysqli_query($c, $sql);

}

?>