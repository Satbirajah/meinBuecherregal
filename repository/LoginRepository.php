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
    protected $tableName = "user";

    public function create($nickname ,$email,$passwort){
        $password = password_hash($passwort,PASSWORD_DEFAULT);

        $query = "INSERT INTO $this->tableName (nickname, email, passwort) VALUES ( ?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sss',$nickname, $email, $password);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    public function getUser($email){
        $query = "SELECT id,passwort FROM {$this->tableName} WHERE email = ? ";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s',$email);
        if(!$statement->execute()){
            throw new Exception($statement->error);
        }
        else{
            $result = $statement->get_result();
            $user= array();
            while ($row = $result->fetch_object()) {
                $user[] = $row;
            }
            return $user;
        }

    }
}