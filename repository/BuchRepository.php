<?php
require_once '../lib/Repository.php';

class BuchRepository extends Repository
{
    protected $tableName = "user_genre_buch";
    protected $primaryKey = 'ugID';

    public function create($buchTitel,$autor,$veroeffentlicht,$pers_zmsf,$bild,$uid,$genreID){
        echo $uid;
        $query = "INSERT INTO $this->tableName (uid,gid,titel,autor,veroeffentlicht,bildName,pers_zmsf) VALUES (?,?,?,?,?,?,?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);

        $statement->bind_param('iisssss',$uid,$genreID,$buchTitel,$autor,$veroeffentlicht,$bild,$pers_zmsf);

        if (!$statement->execute()) {
            throw new Exception($statement->errorgit);
        }

        return $statement->insert_id;

    }

    public function update($titel,$autor,$veroeffentlicht,$pers_zmsf,$ugid,$bild){

        $query="UPDATE $this->tableName SET titel = ? , autor= ? ,veroeffentlicht = ?, pers_zmsf=?, bildName = ? WHERE ugid = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sssssi',$titel,$autor,$veroeffentlicht,$pers_zmsf,$bild, $ugid);
        if(!$statement->execute()){
            throw new Exception($statement->error);
        }
        return true;

    }

    public function delete($ugid){
        $query="DELETE FROM $this->tableName WHERE id = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $ugid);
        if(!$statement->execute()){
            throw new Exception($statement->error);
        }
        $statement->delete;
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
<<<<<<< HEAD
    public function getBookByUidGid($uid,$gid){
        $query= "SELECT * FROM $this->tableName WHERE uid = ? AND gid = ? ";
=======

    /**
     * @param $uid
     * @param $gid
     * @return array
     * @throws Exception
     */
    public function getBooksByUidGid($uid, $gid){
        $query= "SELECT * FROM $this->tableName WHERE uid = ? AND gid = ?";
>>>>>>> cf479b5b1ab4763f169e355a5a9ecd5f23148dc4
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