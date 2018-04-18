<?php
/**
 * Created by PhpStorm.
 * User: bburki
 * Date: 17.04.2018
 * Time: 14:33
 */

require_once '../lib/Repository.php';

class LoginRepository extends Repository
{
    protected $tablename = "user";

    public function create($nickname ,$email,$passwort){
        $password = password_hash($passwort,PASSWORD_DEFAULT);

        $query = "INSERT INTO $this->tablename (nickname, email, password) VALUES ( ?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sss',$nickname, $email, $password);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    public function getUser($email,$nickname){
        $query = "SELECT id,passwort FROM {$this->tablename} WHERE email = ? nickname=?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_params('ss',$email,$nickname);
        if(!$statement->execute()){
            throw new Exception($statement->error);
        }
        else{
           $resultat = $statement->getResult();
           $user = $resultat-> fetch_object();
            return $user;
        }

    }
}