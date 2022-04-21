<?php


//Test si la  clé est dans le formulaire
    if(isset($_POST['key']))
    {
        //vérifie si  la clé existe dans la table
        if(verifKey($_POST['key']))
        {
            //vérifie que les champs soient bien entrés
            if(isset($_POST['accName']) && isset($_POST['pwd']) &&isset($_POST['pwd2']) && isset($_POST['mail']))
            {
                session_start();
                $_SESSION['key'] = $_POST['key'];
                $_SESSION['accName'] = $_POST['accName'];
                $_SESSION['pwd'] = $_POST['pwd'];
                $_SESSION['mail'] = $_POST['mail'];
                if($_POST['pwd'] == $_POST['pwd2'] ){
                //récupère tout dans une session si erreur
               
                //$_SESSION['address'] = $_POST['address'];
                //test si l'utilisteur n'existe pas déjç
                if(testIfUserNameAlrdyExists($_POST['accName'])){
                    header('location: index.php?page=inscription&errorname');
                }
                //test si l'email n'est pas déjà utilisée
                elseif(testIfEmailAlrdyExists($_POST['mail'])){
                    header('location:  index.php?page=inscription&errormail=falsekey');
                }
                //insert dans la bdd, supprime la clé, supprime la session au cas ou erreur
                else{
                    insert_account($_POST['accName'],$_POST['pwd'],$_POST['mail'],"test");
                    deleteKeyFromDB($_POST['key']);
                    unset($_SESSION['key']);
                    unset($_SESSION['accName']);
                    unset($_SESSION['pwd']);
                    unset($_SESSION['mail']);
                    //unset($_SESSION['address']);
                    session_destroy();
                    
                    header('location: ./index.php ');
                }
            }
            else{header('location: index.php?page=inscription&wrongpass');}		
            }
        }
    else
        {
            header('location: index.php?page=inscription&errorcle');
        }
    }


    ?>