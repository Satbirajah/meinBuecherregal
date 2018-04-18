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
    protected $table = "user";
    public function create($nickname ,$email,$passwort){
        $password = password_hash($passwort);

        $query = "INSERT INTO $this->table (nickname, email, password) VALUES ( ?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sss',$nickname, $email, $password);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    public function getUser($email,$nickname){
        $query = "SELECT id,passwort FROM {$this->table} WHERE email = ? nickname=?";

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