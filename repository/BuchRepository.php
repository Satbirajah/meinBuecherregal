<?php
require_once '../lib/Repository.php';

class BuchRepository extends Repository
{
    protected $tableName = "user_genre_buch";
    public function create($buchTitel,$autor,$veroeffentlicht,$pers_zmsf,$bild,$uid,$genreID){
        echo $uid;
        $query = "INSERT INTO $this->tableName (uid,gid,titel,autor,veroeffentlicht,bildName,pers_zmsf) VALUES (?,?,?,?,?,?,?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);

        $statement->bind_param('iisssss',$uid,$genreID,$buchTitel,$autor,$veroeffentlicht,$bild,$pers_zmsf);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;

    }

    public function update($titel,$autor,$veroeffentlicht,$pers_zmsf,$ugid,$bild){

        $query="UPDATE $this->tableName SET titel = ? , autor= ? ,veroeffentlicht = ?, pers_zmsf=? bildName = ? WHERE id = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sssssi',$titel,$autor,$veroeffentlicht,$pers_zmsf,$bild, $ugid);
        if(!$statement->execute()){
            throw new Exception($statement->error);
        }
        else{
            $resultat = $statement->get_result();
            $user = $resultat-> fetch_object();
            return $user;
        }
    }

    public function delete($ugid){
        $query="DELETE FROM $this->tableName WHERE id = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $ugid);
        if(!$statement->execute()){
            throw new Exception($statement->error);
        }
    }

    public function getBook($ugid){

        $query= "SELECT * FROM $this->tableName WHERE id = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i',$ugid);
        if(!$statement->execute()){
            throw new Exception($statement->error);
        }
        else{
            $resultat = $statement->get_result();
            $book = $resultat->fetch_assoc();
            return $book;
        }
    }
    public function getBookByUidGid($uid,$gid){
        $query= "SELECT * FROM $this->tableName WHERE uid = ? AND gid = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ii',$uid,$gid);
        $result= $statement->get_result();
        if(!$statement->execute()){
            throw new Exception($statement->error);
        }
        $books = array();
        while ($book = $result->fetch_object()) {
            $books[] = $book;
        }

        return $books;
    }
}