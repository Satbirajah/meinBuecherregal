<?php
/**
 * Created by PhpStorm.
 * User: bburki
 * Date: 17.04.2018
 * Time: 13:45
 */

class LoginController
{



    //noch realisieren VIEW
    public function create()
    {
        $view = new View();

    }

    public function doCreate(){
        if($_POST ['send']){

            $nickname = $_POST['nickname'];
            $email = $_POST['email'];
            $passwort = $_POST['passwort'];

            $loginRepository = new LoginRepository();
            $loginRepository ->create ($nickname,$email,$passwort);
        }

    }

    //Login des Users
    public function login(){

        if($_POST ['send']){
            $nickname = $_POST['nickname'];
            $email = $_POST['email'];
            $passwort = passwort_hash($_POST['passwort']);


            $loginRepository = new LoginRepository();
            $userPasswort = $loginRepository ->getUser($email,$nickname);
            if($passwort == $userPasswort){
                session_start();
            }
            else{
                echo '<p style="color:red">Sie haben das Falsche Passwort eingegeben. </p>';
            }
        }
    }
}