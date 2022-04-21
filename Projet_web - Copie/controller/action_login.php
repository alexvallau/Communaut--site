<?php

    if(isset($_POST['login']) && isset ($_POST['password']))
    {
        if(isBanned($_POST['login'])){

            header('location:index.php?page=admin&banned');
        }
        elseif(testIfUserNameAlrdyExists($_POST['login']) )
        {
            
            $pwdFromdb = returnPwdFromDb($_POST['login']);
            if(verifyPwdFromDb($_POST['password'], $pwdFromdb) ){

                if(isAdmin($_POST['login'])){
                    $_SESSION['admin'] = $_POST['login'];
                    header('location: index.php?page=home');

                }
                else{

                    $_SESSION['login'] = $_POST['login'];
                    header('location: index.php?page=home');
                }
            }
            else{
                header('location: index.php?page=admin&errorconnexion' );
            }   
        }
        else{
            header('location: index.php?page=admin&errorconnexion' );
        }
        
    }


?>