<?php
/**
 * Created by PhpStorm.
 * User: bburki
 * Date: 17.04.2018
 * Time: 13:45
 */

require_once '../repository/LoginRepository.php';
require_once 'GenreController.php';

class LoginController
{

    public function index()
    {
        $view = new View('user_login');
        $view->title = 'Login';
        $view->heading = 'Login';
        $view->display();
    }

    //Login des Users
    public function login(){

        if($_POST ['send']){
            $nickname = $_POST['nickname'];
            $email = $_POST['email'];
            $passwort =$_POST['passwort'];

            $loginRepository = new LoginRepository();
            $user = $loginRepository ->getUser($email,$nickname);
             if(password_verify($passwort, $user->passwort)){

                $_SESSION['uid']= $user->id;
                $genre = new GenreController();
                $genre->index();
                            }
            else{
               // echo '<p style="color:red">Sie haben das Falsche Passwort eingegeben. </p>';
            }
        }
    }

    public function logout(){
        session_unset();
        session_destroy();
        $_SESSION['uid']= NULL;
        $genre = new GenreController();
        $genre->index();
    }
}