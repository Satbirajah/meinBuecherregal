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
    //Registration des Benutzers
    public function registration(){
        $validation = new Validation();
        if($_POST ['send']){

            $nickname = $_POST['nickname'];
            $nicknameOK= $validation->stringLenght(3,25,$nickname);

            $email = $_POST['email'];
            $emailOK= $validation->email($email);

            $passwort = $_POST['passwort'];
            $passwortOK= $validation->stringLenght(8,25,$email);
            $passwort2 = $_POST['passwort2'];

            $loginRepository = new LoginRepository();
            if($passwort===$passwort2&& $emailOK&&$passwortOK&&$nicknameOK) {
                $loginRepository->create($nickname, $email, $passwort);
                $login = new LoginController();
                $login->index();
            }
            else{
                if(!$emailOK){
                    echo "Geben Sie eine gültige Email-Adresse ein.";
                }
                if(!$passwortOK){
                    echo "Geben Sie ein gültiges Passwort ein, min. 8 Zeichen und max. 25 Zeichen";
                }
                if(!$nicknameOK){
                    echo "Geben Sie einen gültigen Nickname ein, mind. 3 Zeichen und max. 25 Zeichen.";
                }

            }

        }

    }

}