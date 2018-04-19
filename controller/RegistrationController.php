<?php
/**
 * Created by PhpStorm.
 * User: bburki
 * Date: 18.04.2018
 * Time: 09:14
 */

require_once '../repository/LoginRepository.php';
require_once '../lib/Validation.php';
require_once 'LoginController.php';

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
        $validation = new Validation();
        $nicknameOK = false ;
        $emailOK = false;
        $passwortOK = false;
        if($_POST ['send']){

            $nickname = $_POST['nickname'];
            $nicknameOK= $validation->stringLenght(3,25,$nickname);

            $email = $_POST['email'];
            $emailOK= $validation->email($email);

            $passwort = $_POST['passwort'];
            $passwortOK= $validation->stringLenght(8,15,$email);
            $passwort2 = $_POST['passwort2'];

            $loginRepository = new LoginRepository();
            if($passwort===$passwort2&& $emailOK&&$passwortOK&&$nicknameOK) {
                $loginRepository->create($nickname, $email, $passwort);
                $login = new LoginController();
                $login->index();
            }
            else{

            }

        }

    }

}