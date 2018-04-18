<?php
/**
 * Created by PhpStorm.
 * User: bburki
 * Date: 18.04.2018
 * Time: 09:14
 */

require_once '../repository/LoginRepository.php';

class RegistrationController
{

    public function index()
    {
        $view = new View('user_registration');
        $view->title = 'Registration';
        $view->heading = 'Registration';
        $view->display();
    }

    public function registration(){
        if($_POST ['send']){

            $nickname = $_POST['nickname'];
            $email = $_POST['email'];
            $passwort = $_POST['passwort'];

            $loginRepository = new LoginRepository();
            $loginRepository ->create ($nickname,$email,$passwort);
        }

    }

}