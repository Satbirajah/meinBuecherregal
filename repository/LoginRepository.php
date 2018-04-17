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
        $query = "SELECT passwort FROM {$this->table} WHERE email='{$email}' AND nickname='{$nickname}'";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->execute();
        $passwort= $statement->getResult();
        return $passwort;
    }
}