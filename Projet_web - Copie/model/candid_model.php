<?php

    function a_vote($idcand,$adname){
        global $c;
        $sql = "INSERT INTO chcand (idcand,adname) VALUES($idcand,'$adname')";
        mysqli_query($c,$sql);
    }    


    function insert_candid($candimail, $candiname)
    {
        global $c;
        $sql = "INSERT INTO candidature (candmail, candiname, accepted, nbvote, finalresult) VALUES ('$candimail','$candiname', 0, 0, 0)";
        mysqli_query($c, $sql);
    }

    function delete_candid($id){
        global $c;
        $sql = "DELETE FROM candidature WHERE id = '$id'";
        mysqli_query($c, $sql);
    }



    function get_all_candid(){
        global $c;
        $sql = ' SELECT * FROM candidature';
        $result = mysqli_query($c,$sql);
        $candidatures = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $candidatures[] = $row;
        }
        return $candidatures;
    }


    //vérifie si un mail n'a pas déjà envoyé sa candidature
    function verifyMailAldreadyExists($mail){
        global $c;
        $verifad = "SELECT id FROM candidature where candmail='$mail'";
        $result = mysqli_query($c,$verifad);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function getMailFromID($id){
        global $c;
        $verifad = "SELECT candmail FROM candidature where id='$id'";
        $result = mysqli_query($c,$verifad);
        $row = mysqli_fetch_assoc($result);
        return $row['candmail'];
    }

    //récupère le nom de la candidature en fonction de l'id de la canddi
    function getFileName($id){
        global $c;
        $verifad = "SELECT candiname FROM candidature where id=$id";
        $result = mysqli_query($c,$verifad);
        $row = mysqli_fetch_assoc($result);
        return $row['candiname'];
    }

//récupère combien de vote ont été effectués pour cette candidature
    function get_vote_statement($id){
        global $c;
        $sql = "SELECT accepted, nbvote FROM candidature WHERE id = $id";
        $result =mysqli_query($c, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function verif_ad_cand($candid,$adminname){
        global $c;
        $verifad = "SELECT id from chcand where adname='$adminname' and idcand=$candid";
        $result = mysqli_query($c,$verifad);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
// met à jour le nombre de vote quand un admin émet un vote
    function  candid_vote($id, $vote){
        global $c;
        $voteStatement =get_vote_statement($id);
        $accepted = $voteStatement['accepted'];
        $nbvote = $voteStatement['nbvote'];
            if($nbvote == getNumberOfVotes() ){
                if($accepted >= getMajority()){
                    $mail = getMailFromID($id);
                    $sql = "UPDATE candidature SET finalresult = 1 WHERE candidature . id=$id";
                    $keye = getKey();
                    insertKeyInDB($keye,$id);
                    mysqli_query($c, $sql);
                    send_test_mail($keye,$mail);
                    delete_candid($id);
                }
            }
            elseif($vote == 1){
                $nbvote++;
                $accepted++;
                $sql = "UPDATE candidature SET accepted = $accepted, nbvote = $nbvote WHERE candidature . id=$id";
                mysqli_query($c, $sql);
            }
            else{
                $nbvote++;
                $sql = "UPDATE candidature SET accepted = $accepted, nbvote = $nbvote WHERE candidature . id=$id";
                mysqli_query($c, $sql);
            }
    }

    function get_nb_ad(){
        global $c;
        $sql = "SELECT COUNT('*') from admin";
        $result = mysqli_query($c,$sql);
        $row = mysqli_fetch_assoc($result);
        return($row);
    }

?>